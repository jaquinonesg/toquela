<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once CORE_PATH . '/drivers/mysql.driver.php';

abstract class ModelDAO {

    public $_db;

    public function __construct() {
        $this->_db = MySql::getInstance();
    }

    /**
     * Read row
     *
     * @return CategoriaMySql 
     */
    abstract protected function readRow($row);

    /**
     * Obtenemos la lista de objetos en peticón a la consulta ($sql)
     * 
     * @param string $sql = consulta SQL
     * @param boolean $as_object = recorre la consulta devolviendo cada una de sus filas como objetos
     * @param boolean $as_array = devuelve la lista como array sencillo.
     * @return null = lista de objetos o array de objetos
     */
    protected function getList($sql, $as_object = false, $as_array = false) {
        $this->_db->query = $sql;
        $rows = $this->_db->get_results_from_query();
        $list = array();
        if ($this->_db->num_rows() == 0) {
            return null;
        }
        if ($as_array) {
            return $rows;
        }
        foreach ($rows as $row) {
            if ($as_object === false) {
                $list[] = $this->readRow($row);
            } elseif ($as_object === true) {
                $list[] = $this->readobject($row);
            }
        }
        return $list;
    }

    /**
     * Obtiene un objeto para retornar
     *
     * @return CategoriaMySql 
     */
    protected function getRow($sql, $as_object = false) {
        $this->_db->query = $sql;
        $rows = $this->_db->get_results_from_query();

        if ($this->_db->num_rows() == 0) {
            return null;
        }
        if ($as_object === false) {
            return $this->readRow($rows[0]);
        } else {
            return $this->readobject($rows[0]);
        }
    }
    protected function getArray($sql, $as_object = false) {
        $this->_db->query = $sql;
        $rows = $this->_db->get_results_from_query();

        if ($this->_db->num_rows() == 0) {
            return null;
        }
        if ($as_object === false) {
            return $rows;
        } else {
            return $rows;
        }
    }

    public function executeUpdate($sql) {
        $this->_db->query = $sql;
        $this->_db->execute_query();
        return $this->_db->getAffectedRows();
    }

    public function executeInsert($sql) {
        $this->_db->query = $sql;
        $this->_db->execute_query();
        return $this->_db->getLastId();
    }

    public function set(&$value) {
        $this->_db->set($value);
    }

    protected function getValue($sql) {
        $this->_db->query = $sql;
        $rows = $this->_db->get_results_from_query();
        if ($this->_db->num_rows() == 0) {
            return null;
        }
        return (int) $rows[0]['total'];
    }

    private function readobject($row) {
        $std = new stdClass;
        foreach ($row as $k => $v) {
            $property = str_replace("_", "", $k);
            $std->$property = $v;
        }
        return (object) $std;
    }

}
