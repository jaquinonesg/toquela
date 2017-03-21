<?php

class Paginator {

    private $_db;
    private $_limit;
    private $_registers;
    private $_query;
    private $_count_registers;
    private $_rango;

    public function __construct() {
        $this->_db = Db::database();
        $this->_limit = 10;
        $this->_rango = 4;
        $this->_query = null;
        $this->_count_registers = null;
    }

    public function setLimit($limit) {
        if (is_numeric($limit)) {
            $this->_limit = $limit;
        }
    }
    /**
     * Numero de paginas a mostrar
     * @param type $rango
     */
    public function setRango($rango) {
        if (is_numeric($rango)) {
            $this->_rango = $rango;
        }
    }

    public function setQuery($query) {
        if (!empty($query)) {
            $this->_query = $query;
            $this->_registers = array();
        }
    }

    public function setCount_registers($count) {
        if (!empty($count)) {
            $this->_count_registers = $count;
        }
    }

    public function paginate($pagina = false, $in_object = false) {
        if (is_numeric($this->_limit) && !empty($this->_query)) {
            if ($pagina && is_numeric($pagina)) {
                $pagina = $pagina;
                $inicio = ($pagina - 1) * $this->_limit;
            } else {
                $pagina = 1;
                $inicio = 0;
            }
            if (is_null($this->_count_registers)) {
                $pos = strpos($this->_query, "FROM");
                $queryCount = "SELECT COUNT(*) AS 'total' " . substr($this->_query, $pos);
                $this->_db->query = $queryCount;
                $row = $this->_db->get_results_from_query();
                $registros = $row[0]['total'];
            } else {
                $registros = $this->_count_registers;
            }
            $from = ($pagina - 1) * $this->_limit;
            $this->_query .= " LIMIT $from, $this->_limit;";
            $this->_getQuery($in_object);

            $total = ceil($registros / $this->_limit);

            $paginacion = array();
            $paginacion['present'] = $pagina;
            $paginacion['total'] = $total;
            if ($pagina > 1) {
                $paginacion['first'] = 1;
                $paginacion['previous'] = $pagina - 1;
            } else {
                $paginacion['first'] = null;
                $paginacion['previous'] = null;
            }

            if ($pagina < $total) {
                $paginacion['last'] = $total;
                $paginacion['next'] = $pagina + 1;
            } else {
                $paginacion['last'] = null;
                $paginacion['next'] = null;
            }

            $total_paginas = $paginacion['total'];
            $pagina_seleccionada = $paginacion['present'];
            $rango = $this->_rango / 2;
            $paginas = array();

            $rango_derecho = $total_paginas - $pagina_seleccionada;
            if ($rango_derecho < $rango) {
                $resto = $rango - $rango_derecho;
            } else {
                $resto = 0;
            }
            $rango_izquierdo = $pagina_seleccionada - ($rango + $resto);
            for ($i = $pagina_seleccionada; $i > $rango_izquierdo; $i--) {
                if ($i == 0) {
                    break;
                }
                $paginas[] = $i;
            }
            sort($paginas);
            if ($pagina_seleccionada < $rango) {
                $rango_derecho = $this->_limit;
            } else {
                $rango_derecho = $pagina_seleccionada + $rango;
            }
            for ($i = $pagina_seleccionada + 1; $i <= $rango_derecho; $i++) {
                if ($i > $total_paginas) {
                    break;
                }
                $paginas[] = $i;
            }
            $paginacion['range'] = $paginas;
            return $paginacion;
        }
        throw new Exception('Error, paginator.');
    }

    public function getRegisters() {
        return $this->_registers;
    }

    private function _getQuery($object) {
        if (!empty($this->_query)) {
            $this->_db->query = $this->_query;
            $rows = $this->_db->get_results_from_query($object);
            if ($this->_db->num_rows() > 0) {
                $this->_registers = $rows;
                return $rows;
            }
            return null;
        }
    }

}