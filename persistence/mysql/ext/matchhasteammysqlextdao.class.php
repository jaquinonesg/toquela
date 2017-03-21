<?php 
 /**
 * Class that operate on table 'match_has_team'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class MatchHasTeamMySqlExtDAO extends MatchHasTeamMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.match_has_team LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.match_has_team ";        
        return $this->getValue($sql);
    }

    

	
}
  
?>
