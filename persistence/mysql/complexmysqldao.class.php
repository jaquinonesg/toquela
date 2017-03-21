<?php

/**
 * Clase que opera sobre la tabla 'complex'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class ComplexMySqlDAO extends ModelDAO implements ComplexDAO {

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Complex
     */
    public function load($codcomplex) {
        $this->set($codcomplex);
        $sql = "SELECT * FROM db_toquela.complex WHERE cod_complex = '$codcomplex'";
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
        $this->set($complex->ifqualification);

        $sql = "INSERT INTO db_toquela.complex ( name , email , lat , lng , phone , address , description , if_qualification ) 
                    VALUES ('$complex->name','$complex->email','$complex->lat','$complex->lng','$complex->phone','$complex->address','$complex->description','$complex->ifqualification')";
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
        $this->set($complex->ifqualification);

        $sql = "UPDATE db_toquela.complex  SET 
		 name = if( strcmp('$complex->name'  , '' ) = 1  , '$complex->name', name ),
		 email = if( strcmp('$complex->email'  , '' ) = 1  , '$complex->email', email ),
		 lat = if( strcmp('$complex->lat'  , '' ) = 1  , '$complex->lat', lat ),
		 lng = if( strcmp('$complex->lng'  , '' ) = 1  , '$complex->lng', lng ),
		 phone = if( strcmp('$complex->phone'  , '' ) = 1  , '$complex->phone', phone ),
		 address = if( strcmp('$complex->address'  , '' ) = 1  , '$complex->address', address ),
		 description = if( strcmp('$complex->description'  , '' ) = 1  , '$complex->description', description ),
		 if_qualification = if( strcmp('$complex->ifqualification'  , '' ) = 1  , '$complex->ifqualification', if_qualification ) WHERE  cod_complex =  '$complex->codcomplex'";
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

    public function queryByIfQualification($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.complex WHERE if_qualification  = '$value'";
        return $this->getList($sql);
    }

    public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE name  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByEmail($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE email  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByLat($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE lat  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByLng($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE lng  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByPhone($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE phone  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByAddress($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE address  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE description  = '$value'";
        return $this->executeUpdate($sql);
    }

    public function deleteByIfQualification($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.complex WHERE if_qualification  = '$value'";
        return $this->executeUpdate($sql);
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
        $complex->ifqualification = $row['if_qualification'];
        return $complex;
    }

    public function describe() {
        $sql = "DESC db_toquela.complex";
        return $this->getList($sql, true);
    }

}

?>