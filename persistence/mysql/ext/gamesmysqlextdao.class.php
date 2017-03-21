<?php

/**
 * Class that operate on table 'games'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-24 11:30
 */
class GamesMySqlExtDAO extends GamesMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.games LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.games ";
        return $this->getValue($sql);
    }

    public function insertWithDatetime($games) {
        $this->set($games->datetimegame);
        $this->set($games->description);
        $this->set($games->status);
        $this->set($games->type);
        $this->set($games->codcomplex);
        $this->set($games->codteammanager);
        $this->set($games->codusermanager);
        $this->set($games->codteamrival);
        $this->set($games->codmatch);
        if ($games->codteamrival == 'null') {
            $sql = "INSERT INTO db_toquela.games ( datetimegame , description , status , type , cod_complex , cod_team_manager , cod_user_manager , cod_team_rival , cod_match ) 
                    VALUES (STR_TO_DATE('$games->datetimegame', '%Y-%d-%m %H: %i: %s'),'$games->description','$games->status','$games->type',null,'$games->codteammanager','$games->codusermanager',$games->codteamrival,'$games->codmatch')";
        }
        if ($games->codteamrival == '') {
            $sql = "INSERT INTO db_toquela.games ( datetimegame , description , status , type , cod_complex , cod_team_manager , cod_user_manager , cod_team_rival , cod_match ) 
                    VALUES (STR_TO_DATE('$games->datetimegame', '%Y-%d-%m %H: %i: %s'),'$games->description','$games->status','$games->type',null,'$games->codteammanager','$games->codusermanager',null,'$games->codmatch')";
        } else {
            $sql = "INSERT INTO db_toquela.games ( datetimegame , description , status , type , cod_complex , cod_team_manager , cod_user_manager , cod_team_rival , cod_match ) 
                    VALUES (STR_TO_DATE('$games->datetimegame', '%Y-%d-%m %H: %i: %s'),'$games->description','$games->status','$games->type',null,'$games->codteammanager','$games->codusermanager','$games->codteamrival','$games->codmatch')";
        }
        $id = $this->executeInsert($sql);
        /* $games-> = $id; */
        return $id;
    }

    public function getByCodGame($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE cod_games = '$value'";
        return $this->getList($sql);
    }

    public function getSeccionesGames($limit_inicio = null, $limit_fin = null, $type = null, $cod_user = null, $cod_team = null) {
        $sql = "";
        $sql_limit = "";
        if (is_numeric($limit_inicio) && is_numeric($limit_fin)) {
            $sql_limit = " LIMIT $limit_inicio,$limit_fin";
        }

        $sql_where = "";
        if ($type !== null) {
            $sql_where = "WHERE g.type = '$type'";
        }

        if ($cod_team !== null) {
            $sql_where = "$sql_where AND g.cod_team_manager = '$cod_team'";
            $sql = "SELECT g.* from db_toquela.games AS g
                    INNER JOIN db_toquela.team AS t ON t.cod_team = g.cod_team_manager
                    $sql_where $sql_limit";
        } else {
            if ($cod_user !== null) {
                $sql = "SELECT g.* from db_toquela.games AS g
                       $sql_where AND g.cod_user_manager = '$cod_user' $sql_limit";
            } else {
                $sql = "SELECT g.* from db_toquela.games AS g $sql_where " . $sql_limit;
            }
        }
        return $this->getList($sql);
    }

    public function getCountGamesByType($type, $cod_team = null, $cod_user = null) {
        $sql_where = "";
        if ($type !== null) {
            $sql_where = "WHERE g.type = '$type'";
        }
        if ($cod_team !== null) {
            $sql_where = "$sql_where AND g.cod_team_manager = '$cod_team'";
            $sql = "SELECT COUNT(*) as Total FROM db_toquela.games AS g
                    INNER JOIN db_toquela.team AS t ON t.cod_team = g.cod_team_manager
                    $sql_where";
        } else {
            if ($cod_user !== null) {
                $sql = "SELECT COUNT(*) as Total FROM db_toquela.games AS g
                       $sql_where AND g.cod_user_manager = '$cod_user';";
            } else {
                $sql = "SELECT COUNT(*) as Total FROM db_toquela.games AS g $sql_where ;";
            }
        }
        $result = $this->getRow($sql, true);
        return $result->Total;
    }

    public function getGamesBuscador($strequipo = "", $genero = null, $tipo_futbol = null, $limit_init = null, $limit_pag = null, $get_total = false, $type = null, $cod_user_manager = null, $cod_team = null) {
        $sqllimit = "";
        if (is_numeric($limit_init) && is_numeric($limit_pag)) {
            $sqllimit = " LIMIT $limit_init, $limit_pag";
        }

        $sql_where = "";
        if (($strequipo != "") && isset($genero)) {
            if ($cod_user_manager === null) {
                $sql_where = "t.type='$genero' AND t.`name` LIKE '%$strequipo%' AND g.type = '$type'";
            } else {
                $sql_where = "t.type='$genero' AND t.`name` LIKE '%$strequipo%' AND g.type = '$type' AND cod_user_manager = '$cod_user_manager'";
            }
        } else {
            if ($strequipo != "") {
                if ($cod_user_manager === null) {
                    $sql_where = "t.`name` LIKE '%$strequipo%' AND g.type = '$type'";
                } else {
                    $sql_where = "t.`name` LIKE '%$strequipo%' AND g.type = '$type' AND cod_user_manager = '$cod_user_manager'";
                }
            }
            if (isset($genero)) {
                if ($cod_user_manager === null) {
                    $sql_where = "t.type='$genero' AND g.type = '$type'";
                } else {
                    $sql_where = "t.type='$genero' AND g.type = '$type' AND cod_user_manager = '$cod_user_manager'";
                }
            }
        }
        if (is_numeric($tipo_futbol)) {
            if ($sql_where == "") {
                if ($cod_user_manager === null) {
                    $sql_where = "thv.cod_virtues = '$tipo_futbol' AND g.type = '$type'";
                } else {
                    $sql_where = "thv.cod_virtues = '$tipo_futbol' AND g.type = '$type' AND cod_user_manager = '$cod_user_manager'";
                }
            } else {
                if ($cod_user_manager === null) {
                    $sql_where = "thv.cod_virtues = '$tipo_futbol' AND g.type = '$type' AND " . $sql_where;
                } else {
                    $sql_where = "thv.cod_virtues = '$tipo_futbol' AND g.type = '$type' AND cod_user_manager = '$cod_user_manager' AND " . $sql_where;
                }
            }
            if ($get_total) {
                if (!isset($cod_team)) {
                    $sql = "SELECT COUNT(g.cod_team_manager) 'num' 
                        FROM db_toquela.`games` AS g
                        INNER JOIN db_toquela.`team` AS t ON t.cod_team = g.cod_team_manager
                        INNER JOIN db_toquela.`team_has_virtues` AS thv ON thv.cod_team = g.cod_team_manager 
                        JOIN db_toquela.`virtues` AS v ON thv.cod_virtues = v.cod_virtues 
                        WHERE $sql_where;";
                } else {
                    $sql = "SELECT COUNT(g.cod_team_manager) 'num' 
                        FROM db_toquela.`games` AS g
                        INNER JOIN db_toquela.`team` AS t ON t.cod_team = g.cod_team_manager
                        INNER JOIN db_toquela.`team_has_virtues` AS thv ON thv.cod_team = g.cod_team_manager 
                        JOIN db_toquela.`virtues` AS v ON thv.cod_virtues = v.cod_virtues 
                        WHERE t.cod_team = '$cod_team' AND $sql_where;";
                }
            } else {
                if (!isset($cod_team)) {
                    $sql = "SELECT
                        g.*
                        FROM
                        db_toquela.`games` AS g
                        INNER JOIN db_toquela.`team` AS t ON t.cod_team = g.cod_team_manager
                        INNER JOIN db_toquela.`team_has_virtues` AS thv ON thv.cod_team = g.cod_team_manager
                        JOIN db_toquela.`virtues` AS v ON thv.cod_virtues = v.cod_virtues WHERE $sql_where
                        ORDER BY g.cod_team_manager ASC$sqllimit;";
                } else {
                    $sql = "SELECT
                        g.*
                        FROM
                        db_toquela.`games` AS g
                        INNER JOIN db_toquela.`team` AS t ON t.cod_team = g.cod_team_manager
                        INNER JOIN db_toquela.`team_has_virtues` AS thv ON thv.cod_team = g.cod_team_manager
                        JOIN db_toquela.`virtues` AS v ON thv.cod_virtues = v.cod_virtues 
                        WHERE t.cod_team = '$cod_team' AND $sql_where
                        ORDER BY g.cod_team_manager ASC$sqllimit;";
                }
            }
        } else {
            $sql_where = "WHERE " . $sql_where;
            if ($get_total) {
                $sql = "SELECT COUNT(g.cod_team_manager) 'num' 
                        FROM db_toquela.`games` AS g
                        INNER JOIN db_toquela.`team` AS t ON t.cod_team = g.cod_team_manager $sql_where;";
            } else {
                if (!isset($cod_team)) {
                    $sql = "SELECT 
                        g.*
                        FROM
                        db_toquela.`games` AS g
                        INNER JOIN db_toquela.`team` AS t ON t.cod_team = g.cod_team_manager
                        $sql_where ORDER BY g.cod_team_manager ASC$sqllimit;";
                } else {
                    $sql = "SELECT 
                        g.*
                        FROM
                        db_toquela.`games` AS g
                        INNER JOIN db_toquela.`team` AS t ON t.cod_team = g.cod_team_manager
                        $sql_where AND t.cod_team = '$cod_team' ORDER BY g.cod_team_manager ASC$sqllimit;";
                }
            }
        }
        if ($get_total) {
            return (int) $this->getRow($sql, true)->num;
        }
        return $this->getList($sql, true);
    }

    public function getByCodMatch($cod_games) {
        $this->set($cod_games);
        $sql = "SELECT cod_match FROM db_toquela.games WHERE cod_games  = '$cod_games'";
        return $this->getList($sql, true);
    }

    public function getReserva($cod_game) {
        $this->set($cod_game);
        $sql = "SELECT * FROM db_toquela.reserve WHERE cod_games  = '$cod_game'";
        return $this->getList($sql, true);
    }

}

?>