<?php 
 /**
 * Class that operate on table 'fan'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-11-29 16:45
 */
 class FanMySqlExtDAO extends FanMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.fan LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.fan ";        
        return $this->getValue($sql);
    }
    
    public function getAllteamsFans() {
        $sql = "SELECT * FROM db_toquela.fan;";        
        return $this->getList($sql, true);
    }

    

	
}

?>