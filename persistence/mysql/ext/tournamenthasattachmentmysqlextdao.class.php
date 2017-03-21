<?php 
 /**
 * Class that operate on table 'tournament_has_attachment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-11-12 11:26
 */
class TournamentHasAttachmentMySqlExtDAO extends TournamentHasAttachmentMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM tournament_has_attachment LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM tournament_has_attachment ";        
        return $this->getValue($sql);
    }

    

	
}

?>