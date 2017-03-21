<?php

/**
 * Class that operate on table 'postulategame'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-06-24 11:36
 */
class PostulategameMySqlExtDAO extends PostulategameMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.postulategame LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.postulategame ";
        return $this->getValue($sql);
    }

    public function insertWithCodGame($postulategame) {
        $this->set($postulategame->codgames);
        $this->set($postulategame->codteam);
        $this->set($postulategame->status);
        $sql = "INSERT INTO db_toquela.postulategame ( cod_games, cod_team , status ) 
                    VALUES ('$postulategame->codgames','$postulategame->codteam','$postulategame->status')";
        $id = $this->executeInsert($sql);
        /* $postulategame-> = $id; */
        return $id;
    }

    public function getExistPostulate($cod_games, $cod_team) {
        $sql = "SELECT cod_postulategame FROM db_toquela.postulategame AS p WHERE p.cod_games = '$cod_games' AND p.cod_team = '$cod_team';";
        return $this->getList($sql);
    }

    public function getByPostulate($codGames, $status, $limit_inicio, $limit_fin, $coduser = null) {
        $this->set($codGames);
        $sql_limit = "";
        if (is_numeric($limit_inicio) && is_numeric($limit_fin)) {
            $sql_limit = " LIMIT $limit_inicio,$limit_fin";
        }
        if (is_numeric($coduser)) {
            $sql = "SELECT p.cod_team,p.cod_postulategame,t.name 
                    FROM db_toquela.postulategame AS p
                    INNER JOIN db_toquela.team AS t ON p.cod_team = t.cod_team
                    INNER JOIN db_toquela.`user_has_team` AS uth ON t.cod_team = uth.cod_team
                    WHERE uth.cod_user = '$coduser' AND uth.`status` != '" . UserHasTeam::STATUS_POSTULANT . "'
                    AND p.cod_games  = '$codGames' AND p.status = '$status' ORDER BY p.cod_games  $sql_limit;";
        } else {
            $sql = "SELECT p.cod_team,p.cod_postulategame,t.name 
                    FROM db_toquela.postulategame AS p
                    INNER JOIN db_toquela.team AS t ON p.cod_team = t.cod_team
                    WHERE cod_games  = '$codGames' AND status = '$status' ORDER BY cod_games $sql_limit";
        }
        return $this->getList($sql, true);
    }

    public function getByMyPostulates($coduser) {

        return $this->getList($sql, true);
    }

    public function queryByNameTeam($cod_team) {
        $this->set($cod_team);
        $sql = "SELECT name FROM db_toquela.team WHERE cod_team  = '$cod_team'";
        return $this->getList($sql, true);
    }

}

?>