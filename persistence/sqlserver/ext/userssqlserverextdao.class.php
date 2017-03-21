<?php

/**
 * Class that operate on table 'users'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class UsersSqlServerExtDAO extends UsersSqlServerDAO {

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
        $sql = "SELECT COUNT(*) as total FROM db_toquela.users ";
        return $this->getValue($query);
    }

    public function getUserWithPic($coduser) {
        $this->set($coduser);
        $sql = "SELECT top 1 u.*,                   
                    (SELECT path FROM db_toquela.attachment a, db_toquela.user_has_attachment uha WHERE  a.cod_attachment = uha.cod_attachment AND uha.cod_user = u.cod_user) AS pic 
                    FROM db_toquela.users u,
                    db_toquela.user_has_team uht                    
                 WHERE
                    u.cod_user = $coduser ";

        return $this->getRow($sql, true);
    }

    /**
     * 
     * @param String $username
     * @param String $password
     * @return Users
     */
    public function login($username, $password) {
        $this->set($username);
        $this->set($password);
        $password = sha1($password);
        $sql = "SELECT TOP 1 * ,
            (SELECT c.name FROM db_toquela.city c, db_toquela.locality l WHERE c.cod_city = l.cod_city AND l.cod_locality = u.cod_locality  ) AS city
            FROM db_toquela.users  u
            WHERE u.username = '$username' AND u.password = '$password' ";
        return $this->getRow($sql);
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
        $query = "SELECT *, 
                    (SELECT NAME FROM db_toquela.locality WHERE u.cod_locality = cod_locality) AS locality,
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
     * Obtiene los códigos de los equipos donde el usuario es el creador.
     * 
     * @param int $cod_user Código del usuario.
     * @return array Códigos de los equipos.
     */
    public function getCodeTeams($cod_user) {
        $data = array();
        if (is_numeric($cod_user)) {
            $sql = "SELECT t.cod_team FROM db_toquela.user_has_team h, db_toquela.team t
                        WHERE t.cod_team = h.cod_team AND h.cod_user = '$cod_user' AND h.status = 'CREATOR';";
            $data = (array)$this->getList($sql,true);
        }
        return $data;
    }

}