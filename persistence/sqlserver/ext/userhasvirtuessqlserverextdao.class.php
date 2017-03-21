<?php

/**
 * Class that operate on table 'user_has_virtues'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class UserHasVirtuesSqlServerExtDAO extends UserHasVirtuesSqlServerDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.user_has_virtues LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.user_has_virtues ";
        return $this->getValue($query);
    }

    public function deleteVirtuesByUser($cod_user) {
        $sql = "DELETE FROM db_toquela.user_has_virtues WHERE cod_user = '$cod_user' ";
        return $this->executeUpdate($sql);
    }

    public function getVirtuesByUser($cod_user) {
        $sql = "SELECT v.* FROM db_toquela.virtues v, db_toquela.user_has_virtues uhv WHERE v.cod_virtues = uhv.cod_virtues  AND uhv.cod_user =  '$cod_user' ";
        return $this->getList($sql, true);
    }

    public function getFavoritePostionGame($cod_user) {
        $sql = "SELECT TOP 1 * FROM db_toquela.virtues v, db_toquela.user_has_virtues uhv WHERE v.cod_virtues = uhv.cod_virtues AND uhv.cod_user = '$cod_user' AND v.cod_virtues_group = 3 AND uhv.main = 1";
        return $this->getRow($sql, true);
    }

    public function getSkilledLeg($cod_user) {
        $sql = "SELECT TOP 1 * FROM db_toquela.virtues v, db_toquela.user_has_virtues uhv WHERE v.cod_virtues = uhv.cod_virtues AND uhv.cod_user = '$cod_user' AND v.cod_virtues_group = 1";
        return $this->getRow($sql, true);
    }

    public function getLevelGame($cod_user) {
        $sql = "SELECT TOP 1 * FROM db_toquela.virtues v, db_toquela.user_has_virtues uhv WHERE v.cod_virtues = uhv.cod_virtues AND uhv.cod_user = '$cod_user' AND v.cod_virtues_group = 2";
        return $this->getRow($sql, true);
    }

}

?>
