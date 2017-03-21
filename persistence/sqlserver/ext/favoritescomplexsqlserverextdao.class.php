<?php

/**
 * Class that operate on table 'favorites_complex'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:42
 */
class FavoritesComplexSqlServerExtDAO extends FavoritesComplexSqlServerDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.favorites_complex LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.favorites_complex ";
        return $this->getValue($query);
    }

    public function getComplexbyUser($cod_user) {
        $sql = "SELECT c.* ,
                   (SELECT COUNT(cod_sub_complex) FROM db_toquela.sub_complex WHERE cod_complex = c.cod_complex ) AS 'canchas',
                   (SELECT TOP 1 a.path FROM db_toquela.attachment a , db_toquela.complex_has_attachment cha WHERE cha.cod_attachment = a.cod_attachment AND cha.cod_complex = c.cod_complex ) AS 'image'
                FROM 
                    db_toquela.complex c,
                    db_toquela.favorites_complex fc
                WHERE 
                    c.cod_complex = fc.cod_complex
                AND fc.cod_user = '$cod_user'";
        return $this->getList($sql, true);
    }

    public function deleteByComplex($cod_complex) {
        $sql = "DELETE FROM db_toquela.favorites_complex WHERE cod_complex  = '$cod_complex';";
        return $this->executeUpdate($sql);
    }

}

?>
