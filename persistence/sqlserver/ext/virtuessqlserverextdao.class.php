<?php

/**
 * Class that operate on table 'virtues'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class VirtuesSqlServerExtDAO extends VirtuesSqlServerDAO {

    public function getTypesGame() {
        $sql = "SELECT * FROM db_toquela.virtues WHERE cod_virtues_group= 6";
        return $this->getList($sql);
    }

}