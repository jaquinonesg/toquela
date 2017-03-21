<?php

/**
 * Class that operate on table 'notification'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-02-10 15:26
 */
class NotificationMySqlExtDAO extends NotificationMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.notification LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.notification ";
        return $this->getValue($sql);
    }

    //cantidad de notificaciones por usuario
    public function notificationsUser($cod_user) {
        $sql = "SELECT 
        COUNT(*) AS notify
        FROM
        db_toquela.`notification` n
        WHERE
        n.cod_user = '$cod_user'AND viewed = 0;";

        return $this->getRow($sql, true)->notify;
    }

    //notificaciones sin ver
    public function notificationsSenVer($cod_user, $pagination, $resultados) {
        $sql = "SELECT 
        n.`date`,
        n.`subject`,
        n.`text`,
        n.`codnotification`,
        n.`link`
        FROM
        db_toquela.`notification` n
        WHERE
        n.cod_user = '$cod_user'
        ORDER BY n.`viewed` , n.`date` DESC
        LIMIT $pagination,$resultados;";
        return $this->getList($sql, true);
    }

    public function updateNotificacionesUser($cod_notification) {
        $sql = "UPDATE notification n 
        SET 
        viewed = 1
        WHERE
        viewed = 0
        AND n.`codnotification` = '$cod_notification';";
        return $this->executeUpdate($sql);
    }

    public function verMas($cod_user) {
        $sql = "SELECT COUNT(*) AS cantidad FROM notification WHERE cod_user='$cod_user' ;";
        return $this->getRow($sql, true)->cantidad;
    }

    /*
     *
      eliminar todas las notificaciones del usuarios
     * Logueado 
     * 
     */

      public function deleteAllNotification($cod_user) {
        $sql = "DELETE FROM notification WHERE cod_user = '$cod_user';";
        return $this->executeUpdate($sql);
    }

    // cantidad de publicaciones en el torneo
    public function cantidadActividadesTorneo($cod_user, $numdias) {
        $sql = "SELECT 
        COUNT(DISTINCT n.`cod_news`) AS cantidad
        FROM
        users AS u,
        `user_has_team` AS uht
        INNER JOIN
        `tournament_has_team` AS tht ON uht.`cod_team` = tht.`cod_team`
        INNER JOIN
        `tournament` AS t
        INNER JOIN
        `news` AS n ON t.`cod_tournament` = n.`cod_tournament`
        WHERE
        uht.`cod_user` = '$cod_user' AND u.`cod_user` != '$cod_user' 
        AND u.`cod_user` = n.`cod_user`
        AND TO_DAYS(NOW()) - TO_DAYS(n.`date`) < '$numdias'";
        return $this->getRow($sql, true)->cantidad;
    }

//publicacion usuario en torneo
    public function actividadesTorneo($cod_user, $pagination, $resultados, $numdias) {
        $sql = "SELECT DISTINCT
        n.`cod_news`,
        n.`message` AS messagetorneo,
        n.`cod_user`,
        t.`name` AS nametoreno,
        u.`name` AS nomusuario,
        IFNULL((SELECT 
            a.`path`
            FROM
            db_toquela.attachment a,
            db_toquela.user_has_attachment uha,
            users u
            WHERE
            a.cod_attachment = uha.cod_attachment
            AND uha.cod_user = n.`cod_user`
            AND uha.type = 'PERFIL'
            ORDER BY a.cod_attachment DESC
            LIMIT 1),
'public/img/no_user_image.jpg') path
FROM
users AS u,
`user_has_team` AS uht
INNER JOIN
`tournament_has_team` AS tht ON uht.`cod_team` = tht.`cod_team`
INNER JOIN
`tournament` AS t
INNER JOIN
`news` AS n ON t.`cod_tournament` = n.`cod_tournament`
WHERE
uht.`cod_user` = '$cod_user'
AND u.`cod_user` != '$cod_user'
AND u.`cod_user` = n.`cod_user`
AND TO_DAYS(NOW()) - TO_DAYS(n.`date`) < '$numdias'
ORDER BY n.`date` DESC
LIMIT $pagination,$resultados";
return $this->getList($sql, true);
}

public function actividadUserTeam($cod_user, $numdias) {
    $sql = "SELECT 
    u.`name`,
    u.`last_name`,
    m.`text`,
    m.`cod_message`,
    m.`cod_team`,
    t.`name` AS nameteam,
    IFNULL((SELECT 
        a.`path`
        FROM
        db_toquela.attachment a,
        db_toquela.user_has_attachment uha,
        users u
        WHERE
        a.cod_attachment = uha.cod_attachment
        AND uha.cod_user = m.`from`
        AND uha.type = 'PERFIL'
        ORDER BY a.cod_attachment DESC
        LIMIT 1),
'public/img/no_user_image.jpg') path
FROM
users u
JOIN
followers f ON f.to = u.cod_user
INNER JOIN
message m ON (u.`cod_user` = m.`from`)
INNER JOIN
team t ON (m.`cod_team` = t.`cod_team`)
WHERE
f.from = '$cod_user'
AND TO_DAYS(NOW()) - TO_DAYS(m.`date`) < '$numdias'
ORDER BY m.`date` DESC;";
return $this->getList($sql, true);
}

public function cantidadActividadesUserTeam($cod_user, $numdias) {
    $sql = "SELECT 
    COUNT(*)
    FROM
    users u
    JOIN
    followers f ON f.to = u.cod_user
    INNER JOIN
    message m ON (u.`cod_user` = m.`from`)
    INNER JOIN
    team t ON (m.`cod_team` = t.`cod_team`)
    WHERE
    f.from = '$cod_user'
    AND TO_DAYS(NOW()) - TO_DAYS(m.`date`) < '$numdias' ";
    return $this->getRow($sql, true)->cantidad;
}

public function updateByCoduser($notification, $coduser){
    $this->set($notification->text);
    $this->set($notification->subject);
    $this->set($notification->date);
    $this->set($notification->viewed);
    $this->set($notification->state);
    $this->set($notification->link);
    $this->set($notification->codtypenotifications);
    $this->set($notification->coduser);
    $this->set($notification->codteam);

    $sql = "UPDATE db_toquela.notification  SET 
    text = if( strcmp('$notification->text'  , '' ) = 1  , '$notification->text', text ),
    subject = if( strcmp('$notification->subject'  , '' ) = 1  , '$notification->subject', subject ),
    date = if( strcmp('$notification->date'  , '' ) = 1  , '$notification->date', date ),
    viewed = if( strcmp('$notification->viewed'  , '' ) = 1  , '$notification->viewed', viewed ),
    state = if( strcmp('$notification->state'  , '' ) = 1  , '$notification->state', state ),
    link = if( strcmp('$notification->link'  , '' ) = 1  , '$notification->link', link ),
    codtypenotifications = if( strcmp('$notification->codtypenotifications'  , '' ) = 1  , '$notification->codtypenotifications', codtypenotifications ),
    cod_user = if( strcmp('$notification->coduser'  , '' ) = 1  , '$notification->coduser', cod_user ),
    cod_team = if( strcmp('$notification->codteam'  , '' ) = 1  , '$notification->codteam', cod_team ) WHERE  cod_user =  '$coduser'";
    return $this->executeUpdate($sql);
}

}

?>