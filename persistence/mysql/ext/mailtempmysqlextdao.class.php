<?php 
 /**
 * Class that operate on table 'mailtemp'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-02-03 11:36
 */
 class MailtempMySqlExtDAO extends MailtempMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.mailtemp LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.mailtemp ";        
        return $this->getValue($sql);
    }

    public function getLisTempMails($limitmails = 100){
        $sql = "SELECT * FROM db_toquela.mailtemp AS mt ORDER BY mt.prioritydate DESC, mt.priorityhour DESC LIMIT $limitmails;";
        return $this->getList($sql, true);
    }
    

	
}

?>