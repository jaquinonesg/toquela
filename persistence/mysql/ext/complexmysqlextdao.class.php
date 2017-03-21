<?php

/**
 * Class that operate on table 'complex'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class ComplexMySqlExtDAO extends ComplexMySqlDAO {

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

    public function getFavoritesComplex($cod_user) {
        $query = " SELECT * FROM complex a 
               JOIN favorites_complex b
                USING (cod_complex)
                WHERE 
                a.`cod_complex`=b.`cod_complex`
                AND b.`cod_user`=$cod_user;";
        return $this->getList($query, true);
    }

    public function getComplex() {
        $query = "SELECT  * FROM complex";
        return $this->getList($query, true);
    }

    public function queryAllComplex() {
        $sql = "SELECT * FROM db_toquela.complex AS c WHERE c.cod_complex > 1;";
        return $this->getList($sql);
    }

    public function getComplexBuscador($strcomplex = "", $limit_init = null, $limit_pag = null, $get_total = false, $isiframe = FALSE) {
        $sqllimit = "";
        if (is_numeric($limit_init) && is_numeric($limit_pag)) {
            $sqllimit = "LIMIT $limit_init, $limit_pag";
        }
        $sql_where = "";
        if (($strcomplex != "") || !empty($strcomplex)) {
            $sql_where .= "AND (c.`name` LIKE '%$strcomplex%' OR c.description LIKE '%$strcomplex%') ";
        }
        if (!$isiframe) {
            if ($get_total) {
                $sql = "SELECT COUNT(c.cod_complex) 'num' FROM db_toquela.complex AS c WHERE c.`cod_complex` > 1 $sql_where;";
            } else {
                $sql = "SELECT *, (SELECT a.path FROM complex_has_attachment AS cha INNER JOIN attachment AS a ON cha.cod_attachment = a.cod_attachment WHERE cha.cod_complex = c.cod_complex AND ISNULL(cha.cod_sub_complex) LIMIT 1) 'poster' FROM db_toquela.complex AS c WHERE c.`cod_complex` > 1 $sql_where $sqllimit;";
            }
        }else{
            /*Para cargar complejos con canchas*/
            if ($get_total) {
                $sql = "SELECT COUNT(DISTINCT c.cod_complex, c.cod_complex) 'num'
                        FROM db_toquela.complex AS c
                        INNER JOIN db_toquela.sub_complex AS sc ON sc.cod_complex = c.cod_complex
                        WHERE c.`cod_complex` > 1 $sql_where;";
            } else {
                $sql = "SELECT 
                        DISTINCT c.cod_complex,c.address,c.description,c.`name`,c.if_qualification, 
                        (SELECT a.path FROM complex_has_attachment AS cha INNER JOIN attachment AS a ON cha.cod_attachment = a.cod_attachment WHERE cha.cod_complex = c.cod_complex AND ISNULL(cha.cod_sub_complex) LIMIT 1) 'poster'
                        FROM db_toquela.complex AS c 
                        INNER JOIN db_toquela.sub_complex AS sc ON sc.cod_complex = c.cod_complex
                        WHERE c.`cod_complex` > 1 
                        $sql_where $sqllimit;";
            }
        }
        if ($get_total) {
            return (int) $this->getRow($sql, true)->num;
        }
        return $this->getList($sql, true);
    }

}
