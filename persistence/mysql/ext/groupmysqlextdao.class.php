<?php 
 /**
 * Class that operate on table 'group'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-11-12 11:26
 */
class GroupMySqlExtDAO extends GroupMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM group LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM group ";        
        return $this->getValue($sql);
    }

    

	
}

?>