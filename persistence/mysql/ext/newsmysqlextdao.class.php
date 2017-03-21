<?php

/**
 * Class that operate on table 'tournament'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class NewsMySqlExtDAO extends NewsMySqlDAO {

    public function getNewsByTournment($codtournament) {
        $sql = "SELECT * FROM news as n WHERE n.cod_tournament  = '$codtournament' order by n.date desc;";
        return $this->getList($sql);
    }

    public function insertNullDate($news) {
        $this->set($news->message);
        $this->set($news->type);
        $this->set($news->date);
        $this->set($news->codtournament);
        $this->set($news->coduser);
        $sql = "INSERT INTO news ( message , type , date , cod_tournament , cod_user ) 
                    VALUES ('$news->message','$news->type',NULL,'$news->codtournament','$news->coduser')";
        /* $news-> = $id; */
        return $this->executeInsert($sql);
    }

}
