<?php

/**
 * Class that operate on table 'user_has_team'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:42
 */
class UserHasTeamMySqlExtDAO extends UserHasTeamMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM user_has_team LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM user_has_team;";
        return $this->getValue($sql);
    }

    public function getPlayersByTeam($cod_team) {
        $sql = "SELECT 
                u.`cod_user`,
                u.`name`,
                u.`last_name`,
                ut.`status` 
              FROM
                `user_has_team` AS ut 
                INNER JOIN `users` AS u 
                  ON ut.`cod_user` = u.`cod_user` 
              WHERE ut.`cod_team` = '$cod_team' AND (ut.`status`='PLAYER' OR ut.`status`='CAPTAIN');";
        return $this->getList($sql, true);
    }

    public function getTeamsCreated($cod_user) {
        $sql = "SELECT
                        t.*, h.`status`
                FROM
                        db_toquela.team t,
                        db_toquela.user_has_team h
                WHERE
                        h.cod_user = '$cod_user'
                AND t.cod_team = h.cod_team
                AND (
                        h.`status` = '" . UserHasTeam::STATUS_CREATOR . "'
                        OR h.`status` = '" . UserHasTeam::STATUS_CAPTAIN . "'
                        OR `status` = '" . UserHasTeam::STATUS_PLAYER . "'
                );";
        return $this->getList($sql, true);
    }

    public function isCreator($cod_team, $cod_user) {
        $sql = "SELECT COUNT(*) AS 'total' FROM db_toquela.team t, db_toquela.user_has_team h WHERE t.cod_team = h.cod_team 
                    AND t.cod_team = '$cod_team' AND h.cod_user = '$cod_user' AND (h.status = 'CREATOR' OR h.status = 'CAPTAIN');";
        $stdClass = $this->getRow($sql, true);
        if ($stdClass->total > 0) {
            return true;
        }
        return false;
    }

    /**
     * Funciona que verfica todo si el equipo que se verifica eel creador sea el código del suario que se ingresa 
     * @param int $codteam codigo del equipo 
     * @param type $coduser codigo del usuario 
     * @return boolean si es o es el creador del euqipo 
     */
    public function isCreatorTeam($codteam, $coduser) {
        $sql = "SELECT * FROM db_toquela.user_has_team WHERE cod_user = '$coduser' AND cod_team = '$codteam' AND status = 'CREATOR'";
        $result = $this->getRow($sql, true);
        if ($result == null) {
            return false;
        }
        return true;
    }

    public function isTeam($codteam, $coduser) {
        $sql = "SELECT * FROM db_toquela.user_has_team WHERE cod_user = '$coduser' AND cod_team = '$codteam';";
        $result = $this->getRow($sql, true);
        if ($result == null) {
            return false;
        }
        return true;
    }

    public function isPostulant($codteam, $coduser) {
        $sql = "SELECT * FROM db_toquela.user_has_team WHERE cod_user = '$coduser' AND cod_team = '$codteam' AND status = 'POSTULANT'";
        $result = $this->getRow($sql, true);
        if ($result == null) {
            return false;
        }
        return true;
    }

    public function getPlayers($codteam) {
        $sql = "SELECT *,
              (SELECT c.name FROM db_toquela.city c, db_toquela.locality l WHERE c.cod_city = l.cod_city AND l.cod_locality = u.cod_locality  ) AS city
                FROM db_toquela.users u ,db_toquela.user_has_team uht
                WHERE  u.cod_user =  uht.cod_user
                AND (uht.status = 'PLAYER' OR uht.status = 'CAPTAIN' OR uht.status = 'POSTULANT')
                AND uht.cod_team = '$codteam'";
        return $this->getList($sql, true);
    }

    public function getPlayersPerfil($codteam) {
        $sql = "SELECT 
                    u.cod_user,
                          u.`name`,
                          u.last_name,
                          u.sex,
                          u.email,
                          u.username,
                          uht.cod_team,
                          uht.`status`,
                    (SELECT 
                      c.name 
                    FROM
                      db_toquela.city c,
                      db_toquela.locality l 
                    WHERE c.cod_city = l.cod_city 
                      AND l.cod_locality = u.cod_locality) AS city,
                    (SELECT 
                      a.`path` 
                    FROM
                      db_toquela.`user_has_attachment` AS uha 
                      INNER JOIN db_toquela.`attachment` AS a 
                        ON uha.`cod_attachment` = a.`cod_attachment` 
                    WHERE uha.`cod_user` = uht.cod_user 
                      AND uha.`type` = '" . UserHasAttachment::TYPE_PERFIL . "' ORDER BY a.cod_attachment DESC LIMIT 1) AS 'photo'
                  FROM
                    db_toquela.users u,
                    db_toquela.user_has_team uht 
                  WHERE u.cod_user = uht.cod_user 
                    AND (
                      uht.`status` = '" . UserHasTeam::STATUS_PLAYER . "' 
                      OR uht.`status` = '" . UserHasTeam::STATUS_CAPTAIN . "'
                    ) 
                    AND uht.cod_team = '$codteam';";
        return $this->getList($sql, true);
    }

    public function getPostulants($codteam) {
        $sql = "SELECT *,
              (SELECT c.name FROM db_toquela.city c, db_toquela.locality l WHERE c.cod_city = l.cod_city AND l.cod_locality = u.cod_locality  ) AS city
                FROM db_toquela.users u ,db_toquela.user_has_team uht
                WHERE  u.cod_user =  uht.cod_user
                AND uht.status = '" . UserHasTeam::STATUS_POSTULANT . "'
                AND uht.cod_team = '$codteam'";
        return $this->getList($sql, true);
    }

    public function getAllTeamsHome($inicio_limit = null, $fin_limit = null) {
        $limitsql = "";
        if (is_numeric($inicio_limit) && is_numeric($fin_limit)) {
            $limitsql = " LIMIT " . $inicio_limit . ", " . $fin_limit;
        }
        $sql = "SELECT 
                t.*,
                (SELECT 
                  a.`path` 
                FROM
                  db_toquela.`team_has_attachment` AS att 
                  JOIN db_toquela.`attachment` AS a USING (cod_attachment) 
                WHERE att.`cod_team` = t.`cod_team` 
                  AND a.`type` = 'image'  and att.`status` = '1'
                LIMIT 1) 'image',
                (SELECT 
                  v.name 
                FROM
                  db_toquela.`virtues` AS v 
                  JOIN db_toquela.`team_has_virtues` thv USING (cod_virtues) 
                WHERE thv.cod_team = t.`cod_team` 
                  AND v.cod_virtues_group = 1 
                LIMIT 1) 'futboltype',
                NULL 'status',
                (
                  IF(
                    t.`type` = 'MALE',
                    'Masculino',
                    IF(
                      t.`type` = 'FEMALE',
                      'Femenino',
                      IF(t.`type` = 'MIXED', 'Mixto', NULL)
                    )
                  )
                ) 'tipo' 
              FROM
                db_toquela.`team` AS t ORDER BY t.cod_team ASC$limitsql;";
        return $this->getList($sql, true);
    }

    public function getAllTeamsHomeSession($cod_user, $inicio_limit = null, $fin_limit = null) {
        $limitsql = "";
        if (is_numeric($inicio_limit) && is_numeric($fin_limit)) {
            $limitsql = " LIMIT " . $inicio_limit . ", " . $fin_limit;
        }
        $sql = "SELECT 
                t.*,
                (SELECT 
                  a.`path` 
                FROM
                  db_toquela.`team_has_attachment` AS att 
                  JOIN db_toquela.`attachment` AS a USING (cod_attachment) 
                WHERE att.`cod_team` = t.`cod_team` 
                  AND a.`type` = 'image' and att.`status` = '1'
                LIMIT 1) 'image',
                (SELECT 
                  v.name 
                FROM
                  db_toquela.`virtues` AS v 
                  JOIN db_toquela.`team_has_virtues` thv USING (cod_virtues) 
                WHERE thv.cod_team = t.`cod_team` 
                  AND v.cod_virtues_group = 1 
                LIMIT 1) 'futboltype',
                (SELECT 
                  uht.`status` 
                FROM
                  db_toquela.`user_has_team` AS uht 
                WHERE uht.`cod_team` = t.`cod_team` 
                  AND uht.`cod_user` = '$cod_user' AND uht.`status` != '" . UserHasTeam::STATUS_POSTULANT . "' LIMIT 1) 'status',
                (
                  IF(
                    t.`type` = 'MALE',
                    'Masculino',
                    IF(
                      t.`type` = 'FEMALE',
                      'Femenino',
                      IF(t.`type` = 'MIXED', 'Mixto', NULL)
                    )
                  )
                ) 'tipo'
              FROM
                db_toquela.`team` AS t ORDER BY t.cod_team ASC$limitsql;";
        return $this->getList($sql, true);
    }

    public function getTeamsByUser($cod_user) {
        $sql = "SELECT 
                t.*,
                uht.status,
                (SELECT 
                  a.`path` 
                FROM
                  db_toquela.`team_has_attachment` AS att 
                  JOIN db_toquela.`attachment` AS a 
                    USING(cod_attachment)
                WHERE att.`cod_team` = t.`cod_team` 
                  AND a.`type` = 'image' AND att.`status` = '1' 
                LIMIT 1) 'image',
                (SELECT 
                  v.name 
                FROM
                  db_toquela.`virtues` AS v 
                  JOIN db_toquela.`team_has_virtues` thv 
                    USING(cod_virtues)
                WHERE thv.cod_team = t.`cod_team` 
                  AND v.cod_virtues_group = 1 
                LIMIT 1) 'futboltype',
                (IF(t.`type`='MALE','Masculino',IF(t.`type`='FEMALE','Femenino',IF(t.`type`='MIXED','Mixto',NULL)))) 'tipo' 
              FROM
                db_toquela.`user_has_team` AS uht 
                JOIN db_toquela.team AS t 
                  ON uht.`cod_team` = t.`cod_team` 
              WHERE uht.`cod_user` = '$cod_user' AND uht.`status` != '" . UserHasTeam::STATUS_POSTULANT . "';";
        return $this->getList($sql, true);
    }

    public function getCaptainByTeam($code_team) {
        $sql = "SELECT h.* FROM db_toquela.user_has_team h WHERE h.cod_team = '$code_team' AND (h.`status` = '" . UserHasTeam::STATUS_CAPTAIN . "' OR h.`status`='" . UserHasTeam::STATUS_CREATOR . "') LIMIT 1;";
        return $this->getRow($sql);
    }

    public function getTeamsByTournamentAndUser($cod_tournament, $cod_user, $limit_init = null, $limit_pag = null) {
        $sqllimit = "";
        if (is_numeric($limit_init) && is_numeric($limit_pag)) {
            $sqllimit = " LIMIT $limit_init, $limit_pag";
        }
        $sql = "SELECT 
                    t.*,
                    (SELECT 
                      a.`path` 
                    FROM
                      db_toquela.`team_has_attachment` AS att 
                      JOIN db_toquela.`attachment` AS a 
                        USING(cod_attachment)
                    WHERE att.`cod_team` = t.`cod_team` 
                      AND a.`type` = 'image' 
                    LIMIT 1) 'image',
                    (SELECT 
                      v.name 
                    FROM
                      db_toquela.`virtues` AS v 
                      JOIN db_toquela.`team_has_virtues` thv 
                        USING(cod_virtues)
                    WHERE thv.cod_team = t.`cod_team` 
                      AND v.cod_virtues_group = 1 
                    LIMIT 1) 'futboltype',
                    (SELECT 
                      uht.`status` 
                    FROM
                      db_toquela.`user_has_team` AS uht
                    WHERE uht.`cod_user` = '$cod_user' AND uht.`cod_team` = t.`cod_team` AND uht.`status` != '" . UserHasTeam::STATUS_POSTULANT . "' LIMIT 1) 'status',
                    (IF(t.`type`='MALE','Masculino',IF(t.`type`='FEMALE','Femenino',IF(t.`type`='MIXED','Mixto',NULL)))) 'tipo'
                  FROM
                    db_toquela.`tournament_has_team` AS ht 
                    JOIN db_toquela.team AS t 
                      ON ht.`cod_team` = t.`cod_team` 
                  WHERE ht.`cod_tournament` = '$cod_tournament'$sqllimit;";
        return $this->getList($sql, true);
    }

    public function getTeamsByTournament($cod_tournament, $limit_init = null, $limit_pag = null) {
        $sqllimit = "";
        if (is_numeric($limit_init) && is_numeric($limit_pag)) {
            $sqllimit = " LIMIT $limit_init, $limit_pag";
        }
        $sql = "SELECT 
                    t.*,
                    (SELECT 
                      a.`path` 
                    FROM
                      db_toquela.`team_has_attachment` AS att 
                      JOIN db_toquela.`attachment` AS a 
                        USING(cod_attachment)
                    WHERE att.`cod_team` = t.`cod_team` 
                      AND a.`type` = 'image' 
                    LIMIT 1) 'image',
                    (SELECT 
                      v.`name` 
                    FROM
                      db_toquela.`virtues` AS v 
                      JOIN db_toquela.`team_has_virtues` thv 
                        USING(cod_virtues)
                    WHERE thv.cod_team = t.`cod_team` 
                      AND v.cod_virtues_group = 1 
                    LIMIT 1) 'futboltype',
                    NULL 'status',
                    (IF(t.`type`='MALE','Masculino',IF(t.`type`='FEMALE','Femenino',IF(t.`type`='MIXED','Mixto',NULL)))) 'tipo'
                  FROM
                    db_toquela.`tournament_has_team` AS ht 
                    JOIN db_toquela.team AS t 
                      ON ht.`cod_team` = t.`cod_team` 
                  WHERE ht.`cod_tournament` = '$cod_tournament'$sqllimit;";
        return $this->getList($sql, true);
    }

    public function getTeamsBuscador($cod_user = null,$strequipo = "", $genero = null, $tipo_futbol = null, $limit_init = null, $limit_pag = null, $get_total = false) {
        $sqllimit = "";
        if (is_numeric($limit_init) && is_numeric($limit_pag)) {
            $sqllimit = " LIMIT $limit_init, $limit_pag";
        }
        $sql_where = "";
        if (($strequipo != "") && isset($genero)) {
            $sql_where = "t.type='$genero' AND t.`name` LIKE '%$strequipo%'";
        } else {
            if ($strequipo != "") {
                $sql_where = "t.`name` LIKE '%$strequipo%'";
            }
            if (isset($genero)) {
                $sql_where = "t.type='$genero'";
            }
        }
        $sql_user = "";
        if (is_numeric($cod_user)) {
            $sql_user = " uht.`cod_user` = '$cod_user' AND";
        }
        if (is_numeric($tipo_futbol)) {
            if ($sql_where == "") {
                $sql_where = "thv.cod_virtues = '$tipo_futbol'";
            } else {
                $sql_where = "thv.cod_virtues = '$tipo_futbol' AND " . $sql_where;
            }
            if ($get_total) {
                $sql = "SELECT COUNT(t.cod_team) 'num' FROM db_toquela.`team` AS t INNER JOIN db_toquela.`team_has_virtues` AS thv ON thv.cod_team = t.cod_team JOIN db_toquela.`virtues` AS v ON thv.cod_virtues = v.cod_virtues WHERE $sql_where;";
            } else {
                $sql = "SELECT
                        t.*, v.`name` 'futboltype',(
                                SELECT
                                        a.`path`
                                FROM
                                        db_toquela.`team_has_attachment` AS att
                                JOIN db_toquela.`attachment` AS a USING (cod_attachment)
                                WHERE
                                        att.`cod_team` = t.`cod_team`
                                AND a.`type` = 'image' AND att.`status` = '1'
                                LIMIT 1
                        ) 'image',
                        (
                                SELECT
                                        uht.`status`
                                FROM
                                        db_toquela.`user_has_team` AS uht
                                WHERE
                                        uht.`cod_team` = t.`cod_team`
                                AND $sql_user uht.`status` != '" . UserHasTeam::STATUS_POSTULANT . "'
                                LIMIT 1
                        ) 'status',
                        (IF (t.`type` = 'MALE',
                                        'Masculino',
                                IF (t.`type` = 'FEMALE',
                                        'Femenino',
                                IF (t.`type` = 'MIXED',
                                        'Mixto',
                                        NULL)))) 'tipo'
                FROM
                        db_toquela.`team` AS t
                INNER JOIN db_toquela.`team_has_virtues` AS thv ON thv.cod_team = t.cod_team
                JOIN db_toquela.`virtues` AS v ON thv.cod_virtues = v.cod_virtues WHERE $sql_where
                ORDER BY
                        t.cod_team ASC$sqllimit;";
            }
        } else {
            $sql_where = "WHERE " . $sql_where;
            if ($get_total) {
                $sql = "SELECT COUNT(t.cod_team) 'num' FROM db_toquela.`team` AS t $sql_where;";
            } else {
                $sql = "SELECT 
                t.*,
                (SELECT 
                  a.`path` 
                FROM
                  db_toquela.`team_has_attachment` AS att 
                  JOIN db_toquela.`attachment` AS a USING (cod_attachment) 
                WHERE att.`cod_team` = t.`cod_team` 
                  AND a.`type` = 'image' AND att.`status` = '1'
                LIMIT 1) 'image',
                (SELECT 
                  v.`name` 
                FROM
                  db_toquela.`virtues` AS v 
                  JOIN db_toquela.`team_has_virtues` thv USING (cod_virtues) 
                WHERE thv.cod_team = t.`cod_team` 
                  AND v.cod_virtues_group = 1 
                LIMIT 1) 'futboltype',
                (SELECT 
                  uht.`status` 
                FROM
                  db_toquela.`user_has_team` AS uht 
                WHERE uht.`cod_team` = t.`cod_team` 
                  AND$sql_user uht.`status` != '" . UserHasTeam::STATUS_POSTULANT . "' LIMIT 1) 'status',
                (
                  IF(
                    t.`type` = 'MALE',
                    'Masculino',
                    IF(
                      t.`type` = 'FEMALE',
                      'Femenino',
                      IF(t.`type` = 'MIXED', 'Mixto', NULL)
                    )
                  )
                ) 'tipo'
              FROM
                db_toquela.`team` AS t $sql_where ORDER BY t.cod_team ASC$sqllimit;";
            }
        }
        if ($get_total) {
            return (int) $this->getRow($sql, true)->num;
        }
        return $this->getList($sql, true);
    }

    public function getByCodTeam($cod_user, $cod_team){
      $sql = "SELECT * FROM db_toquela.`user_has_team` WHERE `user_has_team`.`cod_user` LIKE '$cod_user' AND `user_has_team`.`cod_team` LIKE '$cod_team'; ";        
      return $this->getList($sql);
    }

}
