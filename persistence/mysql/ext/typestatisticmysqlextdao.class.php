<?php 
 /**
 * Class that operate on table 'type_statistic'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-11-12 11:26
 */
class TypeStatisticMySqlExtDAO extends TypeStatisticMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM type_statistic LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM type_statistic ";        
        return $this->getValue($sql);
    }

    

	
}

?>