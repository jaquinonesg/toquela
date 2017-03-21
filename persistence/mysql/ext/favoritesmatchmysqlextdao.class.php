<?php

/**
 * Class that operate on table 'favorites_match'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class FavoritesMatchMySqlExtDAO extends FavoritesMatchMySqlDAO {

    public function deleteByComplex($cod_complex) {
        $sql = "DELETE FROM db_toquela.favorites_complex WHERE cod_complex = '$cod_complex';";
        return $this->executeUpdate($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM favorites_match ";
        return $this->getValue($sql);
    }

}

?>
