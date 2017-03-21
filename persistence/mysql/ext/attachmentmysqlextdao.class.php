<?php

/**
 * Class that operate on table 'attachment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class AttachmentMySqlExtDAO extends AttachmentMySqlDAO {

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

    public function getPhotosAndVideosUser($cod_user) {
        $this->set($cod_user);
        $sql = "SELECT 
            a.`cod_attachment`,
            uha.`cod_user`,
            uha.`type`,
            a.`path` 
          FROM
            db_toquela.`user_has_attachment` AS uha 
            INNER JOIN db_toquela.`attachment` AS a 
              ON uha.`cod_attachment` = a.`cod_attachment` 
          WHERE uha.`cod_user` = '$cod_user' 
            AND (uha.`type` = 'FOTO' OR uha.`type` = 'YOUTUBE')
          ORDER BY uha.variable DESC;";
        return $this->getList($sql, true);
    }
    
    public function getPhotosUser($cod_user) {
        $this->set($cod_user);
        $sql = "SELECT 
            a.`cod_attachment`,
            uha.`cod_user`,
            uha.`type`,
            a.`path` 
          FROM
            db_toquela.`user_has_attachment` AS uha 
            INNER JOIN db_toquela.`attachment` AS a 
              ON uha.`cod_attachment` = a.`cod_attachment` 
          WHERE uha.`cod_user` = '$cod_user' 
            AND uha.`type` = 'FOTO'
          ORDER BY uha.variable DESC 
          LIMIT 10 ";
        return $this->getList($sql, true);
    }

    public function getYoutubeVideosUser($cod_user) {
        $this->set($cod_user);
        $sql = "SELECT
                    * 
                  FROM
                    db_toquela.attachment a,
                    db_toquela.user_has_attachment uha 
                  WHERE a.cod_attachment = uha.cod_attachment 
                    AND uha.cod_user = '$cod_user'
                    AND uha.type = 'YOUTUBE' 
                  ORDER BY uha.variable DESC
                  LIMIT 10
                  ";
        return $this->getList($sql, true);
    }

}

?>
