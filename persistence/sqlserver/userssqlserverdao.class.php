<?php

/**
 * Clase que opera sobre la tabla 'users'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class UsersSqlServerDAO extends ModelDAO implements UsersDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Users
     */
    public function load($coduser) {

        $this->set($coduser);
        $sql = "SELECT *,
              (SELECT c.name FROM db_toquela.city c, db_toquela.locality l WHERE c.cod_city = l.cod_city AND l.cod_locality = u.cod_locality  ) AS city
            FROM db_toquela.users u WHERE  cod_user =  '$coduser'";
        return $this->getRow($sql);
    }

    /**
     * Obtiene todo los registro de la tabla
     */

    /**
     * Obtener todos los registro de las tablas
     */
    public function queryAll($limit = null, $page = null) {
        $extra = "";
        if (!is_null($page)) {
            $this->set($page);
            $this->set($limit);
            $page = abs((int) $page);
            if (!preg_match('!^\d+$!', $limit)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            if (!preg_match('!^\d+$!', $page)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            $limit = abs($limit);
            $extra = "  LIMIT $page , $limit";
        } elseif (!is_null($limit)) {
            if (!preg_match('!^\d+$!', $limit)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            $extra = " LIMIT $limit";
        }
        $sql = "SELECT * FROM db_toquela.users $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.users ORDER BY `$orderColumn`";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param users primary key
     */
    public function delete($coduser) {

        $this->set($coduser);
        $sql = "DELETE FROM db_toquela.users WHERE  cod_user =  '$coduser'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Users users
     */
    public function insert($users) {
        $this->set($users->name);
        $this->set($users->lastname);
        $this->set($users->phone);
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

        $sql = "INSERT INTO db_toquela.users ( name , last_name , phone , address , city , username , password , email , sex , age , longitude , latitude , skilled_leg , cod_locality , cod_role ) 
                    VALUES ('$users->name','$users->lastname','$users->phone','$users->address','$users->city','$users->username','$users->password','$users->email','$users->sex','$users->age','$users->longitude','$users->latitude','$users->skilledleg','$users->codlocality','$users->codrole')";
        $id = $this->executeInsert($sql);
        /* $users-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Users users
     */
    public function update($users) {
        $this->set($users->name);
        $this->set($users->lastname);
        $this->set($users->phone);
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

        $sql = "UPDATE db_toquela.users  SET 
		 name = iif( len('$users->name' ) <> 0  , '$users->name', name ),
		 last_name = iif( len('$users->lastname' ) <> 0  , '$users->lastname', last_name ),
		 phone = iif( len('$users->phone' ) <> 0  , '$users->phone', phone ),
		 address = iif( len('$users->address' ) <> 0  , '$users->address', address ),
		 city = iif( len('$users->city' ) <> 0  , '$users->city', city ),
		 username = iif( len('$users->username' ) <> 0  , '$users->username', username ),
		 password = iif( len('$users->password' ) <> 0  , '$users->password', password ),
		 email = iif( len('$users->email' ) <> 0  , '$users->email', email ),
		 sex = iif( len('$users->sex' ) <> 0  , '$users->sex', sex ),
		 age = iif( len('$users->age' ) <> 0  , '$users->age', age ),
		 longitude = iif( len('$users->longitude' ) <> 0  , '$users->longitude', longitude ),
		 latitude = iif( len('$users->latitude' ) <> 0  , '$users->latitude', latitude ),
		 skilled_leg = iif( len('$users->skilledleg' ) <> 0  , '$users->skilledleg', skilled_leg ),
		 cod_locality = iif( len('$users->codlocality' ) <> 0  , '$users->codlocality', cod_locality ),
		 cod_role = iif( len('$users->codrole' ) <> 0  , '$users->codrole', cod_role ) WHERE  cod_user =  '$users->coduser'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.users';
        return $this->executeUpdate($sql);
    }

    public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE name  = '$value'";
        return $this->getList($sql);
    }

    public function queryByLastName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE last_name  = '$value'";
        return $this->getList($sql);
    }

    public function queryByPhone($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE phone  = '$value'";
        return $this->getList($sql);
    }

    public function queryByAddress($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE address  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCity($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE city  = '$value'";
        return $this->getList($sql);
    }

    public function queryByUsername($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE username  = '$value'";
        return $this->getList($sql);
    }

    public function queryByPassword($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE password  = '$value'";
        return $this->getList($sql);
    }

    public function queryByEmail($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE email  = '$value'";
        return $this->getList($sql);
    }

    public function queryBySex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE sex  = '$value'";
        return $this->getList($sql);
    }

    public function queryByAge($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE age  = '$value'";
        return $this->getList($sql);
    }

    public function queryByLongitude($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE longitude  = '$value'";
        return $this->getList($sql);
    }

    public function queryByLatitude($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE latitude  = '$value'";
        return $this->getList($sql);
    }

    public function queryBySkilledLeg($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE skilled_leg  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodLocality($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE cod_locality  = '$value'";
        return $this->getList($sql);
    }

    public function queryByCodRole($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.users WHERE cod_role  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE name  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByLastName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE last_name  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByPhone($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE phone  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByAddress($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE address  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByCity($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE city  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByUsername($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE username  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByPassword($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE password  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByEmail($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE email  = '$value'";
        return $this->getList($sql);
    }

    public function deleteBySex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE sex  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByAge($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE age  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByLongitude($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE longitude  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByLatitude($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE latitude  = '$value'";
        return $this->getList($sql);
    }

    public function deleteBySkilledLeg($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE skilled_leg  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByCodLocality($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE cod_locality  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByCodRole($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.users WHERE cod_role  = '$value'";
        return $this->getList($sql);
    }

    /**
     * Read row
     *
     * @return Users 
     */
    protected function readRow($row) {
        $users = new Users();
        $users->coduser = $row['cod_user'];
        $users->name = $row['name'];
        $users->lastname = $row['last_name'];
        $users->phone = $row['phone'];
        $users->address = $row['address'];
        $users->city = $row['city'];
        $users->username = $row['username'];
        $users->password = $row['password'];
        $users->email = $row['email'];
        $users->sex = $row['sex'];
        $users->age = $row['age'];
        $users->longitude = $row['longitude'];
        $users->latitude = $row['latitude'];
        $users->skilledleg = $row['skilled_leg'];
        $users->codlocality = $row['cod_locality'];
        $users->codrole = $row['cod_role'];
        $users->locality = $row['locality'];
        return $users;
    }

    public function describe() {
        $sql = "DESC db_toquela.users";
        return $this->getList($sql, true);
    }

}

?>
