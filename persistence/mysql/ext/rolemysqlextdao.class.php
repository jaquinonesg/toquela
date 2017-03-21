<?php 
 /**
 * Class that operate on table 'role'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-11-19 10:44
 */
 class RoleMySqlExtDAO extends RoleMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.role LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.role ";        
        return $this->getValue($sql);
    }
    
    public function getByIdRol($codrole) {
        $sql = "SELECT privilegios FROM db_toquela.`role` WHERE cod_role = $codrole;";
        return $this->getList($sql);
    }

    public function selectAll() {
        $sql = "SELECT * FROM db_toquela.`role`;";        
        return $this->getList($sql);
    }

    

	
}

?>