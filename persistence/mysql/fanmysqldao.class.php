<?php

/**
 * Clase que opera sobre la tabla 'fan'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class FanMySqlDAO extends ModelDAO implements FanDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Fan
     */
    public function load($idfan) {
        $this->set($idfan);
        $sql = "SELECT * FROM db_toquela.fan WHERE  idfan =  '$idfan'";
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
        $sql = "SELECT * FROM db_toquela.fan $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.fan ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param fan primary key
     */
    public function delete($idfan) {

        $this->set($idfan);
        $sql = "DELETE FROM db_toquela.fan WHERE  idfan =  '$idfan'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Fan fan
     */
    public function insert($fan) {
        $this->set($fan->name);
        $this->set($fan->icon);

        $sql = "INSERT INTO db_toquela.fan ( idfan , name , icon ) 
                    VALUES ('$fan->idfan','$fan->name','$fan->icon')";
        $id = $this->executeInsert($sql);
        /* $fan-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Fan fan
     */
    public function update($fan) {
        $this->set($fan->name);
        $this->set($fan->icon);

        $sql = "UPDATE db_toquela.fan  SET 
		 name = if( strcmp('$fan->name'  , '' ) = 1  , '$fan->name', name ),
		 icon = if( strcmp('$fan->icon'  , '' ) = 1  , '$fan->icon', icon ) WHERE  idfan =  '$fan->idfan'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.fan';
        return $this->executeUpdate($sql);
    }

    public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.fan WHERE name  = '$value'";
        return $this->getList($sql);
    }

    public function queryByIcon($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.fan WHERE icon  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.fan WHERE name  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByIcon($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.fan WHERE icon  = '$value'";
        return $this->executeUpdate($sql);
    }

    /**
     * Read row
     *
     * @return Fan 
     */
    protected function readRow($row) {
        $fan = new Fan();
        $fan->idfan = $row['idfan'];
        $fan->name = $row['name'];
        $fan->icon = $row['icon'];
        return $fan;
    }

    public function describe() {
        $sql = "DESC db_toquela.fan";
        return $this->getList($sql, true);
    }

}

?>