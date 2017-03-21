<?php

/**
 * Clase que opera sobre la tabla 'postulategame'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-06-27 15:24
 */
class PostulategameMySqlDAO extends ModelDAO implements PostulategameDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Postulategame
     */
    public function load($codpostulategame) {

        $this->set($codpostulategame);
        $sql = "SELECT * FROM db_toquela.postulategame WHERE  cod_postulategame =  '$codpostulategame'";
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
        $sql = "SELECT * FROM db_toquela.postulategame $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.postulategame ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param postulategame primary key
     */
    public function delete($codpostulategame) {

        $this->set($codpostulategame);
        $sql = "DELETE FROM db_toquela.postulategame WHERE  cod_postulategame =  '$codpostulategame'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Postulategame postulategame
     */
    public function insert($postulategame) {
        $this->set($postulategame->codgames);
        $this->set($postulategame->codteam);
        $this->set($postulategame->status);

        $sql = "INSERT INTO db_toquela.postulategame ( cod_games , cod_team , status ) 
                    VALUES ('$postulategame->codgames','$postulategame->codteam','$postulategame->status')";
        $id = $this->executeInsert($sql);
        /* $postulategame-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Postulategame postulategame
     */
    public function update($postulategame) {
        $this->set($postulategame->codpostulategame);
        $this->set($postulategame->codgames);
        $this->set($postulategame->codteam);
        $this->set($postulategame->status);

        $sql = "UPDATE db_toquela.postulategame  SET 
		 cod_games = if( strcmp('$postulategame->codgames'  , '' ) = 1  , '$postulategame->codgames', cod_games ),
		 cod_team = if( strcmp('$postulategame->codteam'  , '' ) = 1  , '$postulategame->codteam', cod_team ),
		 status = if( strcmp('$postulategame->status'  , '' ) = 1  , '$postulategame->status', status ) WHERE  cod_postulategame =  '$postulategame->codpostulategame'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.postulategame';
        return $this->executeUpdate($sql);
    }

    public function queryByCodGames($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.postulategame WHERE cod_games  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodTeam($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.postulategame WHERE cod_team  = '$value'";
        return $this->getList($sql);
    }

    public function queryByStatus($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.postulategame WHERE status  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByCodGames($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.postulategame WHERE cod_games  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodTeam($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.postulategame WHERE cod_team  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByStatus($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.postulategame WHERE status  = '$value'";
        return $this->executeUpdate($sql);
    }

    /**
     * Read row
     *
     * @return Postulategame 
     */
    protected function readRow($row) {
        $postulategame = new Postulategame();
        $postulategame->codpostulategame = $row['cod_postulategame'];
        $postulategame->codgames = $row['cod_games'];
        $postulategame->codteam = $row['cod_team'];
        $postulategame->status = $row['status'];
        return $postulategame;
    }

    public function describe() {
        $sql = "DESC db_toquela.postulategame";
        return $this->getList($sql, true);
    }

}

?>