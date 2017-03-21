<?php

/**
 * Class that operate on table 'tournament'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class TournamentMySqlExtDAO extends TournamentMySqlDAO {

    public function createTournament($name, $description, $type, $n_participants, $cod_user) {
        $sql = "INSERT INTO tournament (`name`, description, `type`, number_participants, cod_user ) 
        VALUES ('$name','$description', '$type', $n_participants,'$cod_user')";
        $id = $this->executeInsert($sql);
        return $id;
    }

    public function getTournamentsByCodUser($coduser) {
        $this->set($coduser);
        $sql = "SELECT * FROM tournament WHERE cod_user  = '$coduser'";
        return $this->getList($sql);
    }

    public function getClasificationByTournament($cod_tournament) {
        $sql = $this->queryClasification($cod_tournament, null, null);
        return $this->getList($sql, true);
    }
  
    public function getResultsByTournamentAndRoundAndGroup($cod_tournament, $round, $group, $filtrar_min_round = false, $limit = null) {
        if ($filtrar_min_round === false) {
            $round = null;
            $sql = $this->queryClasificationAuxGroup($cod_tournament, $group, $limit);
            return $this->getList($sql, true);
        }
        $sql = $this->queryClasificationAux($cod_tournament, $round, $group, $limit);
        return $this->getList($sql, true);

    }

    public function getResultsByTournamentAndGroup($cod_tournament, $group) {
        $sql = $this->queryClasification($cod_tournament, null, $group, null);
        return $this->getList($sql, true);
    }

    public function getResultsByTournamentAndGroupForFase($cod_tournament, $group, $limit = null) {
        $sql = $this->queryClasificationAuxGroup($cod_tournament, $group, $limit);
        Util::mylog('tres');
        return $this->getList($sql, true);
    }

    public function getResultsByTournamentAndFase($cod_tournament, $fase, $limit = null) {
        $sql = $this->queryClasificationAuxFase($cod_tournament, $fase, $limit = null);
        return $this->getList($sql, true);
    }

    public function getTorneosEnJuegoPorUsuario($cod_user) {
        $sql = "SELECT
        DISTINCT t.cod_tournament,
        t.`name`
        FROM
        user_has_team AS ut,
        `match` AS m
        INNER JOIN tournament AS t ON m.cod_tournament = t.cod_tournament
        WHERE
        ut.cod_user = '$cod_user' AND m.estate = '3'
        AND (
            ut.cod_team = m.team_local
            OR ut.cod_team = m.team_visitant
            ) AND t.status = 1;";
        return $this->getList($sql, true);
    }

    public function getWLosses($cod_tournament, $cod_round, $group){
      $sql = "SELECT m.`team_visitant` AS codteam, m.cod_tournament,m.round,m.group, SUM(m.`state_score_visitant`) + mn.cantidad_local AS TotalW
      FROM db_toquela.`match` AS m,
      (SELECT mn.team_local AS `local`, SUM(mn.state_score_local) AS cantidad_local
      FROM db_toquela.`match` AS mn
      GROUP BY `local`
      ) AS mn
      WHERE m.`team_visitant`=mn.local AND
      m.cod_tournament = '$cod_tournament' AND
      m.round <= '$cod_round' AND
      m.group = '$group'
      GROUP BY m.`team_visitant`";
      
      return $this->getList($sql, true);
    }

public function getEquiposEnJuegoPorTorneoYusuario($cod_tournament, $cod_user) {
    $sql = "SELECT DISTINCT
    t.cod_team,
    t.`name`
    FROM
    `match` AS m,
    user_has_team AS ut
    INNER JOIN team AS t USING (cod_team)
    WHERE
    m.cod_tournament = '$cod_tournament'
    AND ut.cod_user = '$cod_user'
    AND m.estate = '3'
    AND (
        m.team_local = t.cod_team
        OR m.team_visitant = t.cod_team
        );";
return $this->getList($sql, true);
}

public function getPartidosEnJuegoPorTorneoEquipoYusuario($cod_tournament, $cod_team, $cod_user = null) {
    $sql_where_user = "";
    if (is_numeric($cod_user)) {
        $sql_where_user = "AND ut.cod_user = '$cod_user'";
    }
    $sql = "SELECT
    m.cod_match,
    m.team_local,
    m.team_visitant,
    (SELECT tl.`name` FROM team AS tl WHERE tl.cod_team = m.team_local) AS 'namelocal',
    (SELECT tv.`name` FROM team AS tv WHERE tv.cod_team = m.team_visitant) AS 'namevisitant',
    m.score_local,
    m.score_visitant
    FROM
    `match` AS m,
    user_has_team AS ut
    INNER JOIN team AS t USING (cod_team)
    WHERE
    m.cod_tournament = '$cod_tournament'
    AND t.cod_team = '$cod_team'
    $sql_where_user
    AND m.estate = '3'
    AND (
        m.team_local = t.cod_team
        OR m.team_visitant = t.cod_team
        ) GROUP BY m.cod_match;";
return $this->getList($sql, true);
}

public function getNumTeamsByTournament($cod_tournament) {
    $sql = "SELECT 
    COUNT(ht.`cod_team`) 'num' 
    FROM
    db_toquela.`tournament_has_team` AS ht 
    WHERE ht.`cod_tournament` = '$cod_tournament';";
    $result = $this->getRow($sql, true);
    return (int) $result->num;
}

public function getAllTornoesVigentes() {
    $sql = "SELECT * FROM db_toquela.tournament AS t WHERE t.`status` = '1';";
    return $this->getList($sql, true);
}

private function queryTeamClasificationWin($round = null, $group = null) {
    $sround = "";
    $sgroup = "";
    if ($round != null && is_numeric($round))
        $sround = "AND m.round = '$round'";

    if ($group != null && is_numeric($group))
        $sgroup = "AND m.group = '$group'";

        //// <editor-fold defaultstate="collapsed" desc="query para obtener goles y cantidad de partidos que ha jugado y ganado un equipo">
    $sql = "LEFT JOIN
    (SELECT 
        m.cod_tournament,
        m.team_local 'cod_team',
        m.cod_match,
        SUM(score_local) GF,
        SUM(score_visitant) GC,
        COUNT(m.cod_match) P
        FROM
        `match` m
        WHERE
        ! ISNULL(m.score_local)
        AND ! ISNULL(m.score_visitant)
        AND score_local > score_visitant
        $sround
        $sgroup    
        GROUP BY m.cod_tournament , m.team_local) Lw USING (cod_tournament , cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_visitant 'cod_team',
    m.cod_match,
    SUM(score_visitant) GF,
    SUM(score_local) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_visitant > score_local
    $sround
    $sgroup
    GROUP BY m.cod_tournament , m.team_visitant) Vw USING (cod_tournament , cod_team)";
// </editor-fold>
return $sql;
}

private function queryTeamClasificationLost($round = null, $group = null) {
    $sround = "";
    $sgroup = "";
    if ($round != null && is_numeric($round))
        $sround = "AND m.round = '$round'";

    if ($group != null && is_numeric($group))
        $sgroup = "AND m.group = '$group'";

        //// <editor-fold defaultstate="collapsed" desc="query para obtener goles y cantidad de partidos que ha jugado y perdido un equipo">
    $sql = "LEFT JOIN
    (SELECT 
        m.cod_tournament,
        m.team_local 'cod_team',
        m.cod_match,
        SUM(score_local) GF,
        SUM(score_visitant) GC,
        COUNT(m.cod_match) P
        FROM
        `match` m
        WHERE
        ! ISNULL(m.score_local)
        AND ! ISNULL(m.score_visitant)
        AND score_local < score_visitant
        $sround
        $sgroup 
        GROUP BY m.cod_tournament , m.team_local) Ll USING (cod_tournament , cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_visitant 'cod_team',
    m.cod_match,
    SUM(score_visitant) GF,
    SUM(score_local) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_visitant < score_local
    $sround
    $sgroup 
    GROUP BY m.cod_tournament , m.team_visitant) Vl USING (cod_tournament , cod_team)";
        // </editor-fold>
return $sql;
}

private function queryTeamClasificationDraw($round = null, $group = null) {
    $sround = "";
    $sgroup = "";
    if ($round != null && is_numeric($round))
        $sround = "AND m.round = '$round'";

    if ($group != null && is_numeric($group))
        $sgroup = "AND m.group = '$group'";
        //// <editor-fold defaultstate="collapsed" desc="query para obtener goles y cantidad de partidos que ha jugado y empatado un equipo">
    $sql = "LEFT JOIN
    (SELECT 
        m.cod_tournament,
        m.team_local 'cod_team',
        m.cod_match,
        SUM(score_local) GF,
        SUM(score_visitant) GC,
        COUNT(m.cod_match) P
        FROM
        `match` m
        WHERE
        ! ISNULL(m.score_local)
        AND ! ISNULL(m.score_visitant)
        AND score_local = score_visitant
        $sround
        $sgroup 
        GROUP BY m.cod_tournament , m.team_local) Ld USING (cod_tournament , cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_visitant 'cod_team',
    m.cod_match,
    SUM(score_visitant) GF,
    SUM(score_local) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_visitant = score_local
    $sround
    $sgroup 
    GROUP BY m.cod_tournament , m.team_visitant) Vd USING (cod_tournament , cod_team)";
        // </editor-fold>
return $sql;
}

private function queryClasification($cod_tournament, $round, $group, $limit = null) {

    $leftsqlwin = $this->queryTeamClasificationWin($round, $group);
    $leftsqllost = $this->queryTeamClasificationLost($round, $group);
    $leftsqldraw = $this->queryTeamClasificationDraw($round, $group);

    if ($limit != null && is_numeric($limit))
        $slimit = "LIMIT $limit";

    $sround = "";
    if ($round != null && is_numeric($round))
        $sround = " AND h.round = $round ";

    $sql = "SELECT 
    t.cod_team,
    t.name,
    '$round' AS ro,
    '$group' AS gr,
    SUM(COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0) + COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) J,
    SUM(COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) G,
    SUM(COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) E,
    SUM(COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0)) P,
    SUM(COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0)) GC,
    SUM(COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0)) GF,
    SUM(-(COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0)) + (COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0))) DIF,
    SUM(((COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) * 3) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) Puntos
    FROM
    team t
    JOIN tournament_has_team h USING(cod_team)
    $leftsqlwin
    $leftsqllost
    $leftsqldraw                
    WHERE h.cod_tournament = '$cod_tournament'
    $sround
    GROUP BY cod_team
    ORDER BY Puntos DESC, DIF DESC, GF DESC, GC DESC, cod_team $slimit;";
    return $sql;
}

private function queryClasificationAux($cod_tournament, $round, $group, $limit = null) {
    $slimit = "";
    if ($limit != null && is_numeric($limit)) {
        $slimit = "LIMIT $limit";
    }
    $sql = "SELECT DISTINCT 
    t.cod_team,
    t.`name`,
    '$round' AS ro,
    '$group' AS gr,
    (COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0) + COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) J,
    (COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) G,
    (COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) - (COALESCE(Lwv.P, 0) + COALESCE(Lwl.P, 0)) E,
    (COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0) + COALESCE(Lwv.P, 0) + COALESCE(Lwl.P, 0)) P,
    (COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0) + COALESCE(Lwv.GC, 0) + COALESCE(Lwl.GC, 0)) GC,
     (COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0) + COALESCE(Lwv.GF, 0) + COALESCE(Lwl.GF, 0)) GF,
    (- (COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0) + COALESCE(Lwl.GC, 0) + COALESCE(Lwv.GC, 0)) + (
            COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0) + COALESCE(Lwv.GF, 0) + COALESCE(Lwl.GF, 0)) ) DIF,
(((COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) * 3) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0) ) - (COALESCE(Lwv.P, 0) + COALESCE(Lwl.P, 0)) Puntos,
COALESCE (amarillaslocal.a, 0) + COALESCE (amarillasvisitante.a, 0) amarilla,
COALESCE (rojaslocal.r, 0) + COALESCE (rojasvisitante.r, 0) rojas,
COALESCE (azuleslocal.az, 0) + COALESCE (azulesvisitante.az, 0) azules 
FROM
team AS t 
INNER JOIN db_toquela.`match` AS mb 
ON (
  (mb.team_local = t.cod_team) 
  OR (mb.team_visitant = t.cod_team)
  ) 
INNER JOIN tournament_has_team h USING (cod_team) 
LEFT JOIN 
(SELECT 
  m.cod_tournament,
  m.team_local 'cod_team',
  m.cod_match,
  SUM(score_local) GF,
   (
  CASE
  WHEN score_visitant = '-1'  THEN SUM(goles_contra_local) /* Cuando equipo local gana por w */
  ELSE  SUM(score_visitant)
  END) GC,
  COUNT(m.cod_match) P 
  FROM
  `match` m 
  WHERE ! ISNULL(m.score_local) 
  AND ! ISNULL(m.score_visitant) 
  AND score_local > score_visitant 
  AND m.cod_tournament = cod_tournament 
  AND m.round = '$round'
  AND m.`group` = '$group'
  GROUP BY m.cod_tournament,
  m.team_local) Lw 
ON (
  Lw.cod_tournament = h.cod_tournament 
  AND Lw.cod_team = h.cod_team
  ) 
LEFT JOIN 
(SELECT 
  m.cod_tournament,
  m.team_visitant 'cod_team',
  m.cod_match,
  SUM(score_visitant) GF, 
  (
  CASE
  WHEN score_local = '-1'  THEN SUM(goles_contra_visitant) /* Cuando equipo local pierde por w */
  ELSE  SUM(score_local)
  END) GC,
  COUNT(m.cod_match) P 
  FROM
  `match` m 
  WHERE ! ISNULL(m.score_local) 
  AND ! ISNULL(m.score_visitant) 
  AND score_visitant > score_local 
  AND m.cod_tournament = cod_tournament 
  AND m.round = '$round'
  AND m.`group` = '$group' 
  GROUP BY m.cod_tournament,
  m.team_visitant) Vw 
ON (
  Vw.cod_tournament = h.cod_tournament 
  AND Vw.cod_team = h.cod_team
  ) 
LEFT JOIN 
(SELECT 
  m.cod_tournament,
  m.team_local 'cod_team',
  m.cod_match,
  (CASE 
  WHEN score_local = '-1' THEN 0 /* Cuando equipo local pierde por w */
  ELSE  SUM(score_local)
  END) GF,
  SUM(score_visitant) GC,
  COUNT(m.cod_match) P 
  FROM
  `match` m 
  WHERE ! ISNULL(m.score_local) 
  AND ! ISNULL(m.score_visitant) 
  AND score_local < score_visitant 
  AND m.cod_tournament = cod_tournament 
  AND m.round = '$round'
  AND m.`group` = '$group'
  GROUP BY m.cod_tournament,
  m.team_local) Ll  
ON (
  Ll.cod_tournament = h.cod_tournament 
  AND Ll.cod_team = h.cod_team
  ) 
LEFT JOIN 
(SELECT 
  m.cod_tournament,
  m.team_visitant 'cod_team',
  m.cod_match,
  (
  CASE
  WHEN score_visitant = '-1'  THEN 0 /* Cuando equipo visitante pierde por w */
  WHEN score_visitant < score_local  THEN SUM(score_visitant) /* Cuando equipo visitante pierde por w */
  ELSE  SUM(score_visitant)
  END) GF,
  SUM(score_local) GC,
  COUNT(m.cod_match) P 
  FROM
  `match` m 
  WHERE ! ISNULL(m.score_local) 
  AND ! ISNULL(m.score_visitant) 
  AND score_visitant < score_local 
  AND m.cod_tournament = cod_tournament 
  AND m.round = '$round'
  AND m.`group` = '$group'
  GROUP BY m.cod_tournament,
  m.team_visitant) Vl  
ON (
  Vl.cod_tournament = h.cod_tournament 
  AND Vl.cod_team = h.cod_team
  ) 
LEFT JOIN 
(SELECT 
  m.cod_tournament,
  m.team_local 'cod_team',
  m.cod_match,
   (CASE
  WHEN score_local = '-1' && score_visitant = '-1' THEN SUM(goles_favor_local)  /* Cuando ambos equipos pierden por w */
  ELSE SUM(m.score_local)
  END) GF,
  (CASE
  WHEN score_local = '-1'  && score_visitant = '-1' THEN 0 /* Cuando ambos equipos pierden por w */
  ELSE  SUM(m.score_visitant)
  END) GC,
  COUNT(m.cod_match) P 
  FROM
  `match` m 
  WHERE ! ISNULL(m.score_local) 
  AND ! ISNULL(m.score_visitant) 
  AND score_local = score_visitant 
  AND m.cod_tournament = cod_tournament 
  AND m.round = '$round'
  AND m.`group` = '$group'
  GROUP BY m.cod_tournament,
  m.team_local) Ld 
ON (
  Ld.cod_tournament = h.cod_tournament 
  AND Ld.cod_team = h.cod_team
  ) 
LEFT JOIN 
(SELECT 
  m.cod_tournament,
  m.team_visitant 'cod_team',
  m.cod_match,
  (CASE
  WHEN score_local = '-1' && score_visitant = '-1' THEN 0 /* Cuando ambos equipos pierden por w */
  ELSE SUM(score_visitant)
  END) GF,
  (CASE
  WHEN score_local = '-1'  && score_visitant = '-1' THEN 0 /* Cuando ambos equipos pierden por w */
  ELSE  SUM(score_local)
  END) GC,
  COUNT(m.cod_match) P 
  FROM
  `match` m 
  WHERE ! ISNULL(m.score_local) 
  AND ! ISNULL(m.score_visitant) 
  AND score_visitant = score_local 
  AND m.cod_tournament = cod_tournament 
  AND m.round = '$round'
  AND m.`group` = '$group'
  GROUP BY m.cod_tournament,
  m.team_visitant) Vd 
ON (
  Vd.cod_tournament = h.cod_tournament 
  AND Vd.cod_team = h.cod_team
  )
 /* Sumar 3 goles en contra al perder por w */
  LEFT JOIN 
(SELECT 
  m.cod_tournament,
  m.team_visitant 'cod_team',
  m.cod_match,
  SUM(goles_favor_visitant) GF,
  (CASE 
  WHEN score_visitant = '-1' && state_score_visitant = '1' THEN SUM(goles_contra_visitant)
  ELSE SUM(0)
END) GC, /*Goles en contra visitante cuando el local gana por w */
(CASE
WHEN score_local = '-1' && score_visitant = '-1' THEN COUNT(m.cod_match) /*Cuando ambos equipos pierden por w */
ELSE SUM(0) /*Cuando un equipo pierde por w.*/
END) P 
  FROM
  `match` m 
  WHERE ! ISNULL(m.score_local) 
  AND ! ISNULL(m.score_visitant) 
  AND score_visitant = '-1'
  AND m.cod_tournament = cod_tournament 
  AND m.round = '$round'
  AND m.`group` = '$group'
  GROUP BY m.cod_tournament,
  m.team_visitant) Lwv
ON (
  Lwv.cod_tournament = h.cod_tournament 
  AND Lwv.cod_team = h.cod_team
  )
   LEFT JOIN 
(SELECT 
  m.cod_tournament,
  m.team_local 'cod_team',
  m.cod_match,
    SUM(goles_favor_local) GF,
 (CASE 
  WHEN score_local = '-1'  && state_score_local = '1' THEN SUM(goles_contra_local)
END) GC, /*Goles en contra local cuando el visitante gana por w */
(CASE
WHEN score_local = '-1' && score_visitant = '-1' THEN COUNT(m.cod_match) /*Cuando ambos equipos pierden por w */
ELSE SUM(0) /*Cuando un equipo pierde por w.*/
END) P 
  FROM
  `match` m 
  WHERE ! ISNULL(m.score_local) 
  AND ! ISNULL(m.score_visitant) 
  AND score_local = '-1'
  AND m.cod_tournament = cod_tournament 
  AND m.round = '$round'
  AND m.`group` = '$group'
  GROUP BY m.cod_tournament,
  m.team_local) Lwl
ON (
  Lwl.cod_tournament = h.cod_tournament 
  AND Lwl.cod_team = h.cod_team
  )
                    /*
                        Tarjetas Amarillas
                     */  
                        LEFT JOIN user_has_team uht 
                        ON uht.`cod_team` = t.`cod_team` 
                        LEFT JOIN 
                        (SELECT 
                          COUNT(s.cod_type_statistic) a,
                          team_local 'cod_team' 
                          FROM
                          `match` AS m 
                          LEFT JOIN statistics AS s 
                          ON s.cod_match = m.cod_match 
                          LEFT JOIN type_statistic AS ts 
                          ON ts.cod_type_statistic = s.cod_type_statistic 
                          WHERE s.is_local = '1' 
                          AND s.cod_type_statistic = (SELECT ts.cod_type_statistic FROM type_statistic AS ts WHERE ts.name = 'Tarjeta Amarilla')
                          AND m.round = '$round'
                          AND m.`group` = '$group'
                          AND m.cod_tournament = $cod_tournament GROUP BY m.`team_local`) AS amarillaslocal 
ON amarillaslocal.cod_team = t.`cod_team` 
LEFT JOIN 
(SELECT 
  COUNT(s.cod_type_statistic) a,
  team_visitant 'cod_team' 
  FROM
  `match` AS m 
  LEFT JOIN statistics AS s 
  ON s.cod_match = m.cod_match 
  LEFT JOIN type_statistic AS ts 
  ON ts.cod_type_statistic = s.cod_type_statistic 
  WHERE s.is_local = '0' 
  AND m.round = '$round'
  AND m.`group` = '$group'
  AND s.cod_type_statistic = (SELECT ts.cod_type_statistic FROM type_statistic AS ts WHERE ts.name = 'Tarjeta Amarilla')
  AND m.cod_tournament = $cod_tournament GROUP BY m.`team_visitant`) AS amarillasvisitante 
ON amarillasvisitante.cod_team = t.`cod_team`  /* End Amarillas*/
                    /*
                    Tarjetas Rojas
                     */
                    LEFT JOIN 
                    (SELECT 
                      COUNT(s.cod_type_statistic) r,
                      team_local 'cod_team' 
                      FROM
                      `match` AS m 
                      LEFT JOIN statistics AS s 
                      ON s.cod_match = m.cod_match 
                      LEFT JOIN type_statistic AS ts 
                      ON ts.cod_type_statistic = s.cod_type_statistic 
                      WHERE s.is_local = '1' 
                      AND m.round = '$round'
                      AND m.`group` = '$group'
                      AND s.cod_type_statistic = (SELECT ts.cod_type_statistic FROM type_statistic AS ts WHERE ts.name = 'Tarjeta Roja')
                      AND m.cod_tournament = $cod_tournament GROUP BY  m.`team_local`) AS rojaslocal 
ON rojaslocal.cod_team = t.`cod_team` 
LEFT JOIN 
(SELECT 
  COUNT(s.cod_type_statistic) r,
  team_visitant 'cod_team' 
  FROM
  `match` AS m 
  LEFT JOIN statistics AS s 
  ON s.cod_match = m.cod_match 
  LEFT JOIN type_statistic AS ts 
  ON ts.cod_type_statistic = s.cod_type_statistic 
  WHERE s.is_local = '0' 
  AND s.cod_type_statistic = (SELECT ts.cod_type_statistic FROM type_statistic AS ts WHERE ts.name = 'Tarjeta Roja')
  AND m.round = '$round'
  AND m.`group` = '$group'
  AND m.cod_tournament = $cod_tournament GROUP BY m.`team_visitant`) AS rojasvisitante 
ON rojasvisitante.cod_team = t.`cod_team`  /* End Tarjetas Rojas*/
                    /*
                    Tarjetas Azules
                     */
                    LEFT JOIN 
                    (SELECT 
                      COUNT(s.cod_type_statistic) az,
                      team_local 'cod_team' 
                      FROM
                      `match` AS m 
                      LEFT JOIN statistics AS s 
                      ON s.cod_match = m.cod_match 
                      LEFT JOIN type_statistic AS ts 
                      ON ts.cod_type_statistic = s.cod_type_statistic 
                      WHERE s.is_local = '1' 
                      AND m.round = '$round'
                      AND m.`group` = '$group'
                      AND s.cod_type_statistic = (SELECT ts.cod_type_statistic FROM type_statistic AS ts WHERE ts.name = 'Tarjeta Azul')
                      AND m.cod_tournament = $cod_tournament GROUP BY m.`team_local`) AS azuleslocal 
ON azuleslocal.cod_team = t.`cod_team` 
LEFT JOIN 
(SELECT 
  COUNT(s.cod_type_statistic) az,
  team_visitant 'cod_team' 
  FROM
  `match` AS m 
  LEFT JOIN statistics AS s 
  ON s.cod_match = m.cod_match 
  LEFT JOIN type_statistic AS ts 
  ON ts.cod_type_statistic = s.cod_type_statistic 
  WHERE s.is_local = '0' 
  AND m.round = '$round'
  AND m.`group` = '$group' 
  AND s.cod_type_statistic = (SELECT ts.cod_type_statistic FROM type_statistic AS ts WHERE ts.name = 'Tarjeta Azul')
  AND m.cod_tournament = $cod_tournament GROUP BY m.`team_visitant`) AS azulesvisitante 
ON azulesvisitante.cod_team = t.`cod_team` /* End Tarjetas Azules*/
WHERE mb.cod_tournament = '$cod_tournament' 
AND mb.round = '$round'
AND mb.`group` = '$group'
AND h.cod_tournament = '$cod_tournament' 
GROUP BY cod_team 
ORDER BY Puntos DESC,
DIF DESC,
GF DESC,
GC DESC,
cod_team  $slimit";
return $sql;
}

private function queryClasificationAuxGroup($cod_tournament, $group = null, $limit = null) {
    $slimit = "";
    if ($limit != null && is_numeric($limit)) {
        $slimit = "LIMIT $limit";
    }
    $sql = "SELECT 
    DISTINCT t.cod_team,
    t.`name`,
    '$group' AS gr,
    (COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0) + COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) J,
    (COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) G,
    (COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) E,
    (COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0)) P,
    (COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0)) GC,
    (COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0)) GF,
    (-(COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0)) + (COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0))) DIF,
    (((COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) * 3) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) Puntos
    FROM
    team AS t
    INNER JOIN db_toquela.`match` AS mb ON ((mb.team_local = t.cod_team) OR (mb.team_visitant = t.cod_team))
    INNER JOIN tournament_has_team h USING(cod_team)
    LEFT JOIN
    (SELECT 
        m.cod_tournament,
        m.team_local 'cod_team',
        m.cod_match,
        SUM(score_local) GF,
        SUM(score_visitant) GC,
        COUNT(m.cod_match) P
        FROM
        `match` m
        WHERE
        ! ISNULL(m.score_local)
        AND ! ISNULL(m.score_visitant)
        AND score_local > score_visitant
        AND m.cod_tournament = cod_tournament
        AND m.`group` = '$group'    
        GROUP BY m.cod_tournament , m.team_local) Lw ON (Lw.cod_tournament = h.cod_tournament AND Lw.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_visitant 'cod_team',
    m.cod_match,
    SUM(score_visitant) GF,
    SUM(score_local) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_visitant > score_local
    AND m.cod_tournament = cod_tournament
    AND m.`group` = '$group'
    GROUP BY m.cod_tournament , m.team_visitant) Vw ON (Vw.cod_tournament = h.cod_tournament AND Vw.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_local 'cod_team',
    m.cod_match,
    SUM(score_local) GF,
    SUM(score_visitant) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_local < score_visitant
    AND m.cod_tournament = cod_tournament
    AND m.`group` = '$group'
    GROUP BY m.cod_tournament , m.team_local) Ll ON (Ll.cod_tournament = h.cod_tournament AND Ll.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_visitant 'cod_team',
    m.cod_match,
    SUM(score_visitant) GF,
    SUM(score_local) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_visitant < score_local
    AND m.cod_tournament = cod_tournament
    AND m.`group` = '$group' 
    GROUP BY m.cod_tournament , m.team_visitant) Vl ON (Vl.cod_tournament = h.cod_tournament AND Vl.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_local 'cod_team',
    m.cod_match,
    SUM(score_local) GF,
    SUM(score_visitant) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_local = score_visitant
    AND m.cod_tournament = cod_tournament
    AND m.`group` = '$group' 
    GROUP BY m.cod_tournament , m.team_local) Ld ON (Ld.cod_tournament = h.cod_tournament AND Ld.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_visitant 'cod_team',
    m.cod_match,
    SUM(score_visitant) GF,
    SUM(score_local) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_visitant = score_local
    AND m.cod_tournament = cod_tournament
    AND m.`group` = '$group' 
    GROUP BY m.cod_tournament , m.team_visitant) Vd ON (Vd.cod_tournament = h.cod_tournament AND Vd.cod_team = h.cod_team)             
WHERE mb.cod_tournament = '$cod_tournament' AND mb.`group` = '$group' AND h.cod_tournament = '$cod_tournament'
GROUP BY cod_team
ORDER BY Puntos DESC, DIF DESC, GF DESC, GC DESC, cod_team $slimit;";
return $sql;
}



private function queryClasificationAuxFase($cod_tournament, $round, $limit = null) {
    $slimit = "";
    if ($limit != null && is_numeric($limit)) {
        $slimit = "LIMIT $limit";
    }
    $sql = "SELECT 
    DISTINCT t.cod_team,
    t.`name`,
    (COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0) + COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) J,
    (COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) G,
    (COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) E,
    (COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0)) P,
    (COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0)) GC,
    (COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0)) GF,
    (-(COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0)) + (COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0))) DIF,
    (((COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) * 3) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) Puntos
    FROM
    team AS t
    INNER JOIN db_toquela.`match` AS mb ON ((mb.team_local = t.cod_team) OR (mb.team_visitant = t.cod_team))
    INNER JOIN tournament_has_team h USING(cod_team)
    LEFT JOIN
    (SELECT 
        m.cod_tournament,
        m.team_local 'cod_team',
        m.cod_match,
        SUM(score_local) GF,
        SUM(score_visitant) GC,
        COUNT(m.cod_match) P
        FROM
        `match` m
        WHERE
        ! ISNULL(m.score_local)
        AND ! ISNULL(m.score_visitant)
        AND score_local > score_visitant
        AND m.cod_tournament = cod_tournament
        AND m.round = '$round'   
        GROUP BY m.cod_tournament , m.team_local) Lw ON (Lw.cod_tournament = h.cod_tournament AND Lw.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_visitant 'cod_team',
    m.cod_match,
    SUM(score_visitant) GF,
    SUM(score_local) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_visitant > score_local
    AND m.cod_tournament = cod_tournament
    AND m.round = '$round'
    GROUP BY m.cod_tournament , m.team_visitant) Vw ON (Vw.cod_tournament = h.cod_tournament AND Vw.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_local 'cod_team',
    m.cod_match,
    SUM(score_local) GF,
    SUM(score_visitant) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_local < score_visitant
    AND m.cod_tournament = cod_tournament
    AND m.round = '$round'
    GROUP BY m.cod_tournament , m.team_local) Ll ON (Ll.cod_tournament = h.cod_tournament AND Ll.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_visitant 'cod_team',
    m.cod_match,
    SUM(score_visitant) GF,
    SUM(score_local) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_visitant < score_local
    AND m.cod_tournament = cod_tournament
    AND m.round = '$round'
    GROUP BY m.cod_tournament , m.team_visitant) Vl ON (Vl.cod_tournament = h.cod_tournament AND Vl.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_local 'cod_team',
    m.cod_match,
    SUM(score_local) GF,
    SUM(score_visitant) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_local = score_visitant
    AND m.cod_tournament = cod_tournament 
    AND m.round = '$round'
    GROUP BY m.cod_tournament , m.team_local) Ld ON (Ld.cod_tournament = h.cod_tournament AND Ld.cod_team = h.cod_team)
LEFT JOIN
(SELECT 
    m.cod_tournament,
    m.team_visitant 'cod_team',
    m.cod_match,
    SUM(score_visitant) GF,
    SUM(score_local) GC,
    COUNT(m.cod_match) P
    FROM
    `match` m
    WHERE
    ! ISNULL(m.score_local)
    AND ! ISNULL(m.score_visitant)
    AND score_visitant = score_local
    AND m.cod_tournament = cod_tournament
    AND m.round = '$round'
    GROUP BY m.cod_tournament , m.team_visitant) Vd ON (Vd.cod_tournament = h.cod_tournament AND Vd.cod_team = h.cod_team)             
WHERE mb.cod_tournament = '$cod_tournament' AND h.cod_tournament = '$cod_tournament'
GROUP BY cod_team
ORDER BY Puntos DESC, DIF DESC, GF DESC, GC DESC, cod_team $slimit;";
return $sql;

}

public function getDataUsersCarnets($cod_tournament) {
    $sql = "SELECT DISTINCT
    uht.cod_user,
    a.*, u.email,
    u.phone,
    u.cellular,
    u.`name`,
    u.last_name,
    u.sex,
    (
        SELECT
        att.path
        FROM
        attachment AS att
        INNER JOIN user_has_attachment AS uha ON att.cod_attachment = uha.cod_attachment
        WHERE
        uha.cod_user = uht.cod_user
        AND uha.type = 'PERFIL'
        ORDER BY
        att.cod_attachment DESC
        LIMIT 1
        ) AS 'path',
(
    SELECT
    t.`name`
    FROM
    team AS t
    WHERE
    t.cod_team = a.teamcarnet
    ) AS 'teamname'
FROM
tournament_has_team AS tht
INNER JOIN user_has_team AS uht ON tht.cod_team = uht.cod_team
LEFT JOIN users AS u ON uht.cod_user = u.cod_user
LEFT JOIN aditional AS a ON u.cod_user = a.cod_user
WHERE
tht.cod_tournament = '$cod_tournament'
AND (
    uht.`status` = 'CAPTAIN'
    OR uht.`status` = 'PLAYER'
    ) AND uht.cod_user != '1';";
return $this->getList($sql, true);
}

public function getTorneosBuscador($strtorneo = "", $num_participantes = null, $tipo_torneo = null, $limit_init = null, $limit_pag = null, $get_total = false) {
    $sqllimit = "";
    if (is_numeric($limit_init) && is_numeric($limit_pag)) {
        $sqllimit = "LIMIT $limit_init, $limit_pag";
    }
    $sql_where = "";
    if (($strtorneo != "") || !empty($strtorneo)) {
        $sql_where .= "AND (t.`name` LIKE '%$strtorneo%' OR t.description LIKE '%$strtorneo%') ";
    }
    if (isset($tipo_torneo)) {
        $sql_where .= "AND t.type = '$tipo_torneo' ";
    }
    if (is_numeric($num_participantes)) {
        $sql_where .= "AND t.number_participants <= '$num_participantes' ";
    }
    if ($get_total) {
        $sql = "SELECT COUNT(t.cod_tournament) 'num' FROM db_toquela.tournament AS t WHERE t.`status` = '1' $sql_where;";
    } else {
        $sql = "SELECT * FROM db_toquela.tournament AS t WHERE t.`status` = '1' $sql_where $sqllimit;";
    }
    if ($get_total) {
        return (int) $this->getRow($sql, true)->num;
    }
    return $this->getList($sql, true);
}

public function getCountAll() {
    $sql = "SELECT COUNT(t.cod_tournament) 'num' 
    FROM db_toquela.tournament AS t";
    return (int) $this->getRow($sql, true)->num;
}


public function getgoleadores($cod_tournament) {

    $sql = "SELECT 
    s.`cod_user`,
    ts.`name`,
    CONCAT(u.`name`, ' ', u.`last_name`) AS 'Nombre',
    t.name AS equipo,
    COUNT(s.`cod_type_statistic`) AS 'Goles' 
    FROM
    `match` m 
    INNER JOIN statistics s 
    ON m.`cod_match` = s.`cod_match` 
    INNER JOIN type_statistic ts 
    ON ts.`cod_type_statistic` = s.`cod_type_statistic` 
    INNER JOIN users u 
    ON u.`cod_user` = s.`cod_user`
    JOIN user_has_team  uht
    ON uht.cod_user = s.cod_user
    JOIN team t
    ON t.cod_team = uht.cod_team
    WHERE m.`cod_tournament` = '$cod_tournament' 
    AND s.`cod_user` != 1 
    AND (
        s.`cod_type_statistic` = '1' 
        OR s.`cod_type_statistic` = '3'
        )

GROUP BY u.`cod_user` 
ORDER BY Goles DESC LIMIT 0,10;";
return $this->getList($sql ,true);
}

/**
     * [gettarjetas Trae los jugadores con tarjetas amarillas y rojas]
     * @param  [type] $cod_tournament [int  Codigo del torneo]
     * @return [type]                 [array]
     */
public function gettarjetas($cod_tournament){

    $sql = "SELECT 
    s.`cod_statistics` AS 'Codestatisitic',
    s.`estado` AS 'Estado',
    u.`cod_user` AS 'Coduser',
    CONCAT(u.`name`, ' ', u.`last_name`) AS 'Nombre',
    (SELECT 
        COUNT(s.`cod_type_statistic`) 
        FROM
        `match` AS m 
        LEFT JOIN statistics AS s 
        ON m.`cod_match` = s.`cod_match` 
        LEFT JOIN type_statistic ts 
        ON ts.`cod_type_statistic` = s.`cod_type_statistic` 
        WHERE s.`cod_type_statistic` = '5' 
        AND m.`cod_tournament` = '$cod_tournament' 
        AND u.`cod_user` = s.`cod_user` 
        GROUP BY u.`cod_user`,
        s.`cod_type_statistic`) AS 'Amarillas',
(SELECT 
    COUNT(s.`cod_type_statistic`) 
    FROM
    `match` AS m 
    LEFT JOIN statistics AS s 
    ON m.`cod_match` = s.`cod_match` 
    LEFT JOIN type_statistic ts 
    ON ts.`cod_type_statistic` = s.`cod_type_statistic` 
    WHERE s.`cod_type_statistic` = '6' 
    AND m.`cod_tournament` = '$cod_tournament' 
    AND u.`cod_user` = s.`cod_user` 
    GROUP BY u.`cod_user`,
    s.`cod_type_statistic`) AS 'Rojas',
 (SELECT 
    CONCAT(t.`name`) 
    FROM
    `match` AS m 
    LEFT JOIN statistics AS s 
    ON m.`cod_match` = s.`cod_match` 
    LEFT JOIN user_has_team AS uht 
    ON ( m.`team_visitant` = uht.`cod_team`
    OR m.`team_local` = uht.`cod_team`)
    LEFT JOIN team AS t
    ON ( m.`team_visitant` = t.`cod_team`
     OR m.`team_local` = t.`cod_team`)
    WHERE m.`cod_tournament` = '$cod_tournament' 
    AND u.`cod_user` = s.`cod_user` 
    GROUP BY u.`cod_user`) AS 'Equipo',
COUNT(s.`cod_type_statistic`) AS 'Total' 
FROM
`match` AS m 
LEFT JOIN statistics AS s 
ON m.`cod_match` = s.`cod_match` 
LEFT JOIN type_statistic ts 
ON ts.`cod_type_statistic` = s.`cod_type_statistic` 
LEFT JOIN users AS u 
ON u.`cod_user` = s.`cod_user` 
WHERE m.`cod_tournament` = $cod_tournament
AND (s.`cod_type_statistic` = '5' 
  OR s.`cod_type_statistic` = '6') 
GROUP BY u.`cod_user`  ORDER BY Total DESC;";
return $this->getList($sql , true);
}
/**
     * [gettarjetassancion Trae los jugadores con tarjetas sancion]
     * @param  [type] $cod_tournament [int  Codigo del torneo]
     * @return [type]                 [array]
     */
public function gettarjetassancion($cod_tournament){

    $sql = "SELECT 
    s.`cod_statistics` AS 'Codestatisitic',
    s.`estado` AS 'Estado',
    u.`cod_user` AS 'Coduser',
    CONCAT(u.`name`, ' ', u.`last_name`) AS 'Nombre',
(SELECT 
    COUNT(s.`cod_type_statistic`) 
    FROM
    `match` AS m 
    LEFT JOIN statistics AS s 
    ON m.`cod_match` = s.`cod_match` 
    LEFT JOIN type_statistic ts 
    ON ts.`cod_type_statistic` = s.`cod_type_statistic` 
    WHERE s.`cod_type_statistic` = '21' 
    AND m.`cod_tournament` = '$cod_tournament' 
    AND u.`cod_user` = s.`cod_user` 
    GROUP BY u.`cod_user`,
    s.`cod_type_statistic`) AS 'Sanciones',
 (SELECT 
    CONCAT(t.`name`) 
    FROM
    `match` AS m 
    LEFT JOIN statistics AS s 
    ON m.`cod_match` = s.`cod_match` 
    LEFT JOIN user_has_team AS uht 
    ON ( m.`team_visitant` = uht.`cod_team`
    OR m.`team_local` = uht.`cod_team`)
    LEFT JOIN team AS t
    ON ( m.`team_visitant` = t.`cod_team`
     OR m.`team_local` = t.`cod_team`)
    WHERE m.`cod_tournament` = '$cod_tournament' 
    AND u.`cod_user` = s.`cod_user` 
    GROUP BY u.`cod_user`) AS 'Equipo',
COUNT(s.`cod_type_statistic`) AS 'Total' 
FROM
`match` AS m 
LEFT JOIN statistics AS s 
ON m.`cod_match` = s.`cod_match` 
LEFT JOIN type_statistic ts 
ON ts.`cod_type_statistic` = s.`cod_type_statistic` 
LEFT JOIN users AS u 
ON u.`cod_user` = s.`cod_user` 
WHERE m.`cod_tournament` = $cod_tournament
AND (s.`cod_type_statistic` = '21') 
GROUP BY u.`cod_user`  ORDER BY Total DESC;";
return $this->getList($sql , true);
}
/**
     * [getTarjetasPartidosRojaAmarilla Lista las tarjetas con información
     * de los partidos donde se guardaron.]
     * @param  [type] $cod_tournament [int  Codigo del torneo]
     * @return [type]                 [array]
     */
public function getTarjetasPartidosRojaAmarilla($cod_tournament){

    $sql = "SELECT 
    m.`cod_match` AS 'Codmatch',
    s.`cod_statistics` AS 'Codestatisitic',
    u.`cod_user` AS 'Coduser',
    s.`cod_type_statistic` AS 'Codtypestatistic',
    s.`estado` AS 'Estado',
    s.`description` AS 'Descripcion',
    m.`team_local` AS 'Teamlocal',
    m.`team_visitant` AS 'Teamvisitant',
    CONCAT(u.`name`, ' ', u.`last_name`) AS 'Nombre',

COUNT(s.`cod_type_statistic`) AS 'Total' 
FROM
`match` AS m 
LEFT JOIN statistics AS s 
ON m.`cod_match` = s.`cod_match` 
LEFT JOIN type_statistic ts 
ON ts.`cod_type_statistic` = s.`cod_type_statistic` 
LEFT JOIN users AS u 
ON u.`cod_user` = s.`cod_user` 
WHERE m.`cod_tournament` = $cod_tournament
AND (s.`cod_type_statistic` = '5' 
  OR s.`cod_type_statistic` = '6') 
GROUP BY s.`cod_statistics`  ORDER BY Total DESC;";

return $this->getList($sql , true);
}

/**
     * [getTarjetasPartidosSancion Lista las Sanciones con información
     * de los partidos donde se guardaron.]
     * @param  [type] $cod_tournament [int  Codigo del torneo]
     * @return [type]                 [array]
     */
public function getTarjetasPartidosSancion($cod_tournament){

    $sql = "SELECT 
    m.`cod_match` AS 'Codmatch',
    s.`cod_statistics` AS 'Codestatisitic',
    u.`cod_user` AS 'Coduser',
    s.`cod_type_statistic` AS 'Codtypestatistic',
    s.`estado` AS 'Estado',
    s.`description` AS 'Descripcion',
    m.`team_local` AS 'Teamlocal',
    m.`team_visitant` AS 'Teamvisitant',
    CONCAT(u.`name`, ' ', u.`last_name`) AS 'Nombre',

COUNT(s.`cod_type_statistic`) AS 'Total' 
FROM
`match` AS m 
LEFT JOIN statistics AS s 
ON m.`cod_match` = s.`cod_match` 
LEFT JOIN type_statistic ts 
ON ts.`cod_type_statistic` = s.`cod_type_statistic` 
LEFT JOIN users AS u 
ON u.`cod_user` = s.`cod_user` 
WHERE m.`cod_tournament` = $cod_tournament
AND (s.`cod_type_statistic` = '21') 
GROUP BY s.`cod_statistics`  ORDER BY Total DESC;";

return $this->getList($sql , true);
}

    /**
     * [getgoleslocal Obtener los goles en contra que recibe un
     * equipo cuando juega de visitante de un determinado torneo]
     * @param  [type] $cod_tournament [int  Codigo del torneo]
     * @return [type]                 [array]
     */
    public function getgoleslocal($cod_tournament) {

     $sql= "SELECT 
     t.`name`,
     t.`cod_team`,
     SUM(m.`score_local`) AS 'goles' 
     FROM
     `match` AS m 
     INNER JOIN team AS t 
     ON m.`team_visitant` = t.`cod_team` 
     WHERE m.`cod_tournament` = '$cod_tournament' 
     AND m.`score_local` != '-1' 
     GROUP BY t.cod_team 
     ORDER BY goles ASC ;";
     return $this->getArray($sql , true);
 }

    /**
     * [getgolesvisitante Obtener los goles en contra que recibe un
     * equipo cuando juega de local de un determinado torneo]
     * @param  [type] $cod_tournament [int  Codigo del torneo]
     * @return [type]                 [array]
     */   
    public function getgolesvisitante($cod_tournament) {

        $sql = "SELECT 
        t.`name`,
        t.`cod_team`,
        SUM(m.`score_visitant`) AS 'goles'
        FROM
        `match` AS m
        INNER JOIN  team AS t 
        ON m.`team_local`=t.`cod_team`
        WHERE  m.`cod_tournament` = '$cod_tournament' 
        AND m.`score_visitant` != '-1'
        GROUP BY t.cod_team 
        ORDER BY goles ASC";
        return $this->getArray($sql , true);
    }

/**
     * [obtiene los usuarios que tiene torneos en toquela]
     */   
public function usuariosConTorneos() {
    $sql = 'SELECT t.cod_user,t.cod_tournament FROM db_toquela.tournament AS t GROUP BY t.cod_user';
    return $this->getList($sql , true);
}

/**
     * [obtiene los torneos que tiene el usuario]
     */ 
public function loadByCodUser($coduser){
    $this->set($coduser);
    $sql = "SELECT
            t.*
            FROM
            db_toquela.tournament AS t
            INNER JOIN db_toquela.users AS u ON u.cod_user = t.cod_user
            WHERE
            t.cod_user = '$coduser'";
    return $this->getList($sql);
}

}
