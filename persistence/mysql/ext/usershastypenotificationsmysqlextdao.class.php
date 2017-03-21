<?php 
 /**
 * Class that operate on table 'users_has_typenotifications'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-02-03 11:36
 */
 class UsersHasTypenotificationsMySqlExtDAO extends UsersHasTypenotificationsMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.users_has_typenotifications LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.users_has_typenotifications ";        
        return $this->getValue($sql);
    }

    

	
}

?>