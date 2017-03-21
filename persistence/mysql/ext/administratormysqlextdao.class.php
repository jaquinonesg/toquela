<?php

/**
 * Class that operate on table 'administrator'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class AdministratorMySqlExtDAO extends AdministratorMySqlDAO {

    public function login($email, $password) {
        $sql = "SELECT * FROM db_toquela.administrator WHERE email = '$email' AND password = '" . sha1($password) . "';";
//        $sql = "SELECT * FROM db_toquela.administrator WHERE email = '$email';";
        return $this->getRow($sql, true);
    }

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM administrator LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM administrator ";
        return $this->getValue($sql);
    }

    

	
}

?>
