<?php

/**
 * Clase que opera sobre la tabla 'followers'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class FollowersMySqlDAO extends ModelDAO implements FollowersDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Followers
     */
    public function load($from, $to) {

        $this->set($from);
        $this->set($to);
        $sql = "SELECT * FROM db_toquela.followers WHERE  from =  '$from' AND  to =  '$to'";
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
        $sql = "SELECT * FROM db_toquela.followers $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.followers ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param followers primary key
     */
    public function delete($from, $to) {

        $this->set($from);
        $this->set($to);
        $sql = "DELETE FROM db_toquela.followers WHERE  `from` =  '$from' AND  `to` =  '$to'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Followers followers
     */
    public function insert($followers) {
        $sql = "INSERT INTO db_toquela.followers  ( `from` , `to` )
                    VALUES ('$followers->from','$followers->to')";
        $id = $this->executeInsert($sql);
        /* $followers-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Followers followers
     */
    public function update($followers) {
        ;

        $sql = "UPDATE db_toquela.followers  SET  WHERE  from =  '$followers->from' AND  to =  '$followers->to'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.followers';
        return $this->executeUpdate($sql);
    }

    /**
     * Read row
     *
     * @return Followers 
     */
    protected function readRow($row) {
        $followers = new Followers();
        $followers->from = $row['from'];
        $followers->to = $row['to'];
        return $followers;
    }

    public function describe() {
        $sql = "DESC db_toquela.followers";
        return $this->getList($sql, true);
    }

}

?>