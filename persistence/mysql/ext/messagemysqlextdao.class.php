<?php

/**
 * Class that operate on table 'message'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class MessageMySqlExtDAO extends MessageMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.message LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.message ";
        return $this->getValue($sql);
    }

    //Obtengo todos los mensajes por usuario
    public function getMessage($cod_user) {
        $this->set($cod_user);
        $sql = "SELECT 
                    m . *,
                    u.`name`,
                    u.`last_name`,
                    IFNULL(r.path, 'public/img/no_user_image.jpg') path,
                    (SELECT 
                            COUNT(*)
                        FROM
                            message mc
                        WHERE
                            mc.`to` = m.`to`
                                AND mc.`from` = m.`from`
                                AND viewed = 0) 'sinver'
                FROM
                    users u
                        LEFT JOIN
                    (SELECT 
                        a . *, uha.cod_user
                    FROM
                        attachment a
                    LEFT JOIN user_has_attachment uha USING (cod_attachment)
                    WHERE
                        uha.type = '" . UserHasAttachment::TYPE_PERFIL . "'
                    ORDER BY a.cod_attachment DESC) r USING (cod_user)
                        LEFT JOIN
                    message m ON m.`from` = u.`cod_user`
                WHERE
                    m.`to` = '$cod_user'
                GROUP BY cod_user
                ORDER BY MAX(m.`date`) DESC;";
        return $this->getList($sql, true);
    }

    public function verMessage($cod_user_from, $cod_user_to) {
        $sql = "SELECT 
                    m.`cod_message`,
                    m.`subject`,
                    m.`text`,
                    m.`date`,
                    m.`from`
                FROM
                    message m
                WHERE
                    m.from=  '$cod_user_from'
                    AND m.to = '$cod_user_to' ORDER BY cod_message DESC;";
        return $this->getList($sql, true);
    }

    //Notificacion de mensajes nuevos 
    public function notificacionMessage($cod_user) {
        $sql = "SELECT 
                        COUNT(*) AS cantidad
                    FROM
                        message
                    WHERE
                        message.`to` ='$cod_user'  AND viewed = 0;";
        return $this->getRow($sql, true)->cantidad;
    }

    public function updateNotificacionesMessageUser($cod_user_from, $cod_user_to) {
        $sql = "UPDATE message 
                SET 
                    viewed = 1
                WHERE
                    viewed = 0 AND message.`from` = '$cod_user_from'
                        AND message.`to` = $cod_user_to;";
        return $this->executeUpdate($sql);
    }

    public function msgSinLeer($code_user_to) {
        $sql = "SELECT 
                    COUNT(*) AS sinleer
                FROM
                    message m
                WHERE
                    viewed = 0 
                        AND m.`to` = '$code_user_to'
                GROUP BY m.`from`
                ORDER BY MAX(m.`date`) DESC ";
        return $this->getList($sql, true);
    }

    public function deleteAllmessages($from, $cod_user) {
        $sql = "DELETE FROM message 
                WHERE
                    message.`from` = '$from' AND message.`to` = '$cod_user'; ";
        return $this->executeUpdate($sql);
    }

    public function autocompleteEnviarMensaje($cod_user, $term) {
        $sql = "SELECT 
                u.`cod_user` 'value',
                u.`name` 'label' 
              FROM
                users u, followers f 
              WHERE f.`to` = u.`cod_user` 
                AND f.`from` = '$cod_user' 
                AND (u.`name` LIKE '%$term%' OR u.`last_name` LIKE '%$term%') LIMIT 10;";
        $result = $this->getList($sql, true);
        return !is_null($result) ? $result : array();
    }

}

?>
