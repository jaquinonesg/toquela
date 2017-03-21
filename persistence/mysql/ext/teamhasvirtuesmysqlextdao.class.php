<?php

/**
 * Class that operate on table 'user_has_virtues'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class TeamHasVirtuesMySqlExtDAO extends TeamHasVirtuesMySqlDAO {

    public function deleteByTeam($cod_team) {
        $sql = "DELETE FROM db_toquela.team_has_virtues WHERE cod_team = $cod_team;";
        return $this->executeUpdate($sql);
    }

    public function getFootballType($cod_team) {
        $sql = "SELECT * FROM db_toquela.virtues v, db_toquela.team_has_virtues uht WHERE v.cod_virtues = uht.cod_virtues AND uht.cod_team = '$cod_team' AND v.cod_virtues_group = 1 LIMIT 1;";
        return $this->getRow($sql, true);
    }

    /**
     * Obtiene los tipos de fubtol de un equipo.
     * 
     * @param int $cod_team Código del equipo
     * @return array Tipos
     */
    public function getTypesFootballByTeam($cod_team) {
        $sql = "SELECT v.* FROM db_toquela.team_has_virtues h, db_toquela.virtues v WHERE h.cod_virtues = v.cod_virtues
                    AND h.cod_team = $cod_team";
        return $this->getList($sql, true);
    }

}

?>
