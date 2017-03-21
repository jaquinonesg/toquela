<?php

/**
 * Class that operate on table 'user_has_team'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:42
 */
class UserHasTeamSqlServerExtDAO extends UserHasTeamSqlServerDAO {

    public function getTeamsCreated($cod_user) {
        $sql = "SELECT t.* FROM db_toquela.team t, db_toquela.user_has_team h WHERE t.cod_team = h.cod_team AND h.status = 'CREATOR' AND h.cod_user = $cod_user";
        return $this->getList($sql, true);
    }

    public function isCreator($cod_team, $cod_user) {
        $sql = "SELECT COUNT(*) AS 'total' FROM db_toquela.team t, db_toquela.user_has_team h WHERE t.cod_team = h.cod_team 
                    AND t.cod_team = $cod_team AND h.cod_user = $cod_user AND (h.status = 'CREATOR' OR h.status = 'CAPTAIN');";
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
                AND (uht.status = 'PLAYER' OR uht.status = 'CAPTAIN')
                AND uht.cod_team = '$codteam'";
        return $this->getList($sql, true);
    }

    public function getPostulants($codteam) {
        $sql = "SELECT *,
              (SELECT c.name FROM db_toquela.city c, db_toquela.locality l WHERE c.cod_city = l.cod_city AND l.cod_locality = u.cod_locality  ) AS city
                FROM db_toquela.users u ,db_toquela.user_has_team uht
                WHERE  u.cod_user =  uht.cod_user
                AND uht.status = 'POSTULANT'
                AND uht.cod_team = '$codteam'";
        return $this->getList($sql, true);
    }

    public function getTeamsByUser($coduser) {
        $sql = "SELECT t.*, ut.status FROM db_toquela.team t , db_toquela.user_has_team ut WHERE ut.cod_user = '$coduser' AND t.cod_team = ut.cod_team;";
        return $this->getList($sql, true);
    }

    public function getCaptainByTeam($code_team) {
        $sql = "SELECT h.* FROM db_toquela.user_has_team h WHERE h.cod_team = '$code_team' AND h.status = 'CAPTAIN'";
        return $this->getRow($sql);
    }

}
