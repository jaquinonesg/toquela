<?php

/**
 * Clase que opera sobre la tabla 'games'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-07-24 15:50
 */
class GamesMySqlDAO extends ModelDAO implements GamesDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Games
     */
    public function load($codgames) {

        $this->set($codgames);
        $sql = "SELECT * FROM db_toquela.games WHERE  cod_games =  '$codgames'";
        return $this->getRow($sql);
    }

    /**
     * Obtiene todo los registro de la tabla
     */

    /**
     * Obtener todos los registro de las tablas
     */
    public function queryAll($limit = null, $page = null) {
        $extra = "";
        if (!is_null($page)) {
            $this->set($page);
            $this->set($limit);
            $page = abs((int) $page);
            if (!preg_match('!^\d+$!', $limit)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            if (!preg_match('!^\d+$!', $page)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            $limit = abs($limit);
            $extra = "  LIMIT $page , $limit";
        } elseif (!is_null($limit)) {
            if (!preg_match('!^\d+$!', $limit)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            $extra = " LIMIT $limit";
        }
        $sql = "SELECT * FROM db_toquela.games $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.games ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param games primary key
     */
    public function delete($codgames) {
        $this->set($codgames);
        $sql = "DELETE FROM db_toquela.games WHERE  cod_games =  '$codgames'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Games games
     */
    public function insert($games) {
        $this->set($games->datetimegame);
        $this->set($games->description);
        $this->set($games->status);
        $this->set($games->type);
        $this->set($games->codcomplex);
        $this->set($games->confirmcomplex);
        $this->set($games->codteammanager);
        $this->set($games->codusermanager);
        $this->set($games->codteamrival);
        $this->set($games->codmatch);
        $this->set($games->idcourtamateur);

        $sql = "INSERT INTO db_toquela.games ( datetimegame , description , status , type , cod_complex , confirm_complex , cod_team_manager , cod_user_manager , cod_team_rival , cod_match , idcourtamateur ) 
                    VALUES ('$games->datetimegame','$games->description','$games->status','$games->type','$games->codcomplex','$games->confirmcomplex','$games->codteammanager','$games->codusermanager','$games->codteamrival','$games->codmatch','$games->idcourtamateur')";
        $id = $this->executeInsert($sql);
        /* $games-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Games games
     */
    public function update($games) {
        $this->set($games->datetimegame);
        $this->set($games->description);
        $this->set($games->status);
        $this->set($games->type);
        $this->set($games->codcomplex);
        $this->set($games->confirmcomplex);
        $this->set($games->codteammanager);
        $this->set($games->codusermanager);
        $this->set($games->codteamrival);
        $this->set($games->codmatch);
        $this->set($games->idcourtamateur);

        $sql = "UPDATE db_toquela.games  SET 
		 datetimegame = if( strcmp('$games->datetimegame'  , '' ) = 1  , '$games->datetimegame', datetimegame ),
		 description = if( strcmp('$games->description'  , '' ) = 1  , '$games->description', description ),
		 status = if( strcmp('$games->status'  , '' ) = 1  , '$games->status', status ),
		 type = if( strcmp('$games->type'  , '' ) = 1  , '$games->type', type ),
		 cod_complex = if( strcmp('$games->codcomplex'  , '' ) = 1  , '$games->codcomplex', cod_complex ),
		 confirm_complex = if( strcmp('$games->confirmcomplex'  , '' ) = 1  , '$games->confirmcomplex', confirm_complex ),
		 cod_team_manager = if( strcmp('$games->codteammanager'  , '' ) = 1  , '$games->codteammanager', cod_team_manager ),
		 cod_user_manager = if( strcmp('$games->codusermanager'  , '' ) = 1  , '$games->codusermanager', cod_user_manager ),
		 cod_team_rival = if( strcmp('$games->codteamrival'  , '' ) = 1  , '$games->codteamrival', cod_team_rival ),
		 cod_match = if( strcmp('$games->codmatch'  , '' ) = 1  , '$games->codmatch', cod_match ),
		 idcourtamateur = if( strcmp('$games->idcourtamateur'  , '' ) = 1  , '$games->idcourtamateur', idcourtamateur ) WHERE  cod_games =  '$games->codgames'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.games';
        return $this->executeUpdate($sql);
    }

    public function queryByDatetimegame($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE datetimegame  = '$value'";
        return $this->getList($sql);
    }

    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE description  = '$value'";
        return $this->getList($sql);
    }

    public function queryByStatus($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE status  = '$value'";
        return $this->getList($sql);
    }

    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE type  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE cod_complex  = '$value'";
        return $this->getList($sql);
    }

    public function queryByConfirmComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE confirm_complex  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodTeamManager($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE cod_team_manager  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodUserManager($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE cod_user_manager  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodTeamRival($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE cod_team_rival  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodMatch($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE cod_match  = '$value'";
        return $this->getList($sql);
    }

    public function queryByIdcourtamateur($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.games WHERE idcourtamateur  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByDatetimegame($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE datetimegame  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE description  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByStatus($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE status  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE type  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE cod_complex  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByConfirmComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE confirm_complex  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodTeamManager($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE cod_team_manager  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodUserManager($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE cod_user_manager  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodTeamRival($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE cod_team_rival  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodMatch($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE cod_match  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByIdcourtamateur($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.games WHERE idcourtamateur  = '$value'";
        return $this->executeUpdate($sql);
    }

    /**
     * Read row
     *
     * @return Games 
     */
    protected function readRow($row) {
        $games = new Games();
        $games->codgames = $row['cod_games'];
        $games->datetimegame = $row['datetimegame'];
        $games->description = $row['description'];
        $games->status = $row['status'];
        $games->type = $row['type'];
        $games->codcomplex = $row['cod_complex'];
        $games->confirmcomplex = $row['confirm_complex'];
        $games->codteammanager = $row['cod_team_manager'];
        $games->codusermanager = $row['cod_user_manager'];
        $games->codteamrival = $row['cod_team_rival'];
        $games->codmatch = $row['cod_match'];
        $games->idcourtamateur = $row['idcourtamateur'];
        return $games;
    }

    public function describe() {
        $sql = "DESC db_toquela.games";
        return $this->getList($sql, true);
    }

}

?>