<?php 
 /**
 * Clase que opera sobre la tabla 'typenotifications'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-02-03 11:36
 */
class TypenotificationsMySqlDAO extends ModelDAO implements TypenotificationsDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Typenotifications
     */
    public function load($codtypenotifications){
        
$this->set($codtypenotifications);
        $sql = "SELECT * FROM db_toquela.typenotifications WHERE  codtypenotifications =  '$codtypenotifications'";
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
        $sql = "SELECT * FROM db_toquela.typenotifications $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.typenotifications ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param typenotifications primary key
     */
    public function delete($codtypenotifications){
            
$this->set($codtypenotifications);
            $sql = "DELETE FROM db_toquela.typenotifications WHERE  codtypenotifications =  '$codtypenotifications'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Typenotifications typenotifications
     */
    public function insert($typenotifications){
            $this->set($typenotifications->name);
$this->set($typenotifications->description);
            
            $sql = "INSERT INTO db_toquela.typenotifications ( name , description ) 
                    VALUES ('$typenotifications->name','$typenotifications->description')";
            $id = $this->executeInsert($sql);	
            /*$typenotifications-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Typenotifications typenotifications
     */
    public function update($typenotifications){
        $this->set($typenotifications->name);
$this->set($typenotifications->description);
        
        $sql = "UPDATE db_toquela.typenotifications  SET 
		 name = if( strcmp('$typenotifications->name'  , '' ) = 1  , '$typenotifications->name', name ),
		 description = if( strcmp('$typenotifications->description'  , '' ) = 1  , '$typenotifications->description', description ) WHERE  codtypenotifications =  '$typenotifications->codtypenotifications'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.typenotifications';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.typenotifications WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.typenotifications WHERE description  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.typenotifications WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.typenotifications WHERE description  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Typenotifications 
     */
    protected function readRow($row) {
        $typenotifications = new Typenotifications();
        $typenotifications->codtypenotifications = $row['codtypenotifications'];
        $typenotifications->name = $row['name'];
        $typenotifications->description = $row['description'];
        return $typenotifications;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.typenotifications";
         return $this->getList($sql, true);
    }
    
}

?>