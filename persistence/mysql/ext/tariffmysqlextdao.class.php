<?php 
 /**
 * Class that operate on table 'tariff'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class TariffMySqlExtDAO extends TariffMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.tariff LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.tariff ";        
        return $this->getValue($sql);
    }

    

	
}
  
?>
