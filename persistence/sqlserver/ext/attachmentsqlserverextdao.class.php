<?php

/**
 * Class that operate on table 'attachment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class AttachmentSqlServerExtDAO extends AttachmentSqlServerDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.attachment LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.attachment ";
        return $this->getValue($sql);
    }

    public function getPhotosUser($cod_user) {
        $this->set($cod_user);
        $sql = "SELECT TOP 10
                    * 
                  FROM
                    db_toquela.attachment a,
                    db_toquela.user_has_attachment uha 
                  WHERE a.cod_attachment = uha.cod_attachment 
                    AND uha.cod_user = '$cod_user'
                    AND uha.type = 'PHOTO' 
                  ORDER BY uha.variable DESC
                  ";
        return $this->getList($sql, true);
    }

    public function getYoutubeVideosUser($cod_user) {
        $this->set($cod_user);
        $sql = "SELECT TOP 10
                    * 
                  FROM
                    db_toquela.attachment a,
                    db_toquela.user_has_attachment uha 
                  WHERE a.cod_attachment = uha.cod_attachment 
                    AND uha.cod_user = '$cod_user'
                    AND uha.type = 'YOUTUBE' 
                  ORDER BY uha.variable DESC
                  ";
        return $this->getList($sql, true);
    }   

}

?>
