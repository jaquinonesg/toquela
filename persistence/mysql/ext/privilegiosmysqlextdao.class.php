<?php 
 /**
 * Class that operate on table 'privilegios'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-11-19 10:44
 */
 class PrivilegiosMySqlExtDAO extends PrivilegiosMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.privilegios LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.privilegios ";        
        return $this->getValue($sql);
    }

    public function selectAll() {
        $sql = "SELECT * FROM db_toquela.`privilegios` AS p WHERE p.idprivilegios <> '1'";        
        return $this->getList($sql);
    }

    

	
}

?>