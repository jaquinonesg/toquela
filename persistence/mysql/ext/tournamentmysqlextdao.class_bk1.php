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
        $sql = "SELECT
        t.`cod_team`,
        t.`name`,
        (SELECT COUNT(*) FROM `match` m WHERE (m.team_local = t.cod_team OR m.team_visitant = t.cod_team) AND !ISNULL(m.score_local) AND !ISNULL(m.score_visitant) AND m.cod_tournament = h.`cod_tournament`) AS J,
        (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament`) AS G,
        (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament`) AS E,
        (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local < m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant < m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament`) AS P,
        (
           COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),  0)
           +
           COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`) ,0)
       ) AS GC,
(
   COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`), 0)
   +
   COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),0)
) AS GF,
(
   COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),0)
   +
   COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),0)
   -
   (
       COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`), 0)
       +
       COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),0)
   )
) AS DIF,
(
 ((SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament`) * 3)
 +
 (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament`)
) AS Puntos
FROM
tournament_has_team h,
team t
WHERE h.`cod_team` = t.`cod_team`
AND h.`cod_tournament` = '$cod_tournament'
ORDER BY Puntos DESC, DIF DESC, GF DESC, GC DESC;";
return $this->getList($sql, true);
}

public function getResultsByTournamentAndRound($cod_tournament, $round, $filtrar_min_round = false) {
    $sql_aux = "";
    if ($filtrar_min_round) {
        $sql_aux = "AND h.round = '$round'";
    }
    $sql = "SELECT
    '$round' AS ro,
    t.`cod_team`,
    t.`name`,
    (SELECT COUNT(*) FROM `match` m WHERE (m.team_local = t.cod_team OR m.team_visitant = t.cod_team) AND !ISNULL(m.score_local) AND !ISNULL(m.score_visitant) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro) AS J,
    (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro) AS G,
    (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro) AS E,
    (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local < m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant < m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro) AS P,
    (
       COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro),  0)
       +
       COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro) ,0)
   ) AS GC,
(
   COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro), 0)
   +
   COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro),0)
) AS GF,
(
   COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro),0)
   +
   COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro),0)
   -
   (
       COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro), 0)
       +
       COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro),0)
   )
) AS DIF,
(
 ((SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro) * 3)
 +
 (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro)
) AS Puntos
FROM
tournament_has_team AS h,
team t
WHERE h.`cod_team` = t.`cod_team`
AND h.`cod_tournament` = '$cod_tournament' $sql_aux ORDER BY Puntos DESC, DIF DESC, GF DESC, GC DESC;";
return $this->getList($sql, true);
}

public function getResultsByTournamentAndRoundAndGroup($cod_tournament, $round, $group, $filtrar_min_round = false, $limit = null) {
    $sql_aux = "";
    if ($filtrar_min_round) {
        $sql_aux = "AND h.round = '$round'";
    }
    $sql_aux2 = "";
    if (!is_null($limit) && is_numeric($limit)) {
        $sql_aux2 = " LIMIT $limit";
    }

    $sql = "SELECT
    '$round' AS ro,
    '$group' AS gr,
    t.`cod_team`,
    t.`name`,
    (SELECT COUNT(*) FROM `match` m WHERE (m.team_local = t.cod_team OR m.team_visitant = t.cod_team) AND !ISNULL(m.score_local) AND !ISNULL(m.score_visitant) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) AS J,
    (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) AS G,
    (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) AS E,
    (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local < m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant < m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) AS P,
    (
       COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr),  0)
       +
       COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) ,0)
   ) AS GC,
(
   COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr), 0)
   +
   COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr),0)
) AS GF,
(
   COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr),0)
   +
   COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr),0)
   -
   (
       COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr), 0)
       +
       COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr),0)
   )
) AS DIF,
(
 ((SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) * 3)
 +
 (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)
) AS Puntos
FROM
tournament_has_team AS h,
team t
WHERE h.`cod_team` = t.`cod_team` 
AND h.`cod_tournament` = '$cod_tournament' $sql_aux ORDER BY Puntos DESC, DIF DESC, GF DESC, GC DESC$sql_aux2;";
return $this->getList($sql, true);
}

public function getResultsByTournamentAndGroup($cod_tournament, $group) {
    $sql = "SELECT
    '$group' AS gr,
    t.`cod_team`,
    t.`name`,
    (SELECT COUNT(*) FROM `match` m WHERE (m.team_local = t.cod_team OR m.team_visitant = t.cod_team) AND !ISNULL(m.score_local) AND !ISNULL(m.score_visitant) AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr) AS J,
    (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr) AS G,
    (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr) AS E,
    (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local < m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant < m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr) AS P,
    (
       IF (!ISNULL((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr)), (SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr), 0)
       +
       IF (!ISNULL((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr)), (SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr),0)
   ) AS GC,
(
   IF (!ISNULL((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr)), (SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr), 0)
   +
   IF (!ISNULL((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr)), (SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr),0)
) AS GF,
(

   (IF (!ISNULL((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr)), (SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr), 0)
    +
    IF (!ISNULL((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr)), (SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr),0))
-
(
   IF (!ISNULL((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr)), (SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr), 0)
   +
   IF (!ISNULL((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr)), (SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr),0)
)
) AS DIF,
(
 ((SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr) * 3)
 +
 (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.`group`=gr)
) AS Puntos
FROM
tournament_has_team AS h,
team t
WHERE h.`cod_team` = t.`cod_team` 
AND h.`cod_tournament` = '$cod_tournament' ORDER BY Puntos DESC, DIF DESC, GF DESC, GC DESC;";
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
        );";
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

public function getPartidosEnJuegoPorTorneoEquipoYusuario($cod_tournament, $cod_team, $cod_user) {
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
    AND ut.cod_user = '$cod_user'
    AND m.estate = '3'
    AND (
        m.team_local = t.cod_team
        OR m.team_visitant = t.cod_team
        );";
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
    $sql = "SELECT * FROM db_toquela.tournament AS t WHERE t.status='1'";
    return $this->getList($sql, true);
}

}
