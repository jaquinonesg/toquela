<?php 
 /**
 * Class that operate on table 'user_has_experience'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:42
 */
class UserHasExperienceMySqlExtDAO extends UserHasExperienceMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.user_has_experience LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.user_has_experience ";        
        return $this->getValue($sql);
    }

    

	
}
  
?>
