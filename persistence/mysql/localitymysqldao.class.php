<?php

/**
 * Clase que opera sobre la tabla 'locality'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class LocalityMySqlDAO extends ModelDAO implements LocalityDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Locality
     */
    public function load($codlocality) {
        $this->set($codlocality);
        $sql = "SELECT * FROM db_toquela.locality WHERE cod_locality = '$codlocality'";
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
        $sql = "SELECT * FROM db_toquela.locality $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.locality ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param locality primary key
     */
    public function delete($codlocality) {

        $this->set($codlocality);
        $sql = "DELETE FROM db_toquela.locality WHERE  cod_locality =  '$codlocality'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Locality locality
     */
    public function insert($locality) {
        $this->set($locality->name);
        $this->set($locality->codcity);
        $this->set($locality->main);

        $sql = "INSERT INTO db_toquela.locality ( name , cod_city , main ) 
                    VALUES ('$locality->name','$locality->codcity','$locality->main')";
        $id = $this->executeInsert($sql);
        /* $locality-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Locality locality
     */
    public function update($locality) {
        $this->set($locality->name);
        $this->set($locality->codcity);
        $this->set($locality->main);

        $sql = "UPDATE db_toquela.locality  SET 
		 name = if( strcmp('$locality->name'  , '' ) = 1  , '$locality->name', name ),
		 cod_city = if( strcmp('$locality->codcity'  , '' ) = 1  , '$locality->codcity', cod_city ),
		 main = if( strcmp('$locality->main'  , '' ) = 1  , '$locality->main', main ) WHERE  cod_locality =  '$locality->codlocality'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.locality';
        return $this->executeUpdate($sql);
    }

    public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.locality WHERE name  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodCity($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.locality WHERE cod_city  = '$value'";
        return $this->getList($sql);
    }

    public function queryByMain($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.locality WHERE main  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.locality WHERE name  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByCodCity($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.locality WHERE cod_city  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByMain($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.locality WHERE main  = '$value'";
        return $this->executeUpdate($sql);
    }

    /**
     * Read row
     *
     * @return Locality 
     */
    protected function readRow($row) {
        $locality = new Locality();
        $locality->codlocality = $row['cod_locality'];
        $locality->name = $row['name'];
        $locality->codcity = $row['cod_city'];
        $locality->main = $row['main'];
        return $locality;
    }

    public function describe() {
        $sql = "DESC db_toquela.locality";
        return $this->getList($sql, true);
    }

}

?>