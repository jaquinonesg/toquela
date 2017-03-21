<?php

/**
 * Class that operate on table 'complex_has_attachment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class ComplexHasAttachmentMySqlExtDAO extends ComplexHasAttachmentMySqlDAO {

    public function deleteByComplex($cod_complex) {
        $sql = "DELETE FROM db_toquela.complex_has_attachment WHERE cod_complex  = '$cod_complex';";
        return $this->executeUpdate($sql);
    }

    public function hasReserve($cod_complex) {
        $sql = "SELECT COUNT(*) AS 'total' FROM db_toquela.reserve r
                    WHERE r.cod_sub_complex IN (SELECT cod_sub_complex FROM db_toquela.sub_complex WHERE cod_complex = '$cod_complex')";
        $object = $this->getRow($sql, true);
        return $object->total;
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM complex_has_attachment ";
        return $this->getValue($sql);
    }
    
     public function getBySubComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex_has_attachment WHERE cod_sub_complex = '$value'";
        return $this->getRow($sql, true);
    }

}

?>
