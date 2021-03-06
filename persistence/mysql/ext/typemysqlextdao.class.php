<?php 
 /**
 * Class that operate on table 'type'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class TypeMySqlExtDAO extends TypeMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.type LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.type ";        
        return $this->getValue($sql);
    }

    

	
}
  
?>
