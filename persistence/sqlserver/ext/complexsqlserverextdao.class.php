<?php

/**
 * Class that operate on table 'complex'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class ComplexSqlServerExtDAO extends ComplexSqlServerDAO {

    public function getAttachments($cod_complex) {
        $sql = "SELECT a.* FROM db_toquela.attachment a, db_toquela.complex_has_attachment h 
                    WHERE h.cod_attachment = a.cod_attachment AND h.cod_complex = $cod_complex;";
        return $this->getList($sql, true);
    }

    public function getCountAttachments($cod_complex) {
        $sql = "SELECT count(*) as 'total' FROM db_toquela.attachment a, db_toquela.complex_has_attachment h 
                    WHERE h.cod_attachment = a.cod_attachment AND h.cod_complex = $cod_complex;";
        return $this->getRow($sql);
    }

    //jorge
    public function getComplejosMap() {
        $query = "SELECT c.cod_complex, c.name, c.address, c.lat, c.lng FROM db_toquela.complex AS c";
        return $this->getList($query, true);
    }

    public function get_complex_map($idComplex) {
        $query = "SELECT c.cod_complex, c.name, c.address, c.lat, c.lng FROM db_toquela.complex AS c WHERE c.cod_complex = $idComplex";
        return $this->getList($query, true);
    }

}
