<?php

/**
 * Class that operate on table 'user_has_attachment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:42
 */
class UserHasAttachmentMySqlExtDAO extends UserHasAttachmentMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.user_has_attachment LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.user_has_attachment ";
        return $this->getValue($sql);
    }

    public function getPhotProfileUser($cod_user) {
        $this->set($cod_user);
        $sql = "SELECT
                    * 
                  FROM
                    db_toquela.attachment a,
                    db_toquela.user_has_attachment uha 
                  WHERE a.cod_attachment = uha.cod_attachment 
                    AND uha.cod_user = '$cod_user'
                    AND uha.type = '" . UserHasAttachment::TYPE_PERFIL . "' 
                  ORDER BY  a.cod_attachment DESC
                  LIMIT 1
                  ";
        return $this->getRow($sql, true);
    }

}

?>
