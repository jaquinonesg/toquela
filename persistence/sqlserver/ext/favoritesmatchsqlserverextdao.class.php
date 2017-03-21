<?php

/**
 * Class that operate on table 'favorites_match'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class FavoritesMatchSqlServerExtDAO extends FavoritesMatchSqlServerDAO {

    public function deleteByComplex($cod_complex) {
        $sql = "DELETE FROM db_toquela.favorites_complex WHERE cod_complex = '$cod_complex';";
        return $this->executeUpdate($sql);
    }

}

?>
