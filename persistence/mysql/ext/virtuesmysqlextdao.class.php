<?php

/**
 * Class that operate on table 'virtues'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class VirtuesMySqlExtDAO extends VirtuesMySqlDAO {

    public function getTypesGame() {
        $sql = "SELECT * FROM db_toquela.virtues WHERE cod_virtues_group = 1";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM virtues ";
        return $this->getValue($sql);
    }

    public function getVirtuesByGroupArray($cod_virtues_group) {
        if (is_numeric($cod_virtues_group)) {
            $sql = "SELECT * FROM db_toquela.virtues AS v WHERE v.cod_virtues_group = '$cod_virtues_group';";
            return $this->getList($sql, false, true);
        }
        return null;
    }

}

?>
