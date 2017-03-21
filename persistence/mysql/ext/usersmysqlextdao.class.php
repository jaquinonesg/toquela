<?php

/**
 * Clase que opera en la tabla 'users' con MySQL, 
 * 
 * @internal archivo generado con framework.
 * @link http://phpdao.com/
 * @package persistence.mysql.ext
 * @author Grimorum
 * @todo terminar de documentar
 * @since 2013-07-17 11:18
 */
class UsersMySqlExtDAO extends UsersMySqlDAO {

    public function getNumPlayersInTeams() {
        $sql = "SELECT COUNT(DISTINCT ut.cod_user) AS num FROM user_has_team AS ut WHERE ut.status <> 'POSTULANT';";
        $result = $this->getRow($sql, true);
        return $result->num;
    }
    public function login($username, $password) {
        $this->set($username);
        $this->set($password);
        $password = sha1($password);
        $sql = "SELECT * ,
        (SELECT c.name FROM db_toquela.city c, db_toquela.locality l WHERE c.cod_city = l.cod_city AND l.cod_locality = u.cod_locality  ) AS city
        FROM db_toquela.users  u
        WHERE u.username = '$username' AND u.password = '$password' LIMIT 1";
        return $this->getRow($sql);
    }

    /**
     * obtiene todos los campos de la tabla 'users' cuando cod_user y password 
     * coinciden con algun registro de la tabla, el password antes se cifra con sha1.
     *
     * @see users.class.php
     * @author Juan Carlos Gama. <null>
     * 
     * @param  int      $cod_user       codigo del usuario.
     * @param  string   $password       password sin cifrar.
     * @return class Users  devuelve un objeto users con la informacion del usuario.
     */
    public function loginCoduser($coduser, $password) {
        $this->set($coduser);
        $this->set($password);
        $password = sha1($password);
        
        $sql = "SELECT * ,
        (SELECT c.name FROM db_toquela.city c, db_toquela.locality l WHERE c.cod_city = l.cod_city AND l.cod_locality = u.cod_locality  ) AS city
        FROM db_toquela.users  u
        WHERE u.cod_user = '$coduser' AND u.password = '$password' LIMIT 1";
        return $this->getRow($sql);
    }

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.users LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.users AS u WHERE u.cod_user != '1';";
        return $this->getValue($sql);
    }

    public function getUserWithPic($coduser) {
        $this->set($coduser);
        $sql = "SELECT u.*, (SELECT path FROM db_toquela.attachment a, db_toquela.user_has_attachment uha WHERE  a.cod_attachment = uha.cod_attachment AND uha.cod_user = u.cod_user) AS pic 
        FROM db_toquela.users u,
        db_toquela.user_has_team uht                    
        WHERE
        u.cod_user = '$coduser' LIMIT 1;";
        return $this->getRow($sql, true);
    }

    //jorge
    public function getJugadoresMap() {
        $query = "SELECT u.cod_user, u.name, u.username ,u.address, u.latitude, u.longitude FROM db_toquela.users AS u";
        return $this->getList($query, true);
    }

    public function get_jugador_map($idJugador) {
        $query = "SELECT u.cod_user, u.name, u.username ,u.address, u.latitude, u.longitude FROM db_toquela.users AS u WHERE u.cod_user = $idJugador";
        return $this->getList($query, true);
    }

    public function getUsersAll() {
        $query = "SELECT *, (SELECT NAME FROM db_toquela.locality WHERE u.cod_locality = cod_locality) AS locality,
        (SELECT NAME FROM db_toquela.city WHERE cod_city = (SELECT cod_city FROM db_toquela.locality WHERE u.cod_locality = cod_locality)) AS city
        FROM db_toquela.users u";
        return $this->getList($query, true);
    }

    public function getAutocompleteUsers($term) {
        $data = array();
        $query = "SELECT u.name, u.cod_user FROM db_toquela.users u WHERE u.name LIKE '%$term%'";
        $result = $this->getList($query, true);
        if (is_array($result)) {
            foreach ($result as $user) {
                $arr_aux1['label'] = $user->name;
                $arr_aux1['value'] = $user->coduser;
                array_push($data, $arr_aux1);
            }
        }
        return $data;
    }

    /**
     * Obtiene los códigos de los jugadors donde el usuario es el creador.
     * 
     * @param int $cod_user Código del usuario.
     * @return array Códigos de los jugadors.
     */
    public function getCodeTeams($cod_user) {
        $data = array();
        if (is_numeric($cod_user)) {
            $sql = "SELECT t.cod_team FROM db_toquela.user_has_team h, db_toquela.team t
            WHERE t.cod_team = h.cod_team AND h.cod_user = '$cod_user' AND h.status = 'CREATOR';";
            $data = (array) $this->getList($sql, true);
        }
        return $data;
    }

    public function getInfoBasic($cod_user) {
        $sql = "SELECT u.cod_user, u.name, u.last_name FROM db_toquela.users AS u WHERE u.cod_user = '$cod_user';";
        return $this->getRow($sql, true);
    }

    public function getTorneosPartidosPorEquipo($cod_user) {

        //return $this->getList($sql, true);
    }

    public function autocompleteUserAndTournament($term, $codtournament) {
        $sql = "SELECT
        DISTINCT u.cod_user AS 'value',
        CONCAT(u.`name`,' ',u.last_name) AS 'label'
        FROM
        tournament_has_team AS tht
        INNER JOIN user_has_team AS uht ON tht.cod_team = uht.cod_team
        INNER JOIN users AS u ON uht.cod_user = u.cod_user
        WHERE
        tht.cod_tournament = '$codtournament'
        AND " . $this->getSqlStrJugador($term) . "
        LIMIT 10";
        $result = $this->getList($sql, true);
        return !is_null($result) ? $result : array();
    }

    public function updatePassword($coduser, $newpassword) {
        $sql = "UPDATE `db_toquela`.`users` SET `password`=SHA1('$newpassword') WHERE (`cod_user`='$coduser');";
        return $this->executeUpdate($sql);
    }

    public function getTotalJugadores() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.users AS u WHERE u.cod_user != '1' AND u.cod_role != '2';";
        return $this->getValue($sql);
    }

    public function getJugadores($inicio_limit = null, $fin_limit = null) {
        $limitsql = "";
        if (is_numeric($inicio_limit) && is_numeric($fin_limit)) {
            $limitsql = " LIMIT " . $inicio_limit . ", " . $fin_limit;
        }
        $sql = "SELECT
        u.cod_user, u.`name`, u.last_name, u.email,u.cod_role,
        (
            SELECT
            c. NAME
            FROM
            db_toquela.city c,
            db_toquela.locality l
            WHERE
            c.cod_city = l.cod_city
            AND l.cod_locality = u.cod_locality
            ) 'city',
(SELECT
    a.path 
    FROM
    db_toquela.attachment a,
    db_toquela.user_has_attachment uha 
    WHERE a.cod_attachment = uha.cod_attachment 
    AND uha.cod_user = u.cod_user
    AND uha.type = '" . UserHasAttachment::TYPE_PERFIL . "' 
    ORDER BY  a.cod_attachment DESC
    LIMIT 1) 'photo',
COALESCE((SELECT v.`name` FROM db_toquela.virtues v, db_toquela.user_has_virtues uhv WHERE v.cod_virtues = uhv.cod_virtues AND uhv.cod_user = u.cod_user AND v.cod_virtues_group = 2 AND uhv.`main`= 1 LIMIT 1),'Sin posición') 'positiongame',
(
    IF(
      u.sex = 'HOMBRE',
      'Masculino',
      IF(
        u.sex = 'FEMALE',
        'Femenino',
        IF(u.sex = 'UNDEFINED', 'Indefinido', NULL)
        )
)
) 'sex'
FROM
db_toquela.users AS u WHERE u.cod_user != '1' AND u.cod_role != '2' $limitsql;";
return $this->getList($sql, true);
}

private function getSqlStrJugador($strjugador) {
    if (empty($strjugador)) {
        return "";
    }
    $arr_str = explode(" ", $strjugador);
    $or_email = "";
    if (count($arr_str) > 0) {
        $str_aux1 = "";
        $str_aux2 = "";
        foreach ($arr_str AS $index => $str) {
            if (!empty($str)) {
                if ($index == 0) {
                    $str_aux1 .= "u.`name` LIKE '%$str%'";
                    $str_aux2 .= "u.last_name LIKE '%$str%'";
                } else {
                    $str_aux1 .= " OR u.`name` LIKE '%$str%'";
                    $str_aux2 .= " OR u.last_name LIKE '%$str%'";
                }
            }
        }
        if (!empty($str_aux1) && !empty($str_aux2)) {
            $str_aux1 = "(" . $str_aux1 . ")";
            $str_aux2 = "(" . $str_aux2 . ")";
            $or_email = "(u.`email` LIKE '%$strjugador%')";
            return $str_aux1 . " OR " . $str_aux2 . " OR " . $or_email;
        }
    }
    return "(CONCAT(u.`name`, ' ', u.last_name) LIKE '%$strjugador%' OR u.`email` LIKE '%$strjugador%')";
}

public function getJugadoresBuscador($strjugador = "", $genero = null, $posicion = null, $limit_init = null, $limit_pag = null, $get_total = false) {
    $sqllimit = "";
    if (is_numeric($limit_init) && is_numeric($limit_pag)) {
        $sqllimit = "LIMIT $limit_init, $limit_pag";
    }
    $sql_where = "";
    if (!empty($strjugador) && isset($genero)) {
        $sql_where = "AND u.sex = '$genero' AND " . $this->getSqlStrJugador($strjugador);
    } else {
        if (!empty($strjugador)) {
            $sql_where = "AND " . $this->getSqlStrJugador($strjugador);
        }
        if (isset($genero)) {
            $sql_where = "AND u.sex = '$genero'";
        }
    }
    if (is_numeric($posicion)) {
        if ($sql_where == "") {
            $sql_where = "AND uhv.main = 1 AND v.cod_virtues_group = 2 AND v.cod_virtues ='$posicion' GROUP BY u.cod_user";
        } else {
            $sql_where = "AND uhv.main = 1 AND v.cod_virtues_group = 2 AND v.cod_virtues ='$posicion' " . $sql_where . " GROUP BY u.cod_user";
        }
        if ($get_total) {
            $sql = "SELECT COUNT(u.cod_user) 'num' FROM db_toquela.users AS u INNER JOIN db_toquela.user_has_virtues AS uhv ON u.cod_user = uhv.cod_user INNER JOIN db_toquela.virtues AS v ON uhv.cod_virtues = v.cod_virtues WHERE u.cod_user != '1' $sql_where;";
        } else {
            $sql = "SELECT
            u.cod_user, u.`name`, u.last_name, u.email,u.cod_role,
            (
                SELECT
                c. NAME
                FROM
                db_toquela.city c,
                db_toquela.locality l
                WHERE
                c.cod_city = l.cod_city
                AND l.cod_locality = u.cod_locality
                ) 'city',
(SELECT
    a.path 
    FROM
    db_toquela.attachment a,
    db_toquela.user_has_attachment uha 
    WHERE a.cod_attachment = uha.cod_attachment 
    AND uha.cod_user = u.cod_user
    AND uha.type = '" . UserHasAttachment::TYPE_PERFIL . "' 
    ORDER BY  a.cod_attachment DESC
    LIMIT 1) 'photo',
COALESCE(v.`name`,'Sin posición') 'positiongame',
(
    IF(
      u.sex = 'HOMBRE',
      'Masculino',
      IF(
        u.sex = 'FEMALE',
        'Femenino',
        IF(u.sex = 'UNDEFINED', 'Indefinido', NULL)
        )
)
) 'sex'
FROM
db_toquela.users AS u INNER JOIN db_toquela.user_has_virtues AS uhv ON u.cod_user = uhv.cod_user INNER JOIN db_toquela.virtues AS v ON uhv.cod_virtues = v.cod_virtues
WHERE u.cod_user != '1' AND u.cod_role != '2' $sql_where $sqllimit;";
}
} else {
    if ($get_total) {
        $sql = "SELECT COUNT(u.cod_user) 'num' FROM db_toquela.users AS u WHERE u.cod_user != '1' $sql_where;";
    } else {
        $sql = "SELECT
        u.cod_user, u.`name`, u.last_name, u.email,u.cod_role,
        (
            SELECT
            c. NAME
            FROM
            db_toquela.city c,
            db_toquela.locality l
            WHERE
            c.cod_city = l.cod_city
            AND l.cod_locality = u.cod_locality
            ) 'city',
(SELECT
    a.path 
    FROM
    db_toquela.attachment a,
    db_toquela.user_has_attachment uha 
    WHERE a.cod_attachment = uha.cod_attachment 
    AND uha.cod_user = u.cod_user
    AND uha.type = '" . UserHasAttachment::TYPE_PERFIL . "' 
    ORDER BY  a.cod_attachment DESC
    LIMIT 1) 'photo',
COALESCE((SELECT v.`name` FROM db_toquela.virtues v, db_toquela.user_has_virtues uhv WHERE v.cod_virtues = uhv.cod_virtues AND uhv.cod_user = u.cod_user AND v.cod_virtues_group = 2 AND uhv.`main`= 1 LIMIT 1),'Sin posición') 'positiongame',
(
    IF(
      u.sex = 'HOMBRE',
      'Masculino',
      IF(
        u.sex = 'FEMALE',
        'Femenino',
        IF(u.sex = 'UNDEFINED', 'Indefinido', NULL)
        )
)
) 'sex'
FROM db_toquela.users AS u WHERE u.cod_user != '1' AND u.cod_role != '2' $sql_where $sqllimit;";
}
}
if ($get_total) {
    return (int) $this->getRow($sql, true)->num;
}
return $this->getList($sql, true);
}

public function getUserByEmail($email) {
    $this->set($email);
    $sql = "SELECT * FROM db_toquela.users AS u WHERE u.email = '$email'";
    return $this->getRow($sql, true);
}

public function getBasicInfo($coduser) {
    $this->set($coduser);
    $sql = "SELECT name,last_name,phone,cellular FROM db_toquela.users WHERE cod_user  = '$coduser'";
    return $this->getList($sql);
}
public function getByCorreo($correo){
    $sql = "SELECT * FROM db_toquela.`users` WHERE `users`.`email` LIKE '$correo'; ";        
    return $this->getList($sql);
}

public function insertWithValsNulls($users) {
    $this->set($users->name);
    $this->set($users->lastname);
    $this->set($users->phone);
    $this->set($users->cellular);
    $this->set($users->address);
    $this->set($users->city);
    $this->set($users->username);
    $this->set($users->password);
    $this->set($users->email);
    $this->set($users->sex);
    $this->set($users->age);
    $this->set($users->longitude);
    $this->set($users->latitude);
    $this->set($users->skilledleg);
    $this->set($users->codlocality);
    $this->set($users->codrole);
    $this->set($users->idfan);

    $sql = "INSERT INTO db_toquela.users ( users.`name` , last_name , phone , cellular , address , city , username , users.`password` , email , sex , age , longitude , latitude , skilled_leg , cod_locality , cod_role , idfan ) 
    VALUES ('$users->name','$users->lastname','$users->phone','$users->cellular','$users->address','$users->city','$users->username','$users->password','$users->email','$users->sex','$users->age','$users->longitude','$users->latitude','$users->skilledleg',NULL,'$users->codrole','$users->idfan')";
    $id = $this->executeInsert($sql);
    /* $users-> = $id; */
    return $id;
}

public function getByPrivileges($coduser) {
    $sql = "SELECT privilegios FROM db_toquela.`users` WHERE cod_user = $coduser;";
    return $this->getList($sql);
}

public function getByRol($cod_user) {
    $sql = "SELECT cod_role FROM db_toquela.`users` WHERE cod_user = $cod_user;";
    return $this->getRow($sql);
}

public function insertRol($usuario) {
    $sql = "UPDATE db_toquela.`users`  SET 
    `cod_role`= '$usuario->codrole' WHERE `cod_user`= '$usuario->coduser';";
    return $this->executeUpdate($sql);
}

public function insertPrivileges($usuario) {
    $sql = "UPDATE db_toquela.`users`  SET 
    `privilegios`= '$usuario->privilegios' WHERE `cod_user`= '$usuario->coduser';";
    return $this->executeUpdate($sql);
}

public function queryByNameComplete($value) {
    $this->set($value);
    $sql = "SELECT u.name, u.last_name FROM db_toquela.users AS u WHERE u.cod_user  = '$value'";
    return $this->getRow($sql);    
}

}
