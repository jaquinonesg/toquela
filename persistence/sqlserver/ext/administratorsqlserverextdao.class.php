<?php

/**
 * Class that operate on table 'administrator'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class AdministratorSqlServerExtDAO extends AdministratorSqlServerDAO {

    public function login($email, $password) {
        $sql = "SELECT * FROM db_toquela.administrator WHERE email = '$email' AND password = '" . sha1($password) . "';";
//        $sql = "SELECT * FROM db_toquela.administrator WHERE email = '$email';";
        return $this->getRow($sql, true);
    }

}
