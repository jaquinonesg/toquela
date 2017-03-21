<?php

/**
 * Description of matchmysqlextdao
 *
 * @author Jhon
 */
class MatchMysqlExtDAO extends MatchMySqlDAO {

    public function getTeams($cod_match) {
        $sql = "SELECT t.*,h.score FROM team t, match_has_team h WHERE h.`cod_team` = t.`cod_team` AND h.`cod_match` = '$cod_match' LIMIT 2;";
        return $this->getList($sql, true);
    }

    public function getMatchesByTournamentAndRound($cod_tournament, $round) {
        $sql = "SELECT m.* FROM `match` m WHERE m.`cod_tournament` = '$cod_tournament' AND m.`round` = '$round' $validate_fecha;";
        return $this->getList($sql, true);
    }

    public function getMatchesByTournamentAndGroup($cod_tournament, $group) {
        $sql = "SELECT m.* FROM `match` m WHERE m.`cod_tournament` = '$cod_tournament' AND m.`group` = '$group';";
        return $this->getList($sql, true);
    }

    public function getMatchesByTournamentAndRoundAndGroup($cod_tournament, $round, $group, $fechaNull = false) {
        if($fechaNull){
            $validate_fecha = "AND NOT (m.date='') GROUP BY m.date";
        }
        $sql = "SELECT m.* FROM `match` m WHERE m.`cod_tournament` = '$cod_tournament' AND m.`round` = '$round' AND m.`group` = '$group' $validate_fecha;";
        return $this->getList($sql, true);
    }

    public function getFirtsRoundByTournamentAndGroup($cod_tournament, $group) {
        $sql = "SELECT m.`round` FROM `match` m WHERE m.`cod_tournament` = '$cod_tournament' AND m.`group` = '$group' LIMIT 1;";
        return $this->getRow($sql, true)->round;
    }

    public function getMatchesByTournamentAndRoundObject($cod_tournament, $round) {
        $sql = "SELECT m.* FROM `match` m WHERE m.`cod_tournament` = '$cod_tournament' AND m.`round` = '$round';";
        return $this->getList($sql);
    }

    public function getNumMatchesFaltantesByRound($cod_tournament) {
        $sql = "SELECT COUNT(*) AS num FROM `match` AS m WHERE (m.`cod_tournament`= '$cod_tournament' AND m.`score_local` IS NULL);";
        $result = $this->getRow($sql, true);
        return $result->num;
    }

    public function getMatchesByDate($cod_tournament, $round, $group, $date) {
        $sql = "SELECT m.* FROM `match` m WHERE m.`cod_tournament` = '$cod_tournament' AND m.`round` = '$round' AND m.`group` = '$group' AND NOT (m.`date` = '') AND m.`date` = '$date';";
        return $this->getList($sql, true);
    }

    public function updateForEliminatoria($match) {
        $this->set($match->date);
        $this->set($match->hour);
        $this->set($match->round);
        $this->set($match->codcomplex);
        $this->set($match->teamlocal);
        $this->set($match->scorelocal);
        $this->set($match->teamvisitant);
        $this->set($match->scorevisitant);
        $this->set($match->codtournament);

        $sql = "UPDATE `match`  SET 
		 date = if( strcmp('$match->date'  , '' ) = 1  , '$match->date', date ),
		 hour = if( strcmp('$match->hour'  , '' ) = 1  , '$match->hour', hour ),
		 round = if( strcmp('$match->round'  , '' ) = 1  , '$match->round', round ),
		 cod_complex = if( strcmp('$match->codcomplex'  , '' ) = 1  , '$match->codcomplex', cod_complex ),
		 team_local = if( strcmp('$match->teamlocal'  , '' ) = 1  , '$match->teamlocal', team_local ),
		 score_local = if( strcmp($match->scorelocal  , '' ) = 1  , $match->scorelocal, score_local ),
		 team_visitant = if( strcmp('$match->teamvisitant'  , '' ) = 1  , '$match->teamvisitant', team_visitant ),
		 score_visitant = if( strcmp($match->scorevisitant  , '' ) = 1  , $match->scorevisitant, score_visitant ),
		 cod_tournament = if( strcmp('$match->codtournament'  , '' ) = 1  , '$match->codtournament', cod_tournament ) WHERE  cod_match =  '$match->codmatch'";
        return $this->executeUpdate($sql);
    }

    public function getByTournament($value) {
        $this->set($value);
        $sql = "SELECT * FROM " . DB_NAME . ".match WHERE cod_tournament  = '$value';";
        return $this->getList($sql);
    }

    public function getNumMatchesByTournament($value) {
        $sql = "SELECT COUNT(m.`cod_match`) AS num FROM db_toquela.`match` AS m WHERE m.`cod_tournament` = '$value';";
        $result = $this->getRow($sql, true);
        return $result->num;
    }

    public function getScores($cod_match) {
        $sql = "SELECT m.`score_local`, m.`score_visitant` FROM `db_toquela`.`match` AS m WHERE m.`cod_match` = '$cod_match';";
        return $this->getRow($sql, true);
    }

    public function getAllStatisticsByMatch($cod_match, $cod_user = null) {
        if (is_numeric($cod_match)) {
            $sql_where_user = "";
            if (is_numeric($cod_user)) {
                $sql_where_user = "AND tsu.cod_user = '$cod_user'";
            }
            $sql = "SELECT
                    ts.`name`,
                    ts.cod_type_statistic,
                    ts.`icon`,
                IF (ISNULL(v.cod_type_statistic),0, COUNT(ts.cod_type_statistic)) 'count'
                FROM type_statistic AS ts
                LEFT JOIN (SELECT * FROM vw_type_statistic_user AS tsu WHERE tsu.cod_match = '$cod_match' $sql_where_user) v USING (cod_type_statistic)
                GROUP BY cod_type_statistic;";
            return $this->getList($sql, true);
        }
        return null;
    }

    public function getAllStatisticsByMatchTeam($cod_match, $cod_team = null) {
        $sql_where = "";
        if (is_numeric($cod_match)) {
            $sql_where = "WHERE tst.cod_match = '$cod_match'";
        } else {
            return null;
        }
        if (is_numeric($cod_team)) {
            $sql_where .= " AND (tst.team_local = '$cod_team' OR tst.team_visitant = '$cod_team')";
        }
        $sql = "SELECT
                    ts.`name`,
                    ts.cod_type_statistic,
                    ts.`icon`,
                IF (ISNULL(v.cod_type_statistic),0, COUNT(ts.cod_type_statistic)) 'count'
                FROM type_statistic AS ts
                LEFT JOIN (SELECT * FROM vw_type_statistic_teams AS tst $sql_where) v USING (cod_type_statistic)
                GROUP BY cod_type_statistic;";
        return $this->getList($sql, true);
    }

    public function getStatisticsByTournamentOrUser($cod_tournament = null, $cod_user = null) {
        $sql_where = "";
        if (is_numeric($cod_tournament)) {
            $sql_where = "WHERE tsu.cod_tournament = '$cod_tournament'";
        }
        if (is_numeric($cod_user)) {
            if ($sql_where == "") {
                $sql_where = "WHERE tsu.cod_user = '$cod_user'";
            } else {
                $sql_where .= " AND tsu.cod_user = '$cod_user'";
            }
        }
        $sql = "SELECT
                    ts.`name`,
                    ts.cod_type_statistic,
                    ts.`icon`,
                IF (ISNULL(v.cod_type_statistic),0, COUNT(ts.cod_type_statistic)) 'count'
                FROM type_statistic AS ts
                LEFT JOIN (SELECT * FROM vw_type_statistic_user AS tsu $sql_where) v USING (cod_type_statistic)
                GROUP BY cod_type_statistic;";
        return $this->getList($sql, true);
    }

    public function getStatisticsByTournamentOrTeam($cod_tournament = null, $cod_team = null) {
        $sql_where = "";
        if (is_numeric($cod_tournament)) {
            $sql_where = "WHERE tst.cod_tournament = '$cod_tournament'";
        }
        if (is_numeric($cod_team)) {
            if ($sql_where == "") {
                $sql_where = "WHERE (tst.team_local = '$cod_team' OR tst.team_visitant = '$cod_team')";
            } else {
                $sql_where .= " AND (tst.team_local = '$cod_team' OR tst.team_visitant = '$cod_team')";
            }
        }
        $sql = "SELECT
                    ts.`name`,
                    ts.cod_type_statistic,
                    ts.`icon`,
                IF (ISNULL(v.cod_type_statistic),0, COUNT(ts.cod_type_statistic)) 'count'
                FROM type_statistic AS ts
                LEFT JOIN (SELECT * FROM vw_type_statistic_teams AS tst $sql_where) v USING (cod_type_statistic)
                GROUP BY cod_type_statistic;";
        return $this->getList($sql, true);
    }

    public function getFormatCalendarByTournament($cod_tournament, $group = null) {
        $sql_aux = "";
        if (!is_null($group) && is_numeric($group)) {
            $sql_aux = " AND m.`group` = '$group'";
        }
        $sql = "SELECT 
                    m.*,
                    (SELECT t.name FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_local`) 'local',
                    (SELECT t.name FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_visitant`) 'visitant',
                    (SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_local` LIMIT 1) 'imglocal',
                    (SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_visitant` LIMIT 1) 'imgvisitant',
                    (SELECT c.`name` FROM complex AS c WHERE c.cod_complex = m.cod_complex) 'namecomplex'
                  FROM
                    db_toquela.`match` AS m 
                  WHERE m.cod_tournament = '$cod_tournament'$sql_aux;";
        return $this->getList($sql, true);
    }

    public function getMatchesByTournamentAndRoundModify1($cod_tournament, $round, $group = null) {
        $sql_group = "";
        if (!is_null($group) && is_numeric($group)) {
            $sql_group = " AND m.`group` = '$group'";
        }
        $sql = "SELECT m.cod_match, m.round, m.team_local, m.score_local, m.team_visitant, m.score_visitant, m.cod_tournament FROM `match` m WHERE m.`cod_tournament` = '$cod_tournament' AND m.`round` = '$round'$sql_group;";
        return $this->getList($sql, true);
    }

    public function countByTournament($cod_tournament) {
        $sql = "SELECT COUNT(*) AS 'num' FROM db_toquela.`match` WHERE cod_tournament = '$cod_tournament';";
        $result = $this->getRow($sql, true);
        return (int) $result->num;
    }

    public function getNumRoundsByTournament($cod_tournament, $group = null) {
        $sql_aux = "";
        if (!is_null($group) && is_numeric($group)) {
            $sql_aux = " AND m.`group` = '$group'";
        }
        $sql = "SELECT count(DISTINCT m.round) AS num FROM db_toquela.`match` AS m WHERE m.cod_tournament = '$cod_tournament'$sql_aux;";
        $result = $this->getRow($sql, true);
        return (int) $result->num;
    }

    public function actualizarMarcador($score_local, $score_visitant, $cod_match) {
        $sql = "UPDATE `db_toquela`.`match` SET `score_local`='$score_local', `score_visitant`='$score_visitant' WHERE (`cod_match`='$cod_match');";
        $this->executeUpdate($sql);
        return true;
    }

    public function load_and_location($cod_match) {
        $sql = "SELECT m.*, IF(ISNULL(m.cod_complex),'Sin cancha',(SELECT c.`name` FROM db_toquela.complex AS c WHERE c.cod_complex = m.cod_complex)) 'location' FROM db_toquela.`match` AS m WHERE m.cod_match = '$cod_match';";
        return $this->getRow($sql, true);
    }

    public function save_partido($score_local, $score_visitant, $estate, $cod_match) {
        $sql = "UPDATE `db_toquela`.`match` SET `score_local`='$score_local', `score_visitant`='$score_visitant', `estate`='$estate' WHERE (`cod_match`='$cod_match');";
        return $this->executeUpdate($sql);
    }

    public function insertArray($arr_matches, $cod_tournament, $update_tornament_has_team = false) {
        if (is_array($arr_matches) && (count($arr_matches) > 0)) {
            try {
                $sql = "INSERT INTO `db_toquela`.`match` (`round`, `group`, `team_local`, `team_visitant`, `cod_tournament`, `estate`) VALUES ";
                $values = array();
                $sql_update = "";
                foreach ($arr_matches as $match) {
                    $values[] = "('" . $match['round'] . "', '" . $match['group'] . "', " . $match['team1'] . ", " . $match['team2'] . ", '$cod_tournament', 1)";
                    if ($update_tornament_has_team) {
                        $sql_update .= "UPDATE `db_toquela`.`tournament_has_team` SET `round`='" . $match['round'] . "' WHERE (`cod_tournament`='$cod_tournament') AND (`cod_team`='" . $match['team1'] . "');\n";
                        $sql_update .= "UPDATE `db_toquela`.`tournament_has_team` SET `round`='" . $match['round'] . "' WHERE (`cod_tournament`='$cod_tournament') AND (`cod_team`='" . $match['team2'] . "');\n";
                    }
                }
                $sql = $sql . implode(",", $values);
                $id = $this->executeInsert($sql);
                if ($update_tornament_has_team) {
                    $this->executeUpdate($sql_update);
                }
                if (is_numeric($id)) {
                    return true;
                }
            } catch (Exception $exc) {
                $this->deleteByCodTournament($cod_tournament);
            }
        }
        return false;
    }

    public function insertArrayFase($arr_config, $teams, $fase, $type, $cod_tournament, $idayvuelta = false) {
        if (is_array($arr_config) && (count($arr_config) > 0)) {
            try {
                $sql = "INSERT INTO `db_toquela`.`match` (`round`, `group`, `type`, `team_local`, `team_visitant`, `cod_tournament`, `estate`, `numjornada`) VALUES ";
                $values = array();
                $index = 0;
                $a = 0;
                $limit_jornada = 0;
                $totalequipos = count($teams);

                foreach ($arr_config as $config) {
                    $round = $config['grupo'];
                    $num_equipos = $config['equipos'];
                    $hasta = ($num_equipos + $index);

                    $arr_jornadas = array();
                    $arr_partidos = array();

                    if ($idayvuelta) {
                        $num_partidos = ($num_equipos * ($num_equipos - 1));
                    } else {
                        $num_partidos = (($num_equipos * ($num_equipos - 1)) / 2);
                    }

                    $limit_jornada = 0;
                    if ($num_equipos % 2 == 0) {
//                        echo "el numero es par";
                        $limit_jornada = ($num_equipos - 1);
                    } else {
//                        echo "el numero es impar";
                        $limit_jornada = ($num_equipos);
                    }
                    if ($num_equipos == $num_partidos) {
                        $limit_jornada = $num_equipos;
                    }
                    $init_jonada = 1;
                    if ($idayvuelta) {
                        $limit_jornada = ($limit_jornada * 2);
                    }

                    $limit_jornada = $init_jonada + $limit_jornada;

                    for ($i = $init_jonada; $i < $limit_jornada; $i++) {
                        $arr_jornadas[$i] = array();
                    }

//                    @print_r($config);

                    for ($a = $index; $a < $hasta; $a++) {
                        if (!$idayvuelta) {
                            $index = $index + 1;
                            if ($index == $totalequipos) {
                                break;
                            }
                        }
                        $troque = true;
//                        @print_r("a: " . $a . "\n");
                        for ($b = $index; $b < $hasta; $b++) {
                            if ($a == $b) {
                                continue;
                            }
//                            @print_r("     b: " . $b . "\n");
                            if (is_numeric($teams[$a]->codteam) && is_numeric($teams[$b]->codteam)) {

                                $aux_obj = new stdClass();
                                $aux_obj->round = $round;
                                $aux_obj->fase = $fase;
                                $aux_obj->type = $type;
                                if ($troque) {
                                    $aux_obj->team_a = $teams[$a]->codteam;
                                    $aux_obj->team_b = $teams[$b]->codteam;
                                    $troque = false;
                                } else {
                                    $aux_obj->team_a = $teams[$b]->codteam;
                                    $aux_obj->team_b = $teams[$a]->codteam;
                                    $troque = true;
                                }
                                $aux_obj->team_a = $teams[$a]->codteam;
                                $aux_obj->team_b = $teams[$b]->codteam;
                                $aux_obj->cod_tournament = $cod_tournament;
                                $aux_obj->jornada = NULL;
                                array_push($arr_partidos, $aux_obj);
                            }
                        }
                    }

//                    @print_r($arr_partidos);
//                    @print_r($arr_jornadas);

                    $arr_jornadas = $this->encontrarJornada($arr_partidos, $arr_jornadas, $idayvuelta);

                    foreach ($arr_jornadas as $jornadas) {
                        foreach ($jornadas as $partido) {
                            array_push($values, "('" . $partido->round . "', '" . $partido->fase . "', '" . $partido->type . "','" . $partido->team_a . "','" . $partido->team_b . "', '$partido->cod_tournament', 1, $partido->jornada)");
                        }
                    }
                    $index = $a;
                }

                $sql = $sql . implode(",", $values);

//                @print_r($sql);
//                exit();

                $id = $this->executeInsert($sql);
                if (is_numeric($id)) {
                    return true;
                }
            } catch (Exception $exc) {
                $this->deleteByCodTournamentAndGroup($cod_tournament, $fase);
            }
        }
        return false;
    }

    private function encontrarJornada($arr_partidos, $arr_jornadas, $idayvuelta = false) {
        $aux_jornadas_vacio = $arr_jornadas;
        foreach ($arr_partidos as $partido) {
            $jor_decartadas = array();
            $limit_jornada = count($arr_jornadas);
            while (true) {
                $jornada_rand = array_rand($arr_jornadas);
                if (in_array($jornada_rand, $jor_decartadas)) {
                    continue;
                } else {
                    array_push($jor_decartadas, $jornada_rand);
                    if (empty($arr_jornadas[$jornada_rand])) {
                        $partido->jornada = $jornada_rand;
                        array_push($arr_jornadas[$jornada_rand], $partido);
                        break;
                    } else {
                        $libre = true;
                        foreach ($arr_jornadas[$jornada_rand] as $obj_partido) {
                            if ($obj_partido->team_a == $partido->team_a || $obj_partido->team_b == $partido->team_b || $obj_partido->team_a == $partido->team_b || $obj_partido->team_b == $partido->team_a) {
                                $libre = false;
                                break;
                            }
                        }
                        if ($libre) {
                            $partido->jornada = $jornada_rand;
                            array_push($arr_jornadas[$jornada_rand], $partido);
                            break;
                        } else {
                            if (count($jor_decartadas) >= $limit_jornada) {
                                return $this->encontrarJornada($arr_partidos, $aux_jornadas_vacio);
                            } else {
                                continue;
                            }
                        }
                    }
                }
            }
        }
        return $arr_jornadas;
    }

    public function insertArrayFaseEliminacion($size, $teams, $fase, $type, $cod_tournament) {
        if (($size < 4) && ($size > 32)) {
            return false;
        }
        if ($size % 4 != 0) {
            return false;
        }
        $num_init = floor($size / 2);
        try {
            $sql = "INSERT INTO `db_toquela`.`match` (`round`, `group`, `type`, `team_local`, `team_visitant`, `cod_tournament`, `estate`) VALUES ";
            $values = array();
            $index = 0;
            $primara = true;
            $round = 1;
            while (true) {
                for ($a = 1; $a <= $num_init; $a++) {
                    if ($primara) {
                        $cod_local = $teams[$index]->codteam;
                        $index++;
                        $cod_visitant = $teams[$index]->codteam;
                        $index++;
                        $values[] = "('$round', '$fase', '$type','$cod_local','$cod_visitant', '$cod_tournament', 1)";
                    } else {
                        $values[] = "('$round', '$fase', '$type',NULL,NULL, '$cod_tournament', 1)";
                    }
                }
                $primara = false;
                $round++;
                if ($num_init <= 1) {
                    break;
                }
                $num_init = ($num_init / 2);
            }
            $sql = $sql . implode(",", $values);
            $id = $this->executeInsert($sql);
            if (is_numeric($id)) {
                return true;
            }
        } catch (Exception $exc) {
            $this->deleteByCodTournamentAndGroup($cod_tournament, $fase);
        }
        return false;
    }

    public function cruzar_ganadores_siguiente_ronda($matches_current_round, $matches_next_round) {
        $sql = "";
        if (is_array($matches_current_round) && is_array($matches_next_round)) {
            $size_matches_current_round = count($matches_current_round);
            $size_matches_next_round = count($matches_next_round);
            if ($size_matches_next_round == ($size_matches_current_round / 2)) {
                $cont_aux = 0;
                $cont_next = 0;
                for ($a = 0; $a < $size_matches_current_round; $a++) {
                    $aux_obj = $matches_current_round[$a];
                    if (is_numeric($aux_obj->teamlocal) && is_numeric($aux_obj->scorelocal) && is_numeric($aux_obj->teamvisitant) && is_numeric($aux_obj->scorevisitant)) {
                        $cont_aux++;
                        if ($aux_obj->scorelocal == $aux_obj->scorevisitant) {
                            return "";
                        }
                        if ($aux_obj->scorelocal > $aux_obj->scorevisitant) {
                            if ($cont_aux == 1) {
                                $sql .= "UPDATE `db_toquela`.`match` SET `team_local`='$aux_obj->teamlocal' WHERE (`cod_match`='" . $matches_next_round[$cont_next]->codmatch . "') AND (`round`='" . $matches_next_round[$cont_next]->round . "');\n";
                            } else {
                                $sql .= "UPDATE `db_toquela`.`match` SET `team_visitant`='$aux_obj->teamlocal' WHERE (`cod_match`='" . $matches_next_round[$cont_next]->codmatch . "') AND (`round`='" . $matches_next_round[$cont_next]->round . "');\n";
                            }
                        } else {
                            if ($cont_aux == 1) {
                                $sql .= "UPDATE `db_toquela`.`match` SET `team_local`='$aux_obj->teamvisitant' WHERE (`cod_match`='" . $matches_next_round[$cont_next]->codmatch . "') AND (`round`='" . $matches_next_round[$cont_next]->round . "');\n";
                            } else {
                                $sql .= "UPDATE `db_toquela`.`match` SET `team_visitant`='$aux_obj->teamvisitant' WHERE (`cod_match`='" . $matches_next_round[$cont_next]->codmatch . "') AND (`round`='" . $matches_next_round[$cont_next]->round . "');\n";
                            }
                        }
                        if ($cont_aux == 2) {
                            $cont_aux = 0;
                            $cont_next++;
                        }
                    }
                }
            }
        }
        return $sql;
    }

    public function updateArray($arr_matches) {
        $sql = "";
        if (is_array($arr_matches)) {
            try {
                foreach ($arr_matches as $arr_match) {
                    $match = (object) $arr_match;
//                $sql .= "UPDATE `db_toquela`.`match` SET `team_local`='$match->team_local', `team_visitant`='$match->team_visitant'  WHERE (`cod_match`='" . $match->cod_match . "');";
                    $this->executeUpdate("UPDATE `db_toquela`.`match` SET `team_local`='$match->team_local', `team_visitant`='$match->team_visitant'  WHERE (`cod_match`='" . $match->cod_match . "');");
                }
            } catch (Exception $e) {
                return false;
            }
        }
//        if ($sql == "") {
//            return false;
//        } else {
//            $this->executeUpdate($sql);
//            return true;
//        }
        return true;
    }

    public function getNumMatchesByGroup($cod_tournament, $group) {
        $sql = "SELECT COUNT(*) 'num' FROM db_toquela.`match` AS m WHERE m.cod_tournament = '$cod_tournament' AND m.`group` = '$group';";
        $result = $this->getRow($sql, true);
        return (int) $result->num;
    }

    public function getNumMatchesByGroupPlayed($cod_tournament, $group) {
        $sql = "SELECT COUNT(*) 'num' FROM db_toquela.`match` AS m WHERE m.cod_tournament = '$cod_tournament' AND m.`group` = '$group' AND m.estate='3';";
        $result = $this->getRow($sql, true);
        return (int) $result->num;
    }

    public function update_siguiente_fase($cod_tournament, $group, $next_group) {
        $first_round = $this->getFirtsRoundByTournamentAndGroup($cod_tournament, $next_group);
        $matches_next = $this->getMatchesByTournamentAndRoundAndGroup($cod_tournament, $first_round, $next_group);
        $num_matches = count($matches_next);
        if ($num_matches == 0) {
            return false;
        }
        $sql = "";
        $cont_A = 1;
        $cont_B = $num_matches;
        foreach ($matches_next as $match) {
            $sql .= "UPDATE `db_toquela`.`match` SET `team_local`='{A$cont_A}', `team_visitant`='{B$cont_B}' WHERE (`cod_match`='" . $match->codmatch . "') AND (`round`='" . $match->round . "');\n";
            $cont_A++;
            $cont_B--;
        }
        for ($a = 1; $a <= $num_matches; $a++) {
            $teams = DAOFactory::getTournamentDAO()->getResultsByTournamentAndRoundAndGroup($cod_tournament, $a, $group, true, 2);
            if (isset($teams[0]) && isset($teams[1])) {
                $sql = str_replace("{A$a}", $teams[0]->codteam, $sql);
                $sql = str_replace("{B$a}", $teams[1]->codteam, $sql);
            } else {
                return false;
            }
        }
        if ($sql != "") {
            $this->executeUpdate($sql);
            return true;
        }
        return false;
    }

    public function getNumFases($cod_tournament) {
        $sql = "SELECT COALESCE(MAX(m.`group`),0) 'num' FROM db_toquela.`match` AS m WHERE m.cod_tournament = '$cod_tournament';";
        return (int) $this->getRow($sql, true)->num;
    }

    public function getFasesByTournament($cod_tournament, $numfase = "") {
        $sql_numfase = "";
        if (is_numeric($numfase)) {
            $sql_numfase = "AND `group` = '$numfase'";
        }
        $sql = "SELECT DISTINCT m.`group` 'num', m.type FROM db_toquela.`match` AS m WHERE m.cod_tournament = '$cod_tournament' $sql_numfase;";
        return $this->getList($sql, true);
    }

    public function getGruposByTournament($cod_tournament) {
        if (is_numeric($cod_tournament)) {
            $sql = "SELECT DISTINCT m.round 'num' FROM db_toquela.`match` AS m WHERE m.cod_tournament = '$cod_tournament';";
            return $this->getList($sql, true);
        }
        return null;
    }

    public function getJornadasByTournament($cod_tournament) {
        if (is_numeric($cod_tournament)) {
            $sql = "SELECT DISTINCT m.numjornada 'num' FROM db_toquela.`match` AS m WHERE m.cod_tournament = '$cod_tournament' ORDER BY m.numjornada;";
            return $this->getList($sql, true);
        }
        return null;
    }

    public function getFaseUnitByTournament($cod_tournament, $group) {
        $sql = "SELECT DISTINCT m.`group` 'num', m.type FROM db_toquela.`match` AS m WHERE m.cod_tournament = '$cod_tournament' AND m.`group`='$group';";
        return $this->getRow($sql, true);
    }

    public function deleteByCodTournamentAndGroup($cod_tournament, $group) {
        $sql = "DELETE FROM db_toquela.match WHERE cod_tournament = '$cod_tournament' AND `group` = '$group';";
        return $this->executeUpdate($sql);
    }

    public function getTypeByTournamentAndGroup($cod_tournament, $group) {
        $sql = "SELECT DISTINCT m.type FROM `match` m WHERE m.`cod_tournament` = '$cod_tournament' AND m.`group` = '$group' LIMIT 1;";
        return $this->getRow($sql, true)->type;
    }

    public function getSqlActualizarOrdenDeGrupos($cod_tournament, $group, $newgroup) {
        return "UPDATE `db_toquela`.`match` SET `group` = '$newgroup' WHERE (`cod_tournament` = '$cod_tournament') AND (`group` = '$group');\n";
    }

    public function getSqlUpdateRound($cod_match, $date, $hour, $description_place, $numround, $complex = "", $arbitros = "") {
        $auxnumround = "NULL";
        if (is_numeric($numround)) {
            $auxnumround = "'" . $numround . "'";
        }
        if (empty($description_place)) {
            $description_place = 'NULL';
        } else {
            $description_place = "'" . $description_place . "'";
        }
        if (empty($arbitros)) {
            $arbitros = 'NULL';
        } else {
            $arbitros = "'" . $arbitros . "'";
        }
        if(empty($date) && empty($hour) || $hour == ':00'){
            if (is_numeric($complex)) {
                return "UPDATE db_toquela.match AS m SET m.cod_complex = '" . $complex . "', m.date = NULL , m.hour = NULL, m.description_place=" . $description_place . ", m.numjornada=" . $auxnumround . ", m.arbitros=$arbitros WHERE m.cod_match='" . $cod_match . "'; \n";
            }
            return "UPDATE db_toquela.match AS m SET m.date = NULL, m.hour = NULL, m.description_place=" . $description_place . ", m.numjornada=" . $auxnumround . ", m.arbitros=$arbitros WHERE m.cod_match='" . $cod_match . "'; \n";
        }else{
            if (is_numeric($complex)) {
                return "UPDATE db_toquela.match AS m SET m.cod_complex = '" . $complex . "', m.date = '" . $date . "', m.hour = '" . $hour . "', m.description_place=" . $description_place . ", m.numjornada=" . $auxnumround . ", m.arbitros=$arbitros WHERE m.cod_match='" . $cod_match . "'; \n";
            }
            return "UPDATE db_toquela.match AS m SET m.date = '" . $date . "', m.hour = '" . $hour . "', m.description_place=" . $description_place . ", m.numjornada=" . $auxnumround . ", m.arbitros=$arbitros WHERE m.cod_match='" . $cod_match . "'; \n";
        }
    }

    public function getEmailsNotificacionPorPartido($cod_match) {
        $sql = "SELECT DISTINCT
                        uht.cod_user,
                        u.email
                FROM
                        `match` AS m,
                        user_has_team AS uht
                INNER JOIN users AS u ON uht.cod_user = u.cod_user
                WHERE
                        m.cod_match = '$cod_match'
                AND (
                        uht.cod_team = m.team_local
                        OR uht.cod_team = m.team_visitant
                )
                AND (
                        uht.`status` = '" . UserHasTeam::STATUS_CAPTAIN . "'
                        OR uht.`status` = '" . UserHasTeam::STATUS_PLAYER . "'
                );";
        return $this->getList($sql, true);
    }

    public function insertMatch($match) {
        $this->set($match->date);
        $this->set($match->hour);
        $this->set($match->round);
        $this->set($match->codcomplex);
        $this->set($match->teamlocal);
        $this->set($match->teamvisitant);
        $this->set($match->description);
        $this->set($match->estate);
        if ($match->teamvisitant == 'null') {
            $sql = "INSERT INTO db_toquela.match ( date , hour , round , cod_complex , team_local , team_visitant , description , estate ) 
                    VALUES (STR_TO_DATE('$match->date', '%Y-%d-%m'),'$match->hour','$match->round',null,'$match->teamlocal',$match->teamvisitant,'$match->description','$match->estate')";
        }
        if ($match->teamvisitant == '') {
            $sql = "INSERT INTO db_toquela.match ( date , hour , round , cod_complex , team_local , team_visitant , description , estate ) 
                    VALUES (STR_TO_DATE('$match->date', '%Y-%d-%m'),'$match->hour','$match->round',null,'$match->teamlocal',null,'$match->description','$match->estate')";
        } else {
            $sql = "INSERT INTO db_toquela.match ( date , hour , round , cod_complex , team_local , team_visitant , description , estate ) 
                    VALUES (STR_TO_DATE('$match->date', '%Y-%d-%m'),'$match->hour','$match->round',null,'$match->teamlocal','$match->teamvisitant','$match->description','$match->estate')";
        }
        $id = $this->executeInsert($sql);
        /* $match-> = $id; */
        return $id;
    }

    public function updateWithTeam($match) {
        $this->set($match->codmatch);
        $this->set($match->teamvisitant);

        $sql = "UPDATE db_toquela.match  SET 
		 team_visitant = if( strcmp('$match->teamvisitant'  , '' ) = 1  , '$match->teamvisitant', team_visitant ) WHERE cod_match = $match->codmatch";
        Util::mylog($sql);
        return $this->executeUpdate($sql);
    }

    public function getFormatCalendarByTournamentFilter($cod_tournament, $num_fase = "", $num_grupo = "", $num_jornada = "", $fechaA = "", $fechaB = "", $strfilter = "", $typefilter = "") {
        if (!is_numeric($cod_tournament)) {
            return null;
        }
        $sql_num_fase = "";
        if (is_numeric($num_fase)) {
            $sql_num_fase = " AND m.`group` = '$num_fase'";
        }

        $sql_num_grupo = "";
        if (is_numeric($num_grupo)) {
            $sql_num_grupo = " AND m.round = '$num_grupo'";
        }

        $sql_num_jornada = "";
        if (is_numeric($num_jornada)) {
            $sql_num_jornada = " AND m.numjornada = '$num_jornada'";
        }

        $sql_fechas = "";
        if (!empty($fechaA) && !empty($fechaB)) {
            $sql_fechas = " AND (m.date BETWEEN '$fechaA' AND '$fechaB')";
        } else {
            if (!empty($fechaA)) {
                $sql_fechas = " AND m.date = '$fechaA'";
            }
        }
        $where = $sql_num_fase . $sql_num_grupo . $sql_num_jornada . $sql_fechas;
        $joins = "";
        $where_aditional = "";
        if (!empty($typefilter) && !empty($strfilter)) {
            switch ($typefilter) {
                case 1:
                    //equipos
                    $joins = "LEFT JOIN team AS te ON (m.team_local = te.cod_team) OR (m.team_visitant = te.cod_team)";
                    $where_aditional = " AND te.`name` LIKE '%$strfilter%'";
                    break;
                case 2:
                    //Jugadores
                    $joins = "LEFT JOIN team AS te ON (m.team_local = te.cod_team) OR (m.team_visitant = te.cod_team)
                    LEFT JOIN user_has_team AS uht ON te.cod_team = uht.cod_team
                    LEFT JOIN users AS u ON uht.cod_user = u.cod_user";
                    $where_aditional = " AND (CONCAT(u.`name`,' ',u.last_name) LIKE '%$strfilter%')";
                    break;
                case 3:
                    //Complejos - Lugares
                    $joins = "LEFT JOIN complex AS co ON m.cod_complex = co.cod_complex";
                    $where_aditional = " AND (CONCAT(co.`name` ,' - ',m.description_place) LIKE '%$strfilter%' OR co.`name` LIKE '%$strfilter%' OR m.description_place LIKE '%$strfilter%') GROUP BY m.cod_complex, m.description_place";
                    break;
                case 4:
                    //Arbitros
                    $joins = "";
                    $where_aditional = " AND (m.arbitros LIKE '%$strfilter%')";
                    break;
                default :
                    $joins = "";
                    $where_aditional = "";
                    break;
            }
        }
        if (!empty($where_aditional)) {
            $where .= $where_aditional;
        }

        $sql = "SELECT 
                    DISTINCT m.*,
                    (SELECT t.name FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_local`) 'local',
                    (SELECT t.name FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_visitant`) 'visitant',
                    (SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_local` LIMIT 1) 'imglocal',
                    (SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_visitant` LIMIT 1) 'imgvisitant',
                    (SELECT c.`name` FROM complex AS c WHERE c.cod_complex = m.cod_complex) 'namecomplex'
                FROM
                  `match` AS m 
                  $joins
                WHERE m.cod_tournament = '$cod_tournament'$where;";
        return $this->getList($sql, true);
    }

    public function autocompleteComplexAndTournament($term, $codtournament) {
        $sql = "SELECT
                m.cod_complex 'value',
                CONCAT(c.`name` ,COALESCE(CONCAT(' - ',m.description_place),'')) 'label'
            FROM
                `match` AS m
                LEFT JOIN complex AS c ON m.cod_complex = c.cod_complex
            WHERE
                m.cod_tournament = '$codtournament'
            AND (CONCAT(c.`name` ,' - ',m.description_place) LIKE '%$term%' OR c.`name` LIKE '%$term%' OR m.description_place LIKE '%$term%') GROUP BY m.cod_complex, m.description_place LIMIT 10;";
        $result = $this->getList($sql, true);
        return !is_null($result) ? $result : array();
    }

    public function autocompleteArbitrosAndTournament($term, $codtournament) {
        $sql = "SELECT 
                m.cod_complex 'value',
                m.arbitros 'label'
            FROM
                `match` AS m
            WHERE
                m.cod_tournament = '$codtournament'
            AND m.arbitros LIKE '%$term%' GROUP BY m.arbitros LIMIT 10;";
        $result = $this->getList($sql, true);
        return !is_null($result) ? $result : array();
    }

    public function updateWithDate($match) {
        $this->set($match->date);
        $this->set($match->hour);

        $sql = "UPDATE db_toquela.match  SET 
		 date = if( strcmp('$match->date'  , '' ) = 1  , '$match->date', date ),
		 hour = if( strcmp('$match->hour'  , '' ) = 1  , '$match->hour', hour )
		 WHERE  cod_match =  '$match->codmatch'";
        return $this->executeUpdate($sql);
    }

    public function prueba($sql) {
        return $this->executeUpdate($sql);
    }

        public function updateSinGroup($match){
        // lo actualizo así por que no se que diablos pasa con la consulta cuando esta el group
        $this->set($match->date);
        $this->set($match->hour);
        $this->set($match->round);
        $this->set($match->type);
        $this->set($match->codcomplex);
        $this->set($match->teamlocal);
        $this->set($match->scorelocal);
        $this->set($match->teamvisitant);
        $this->set($match->scorevisitant);
        $this->set($match->codtournament);
        $this->set($match->description);
        $this->set($match->descriptionplace);
        $this->set($match->numjornada);
        $this->set($match->estate);
        $this->set($match->arbitros);
        $this->set($match->statescorevisitant);
        $this->set($match->statescorelocal);
        $this->set($match->golesfavorlocal);
        $this->set($match->golescontralocal);
        $this->set($match->golesfavorvisitant);
        $this->set($match->golescontravisitant);
        
        $sql = "UPDATE db_toquela.match  SET 
        date = if( strcmp('$match->date'  , '' ) = 1  , '$match->date', date ),
        hour = if( strcmp('$match->hour'  , '' ) = 1  , '$match->hour', hour ),
        round = if( strcmp('$match->round'  , '' ) = 1  , '$match->round', round ),
        type = if( strcmp('$match->type'  , '' ) = 1  , '$match->type', type ),
        cod_complex = if( strcmp('$match->codcomplex'  , '' ) = 1  , '$match->codcomplex', cod_complex ),
        team_local = if( strcmp('$match->teamlocal'  , '' ) = 1  , '$match->teamlocal', team_local ),
        score_local = if( strcmp('$match->scorelocal'  , '' ) = 1  , '$match->scorelocal', score_local ),
        team_visitant = if( strcmp('$match->teamvisitant'  , '' ) = 1  , '$match->teamvisitant', team_visitant ),
        score_visitant = if( strcmp('$match->scorevisitant'  , '' ) = 1  , '$match->scorevisitant', score_visitant ),
        cod_tournament = if( strcmp('$match->codtournament'  , '' ) = 1  , '$match->codtournament', cod_tournament ),
        description = if( strcmp('$match->description'  , '' ) = 1  , '$match->description', description ),
        description_place = if( strcmp('$match->descriptionplace'  , '' ) = 1  , '$match->descriptionplace', description_place ),
        numjornada = if( strcmp('$match->numjornada'  , '' ) = 1  , '$match->numjornada', numjornada ),
        estate = if( strcmp('$match->estate'  , '' ) = 1  , '$match->estate', estate ),
        arbitros = if( strcmp('$match->arbitros'  , '' ) = 1  , '$match->arbitros', arbitros ),
        state_score_visitant = if( strcmp('$match->statescorevisitant'  , '' ) = 1  , '$match->statescorevisitant', state_score_visitant ),
        state_score_local = if( strcmp('$match->statescorelocal'  , '' ) = 1  , '$match->statescorelocal', state_score_local ),
        goles_favor_local = if( strcmp('$match->golesfavorlocal'  , '' ) = 1  , '$match->golesfavorlocal', goles_favor_local ),
        goles_contra_local = if( strcmp('$match->golescontralocal'  , '' ) = 1  , '$match->golescontralocal', goles_contra_local ),
        goles_favor_visitant = if( strcmp('$match->golesfavorvisitant'  , '' ) = 1  , '$match->golesfavorvisitant', goles_favor_visitant ),
        goles_contra_visitant = if( strcmp('$match->golescontravisitant'  , '' ) = 1  , '$match->golescontravisitant', goles_contra_visitant ) WHERE  cod_match =  '$match->codmatch'";
        return $this->executeUpdate($sql);
    }

    public function updateGolesContraVisitant($match){
        $sql = "UPDATE db_toquela.match AS m SET m.goles_contra_visitant = '$match->golescontravisitant' WHERE  m.cod_match =  '$match->codmatch'";
        return $this->executeUpdate($sql);
    }

    public function updateGolesFavorVisitant($match){
        $sql = "UPDATE db_toquela.match AS m SET m.goles_favor_visitant = '$match->golesfavorvisitant' WHERE  m.cod_match =  '$match->codmatch'";
        return $this->executeUpdate($sql);
    }

}
