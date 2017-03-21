<?php

/**
 * Description of tournamenthasteammysqlextdao
 *
 * @author Jhon
 */
class TournamentHasTeamMysqlExtDAO extends TournamentHasTeamMySqlDAO {

    public function getTeamsByTournament($cod_tournament) {
        $sql = "SELECT t.*, h.number FROM team t, tournament_has_team h
                    WHERE h.`cod_team` = t.`cod_team` AND h.`cod_tournament` = '$cod_tournament';";
        $results = $this->getList($sql, true);
        return !is_null($results) ? $results : array();
    }

    public function queryByCodTournament($cod_tournament) {
        $sql = "SELECT * FROM tournament_has_team WHERE cod_tournament  = '$cod_tournament'";
        return $this->getList($sql);
    }

    public function deleteByCodTournament($cod_tournament) {
        $sql = "DELETE FROM tournament_has_team WHERE cod_tournament  = '$cod_tournament'";
        return $this->executeUpdate($sql);
    }

    public function getGroupsByTournament($cod_tournament, $count) {
        $groups = array();
        $i = 0;
        $c = 1;
        $j = 0;
        while ($i < $count) {
            $sql = "SELECT t.* FROM tournament_has_team h, team t WHERE h.`cod_tournament` = '$cod_tournament' AND t.`cod_team` = h.`cod_team` AND h.`group` = " . $c;
            $list = $this->getList($sql, true);
            $groups[$c] = $list;
            $j = count($list);
            $i += $j;
            $c++;
        }
        return ((($c - 1) * $j) == ($count)) ? ($groups) : array();
    }

    public function insertNewsIndepend($tournamenthasteam) {
        $this->set($tournamenthasteam->number);
        $this->set($tournamenthasteam->group);
        $this->set($tournamenthasteam->status);

        $sql = "INSERT INTO tournament_has_team ( tournament_has_team.cod_tournament , tournament_has_team.cod_team , tournament_has_team.number , tournament_has_team.group , tournament_has_team.status ) 
                    VALUES ('$tournamenthasteam->codtournament','$tournamenthasteam->codteam','$tournamenthasteam->number','$tournamenthasteam->group','$tournamenthasteam->status')";
        return $this->executeInsert($sql);
        ;
    }

    public function insertArray($arr_teams, $cod_tournament, $number_participants) {
        if (is_array($arr_teams) && (count($arr_teams) > 0)) {
            try {
                $this->deleteByCodTournament($cod_tournament);
                $num_teams = $this->countTeamsByTournament($cod_tournament);
                $sql = "INSERT INTO `db_toquela`.`tournament_has_team` (`cod_tournament`, `cod_team`, `number`, `round`, `status`) VALUES ";
                $values = array();
                foreach ($arr_teams as $team) {
                    if (($team['number'] > $num_teams) && ($team['number'] <= $number_participants)) {
                        $values[] = "('" . $cod_tournament . "', '" . $team['code'] . "', " . $team['number'] . ", 0, 0)";
                    }
                }
                $sql = $sql . implode(",", $values);
                $id = $this->executeInsert($sql);
                if (is_numeric($id)) {
                    return true;
                }
            } catch (Exception $exc) {
                //$this->deleteByCodTournament($cod_tournament);
                return false;
            }
        }
        return false;
    }

    public function countTeamsByTournament($cod_tournament) {
        $sql = "SELECT COUNT(*) 'num' FROM db_toquela.tournament_has_team AS h WHERE h.`cod_tournament` = '$cod_tournament';";
        $result = $this->getRow($sql, true);
        return (int) $result->num;
    }

    public function getTeamsByTournamentMin($cod_tournament) {
        $sql = "SELECT
                    t.cod_team,
                    t.`name`
            FROM
                    team AS t
            INNER JOIN tournament_has_team AS tht ON tht.cod_team = t.cod_team
            WHERE
                    tht.cod_tournament = '$cod_tournament';";
        return $this->getList($sql, true);
    }

    /*
     * Obtener Cierta cantidad de equipos.
      Mostrarlos en el pupup
     */

    public function getAllTeams($cod_user, $limit_inicio = null, $limit_fin = null) {
        $sql_limit = "";
        if (is_numeric($limit_inicio) && is_numeric($limit_fin)) {
            $sql_limit = " LIMIT $limit_inicio,$limit_fin";
        }
        $sql = "SELECT 
                t.name,
                t.`cod_team`,    
                (SELECT 
                  a.`path` 
                FROM
                  db_toquela.`team_has_attachment` AS att 
                  JOIN db_toquela.`attachment` AS a USING (cod_attachment) 
                WHERE att.`cod_team` = t.`cod_team` 
                  AND a.`type` = 'image' 
                LIMIT 1) 'image'        
              FROM
                db_toquela.`team` AS t".$sql_limit;
        return $this->getList($sql, true);
    }

    public function getMyTeams($cod_user) {
        $sql = "SELECT 
                t.name,
                t.`cod_team`,    
                (SELECT 
                  a.`path` 
                FROM
                  db_toquela.`team_has_attachment` AS att 
                  JOIN db_toquela.`attachment` AS a USING (cod_attachment) 
                WHERE att.`cod_team` = t.`cod_team` 
                  AND a.`type` = 'image' 
                LIMIT 1) 'image'        
              FROM
                db_toquela.`team` AS t 
                INNER JOIN db_toquela.`user_has_team` AS uth ON t.cod_team = uth.cod_team
                WHERE uth.cod_user = '$cod_user' AND uth.`status` != '" . UserHasTeam::STATUS_POSTULANT . "' 
              ORDER BY RAND() LIMIT 18;";
        return $this->getList($sql, true);
    }

    public function getMyTeamsBuscador($strequipo = "", $genero = null, $tipo_futbol = null, $limit_init = null, $limit_pag = null, $cod_user = null) {
        $sqllimit = "";
        if (is_numeric($limit_init) && is_numeric($limit_pag)) {
            $sqllimit = " LIMIT $limit_init, $limit_pag";
        }

        $sql_where = "";
        $sql_postulant = "uth.`status` != '" . UserHasTeam::STATUS_POSTULANT . "'";

        if ($strequipo != "") {
            $sql_where = "t.`name` LIKE '%$strequipo%' AND uth.cod_user = '$cod_user' AND $sql_postulant";
        }
        if (isset($genero)) {
            if ($sql_where == "") {
                $sql_where = "t.type='$genero' AND uth.cod_user = '$cod_user' AND $sql_postulant";
            } else {
                $sql_where = "t.type='$genero' AND uth.cod_user = '$cod_user' AND $sql_postulant AND " . $sql_where;
            }
        }
        if (is_numeric($tipo_futbol)) {
            if ($sql_where == "") {
                $sql_where = "thv.cod_virtues = '$tipo_futbol' AND uth.cod_user = '$cod_user' AND $sql_postulant";
            } else {
                $sql_where = "thv.cod_virtues = '$tipo_futbol' AND uth.cod_user = '$cod_user' AND $sql_postulant AND " . $sql_where;
            }
            $sql = "SELECT
                        t.*,
			(SELECT 
                        a.`path` 
                        FROM
                        db_toquela.`team_has_attachment` AS att 
                        JOIN db_toquela.`attachment` AS a USING (cod_attachment) 
                        WHERE att.`cod_team` = t.`cod_team` 
                        AND a.`type` = 'image' 
                        LIMIT 1) 'image'
                        FROM
                        db_toquela.`team` AS t
                        INNER JOIN db_toquela.`user_has_team` AS uth ON t.cod_team = uth.cod_team
                        INNER JOIN db_toquela.`team_has_virtues` AS thv ON t.cod_team = thv.cod_team
                        INNER JOIN db_toquela.`virtues` AS v ON thv.cod_virtues = v.cod_virtues WHERE $sql_where
                        ORDER BY t.cod_team ASC$sqllimit;";
        } else {
            $sql_where = "WHERE " . $sql_where;
            $sql = "SELECT 
                        t.*,
			(SELECT 
                        a.`path` 
                        FROM
                        db_toquela.`team_has_attachment` AS att 
                        JOIN db_toquela.`attachment` AS a USING (cod_attachment) 
                        WHERE att.`cod_team` = t.`cod_team` 
                        AND a.`type` = 'image' 
                        LIMIT 1) 'image'
                        FROM
                        db_toquela.`team` AS t
                        INNER JOIN db_toquela.`user_has_team` AS uth ON t.cod_team = uth.cod_team $sql_where
                        ORDER BY t.cod_team ASC$sqllimit;";
        }
        return $this->getList($sql, true);
    }

}
