<?php

/**
 * Clase que opera sobre la tabla 'complex'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-07-19 12:48
 */
class ComplexSqlServerDAO extends ModelDAO implements ComplexDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Complex
     */
    public function load($codcomplex) {

        $this->set($codcomplex);
        $sql = "SELECT * FROM db_toquela.complex WHERE  cod_complex =  '$codcomplex'";
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
        $sql = "SELECT * FROM db_toquela.complex $extra";
        return $this->getList($sql);
    }

    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn) {
        $sql = "SELECT * FROM db_toquela.complex ORDER BY $orderColumn";
        return $this->getList($sql);
    }

    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param complex primary key
     */
    public function delete($codcomplex) {

        $this->set($codcomplex);
        $sql = "DELETE FROM db_toquela.complex WHERE  cod_complex =  '$codcomplex'";
        return $this->executeUpdate($sql);
    }

    /**
     * Insert record to table
     *
     * @param Complex complex
     */
    public function insert($complex) {
        $this->set($complex->name);
        $this->set($complex->email);
        $this->set($complex->lat);
        $this->set($complex->lng);
        $this->set($complex->phone);
        $this->set($complex->address);
        $this->set($complex->description);

        $sql = "INSERT INTO db_toquela.complex ( name , email , lat , lng , phone , address , description ) 
                    VALUES ('$complex->name','$complex->email','$complex->lat','$complex->lng','$complex->phone','$complex->address','$complex->description')";
        $id = $this->executeInsert($sql);
        /* $complex-> = $id; */
        return $id;
    }

    /**
     * Update record in table
     *
     * @param Complex complex
     */
    public function update($complex) {
        $this->set($complex->name);
        $this->set($complex->email);
        $this->set($complex->lat);
        $this->set($complex->lng);
        $this->set($complex->phone);
        $this->set($complex->address);
        $this->set($complex->description);

        $sql = "UPDATE db_toquela.complex  SET 
		 name = iif( len('$complex->name' ) <> 0  , '$complex->name', name ),
		 email = iif( len('$complex->email' ) <> 0  , '$complex->email', email ),
		 lat = iif( len('$complex->lat' ) <> 0  , '$complex->lat', lat ),
		 lng = iif( len('$complex->lng' ) <> 0  , '$complex->lng', lng ),
		 phone = iif( len('$complex->phone' ) <> 0  , '$complex->phone', phone ),
		 address = iif( len('$complex->address' ) <> 0  , '$complex->address', address ),
		 description = iif( len('$complex->description' ) <> 0  , '$complex->description', description ) WHERE  cod_complex =  '$complex->codcomplex'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean() {
        $sql = 'DELETE FROM db_toquela.complex';
        return $this->executeUpdate($sql);
    }

    public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex WHERE name  = '$value'";
        return $this->getList($sql);
    }

    public function queryByEmail($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex WHERE email  = '$value'";
        return $this->getList($sql);
    }

    public function queryByLat($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex WHERE lat  = '$value'";
        return $this->getList($sql);
    }

    public function queryByLng($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex WHERE lng  = '$value'";
        return $this->getList($sql);
    }

    public function queryByPhone($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex WHERE phone  = '$value'";
        return $this->getList($sql);
    }

    public function queryByAddress($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex WHERE address  = '$value'";
        return $this->getList($sql);
    }

    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex WHERE description  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE name  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByEmail($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE email  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByLat($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE lat  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByLng($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE lng  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByPhone($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE phone  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByAddress($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE address  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE description  = '$value'";
        return $this->getList($sql);
    }

    /**
     * Read row
     *
     * @return Complex 
     */
    protected function readRow($row) {
        $complex = new Complex();
        $complex->codcomplex = $row['cod_complex'];
        $complex->name = $row['name'];
        $complex->email = $row['email'];
        $complex->lat = $row['lat'];
        $complex->lng = $row['lng'];
        $complex->phone = $row['phone'];
        $complex->address = $row['address'];
        $complex->description = $row['description'];
        return $complex;
    }

    public function describe() {
        $sql = "DESC db_toquela.complex";
        return $this->getList($sql, true);
    }

}

?>
