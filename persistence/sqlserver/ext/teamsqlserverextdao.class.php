<?php

/**
 * Class that operate on table 'team'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class TeamSqlServerExtDAO extends TeamSqlServerDAO {
    
    public function getGames($cod_team) {
        $sql = "SELECT v.* FROM db_toquela.team_has_virtues h, db_toquela.virtues v WHERE v.cod_virtues = h.cod_virtues AND h.cod_team = '$cod_team';";
        return $this->getList($sql, true);
    }

}
