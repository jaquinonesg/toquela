<?php

/**
 * Class that operate on table 'followers'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-11-12 11:26
 */
class FollowersMySqlExtDAO extends FollowersMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM followers LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM followers ";
        return $this->getValue($sql);
    }

    //obtener mis amigos
    public function getAmigos($cod_user) {
        $sql = "SELECT 
                                    u.*,
                                    (SELECT a.path 
                  FROM db_toquela.attachment a, db_toquela.user_has_attachment uha 
                  WHERE a.cod_attachment = uha.cod_attachment 
                    AND uha.cod_user = u.cod_user
                    AND uha.type = '" . UserHasAttachment::TYPE_PERFIL . "' 
                  ORDER BY  a.cod_attachment DESC LIMIT 1) 'path'
                                FROM users AS u LEFT JOIN followers AS f ON f.to = u.cod_user
                                WHERE f.from = '$cod_user' GROUP BY cod_user;";
        return $this->getList($sql, true);
    }

    /**
     * 
     * @param int $cod_user_from Usuario quien es seguidor
     * @param type $cod_user_to usuario quien es el seguido
     * @return type
     */
    public function isFollower($cod_user_from, $cod_user_to) {
        if (is_numeric($cod_user_from) && is_numeric($cod_user_to)) {
            $sql = " SELECT 
                IF(COUNT(*) = 0, FALSE, TRUE) isfollower
            FROM
                followers f
            WHERE
                f.from = $cod_user_from AND f.to = $cod_user_to;";
            return $this->getRow($sql, true);
        }
        return false;
    }

}

?>