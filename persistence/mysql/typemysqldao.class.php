<?php 
 /**
 * Clase que opera sobre la tabla 'type'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class TypeMySqlDAO extends ModelDAO implements TypeDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Type
     */
    public function load($codtype){
        
$this->set($codtype);
        $sql = "SELECT * FROM db_toquela.type WHERE  cod_type =  '$codtype'";
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
        $sql = "SELECT * FROM db_toquela.type $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.type ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param type primary key
     */
    public function delete($codtype){
            
$this->set($codtype);
            $sql = "DELETE FROM db_toquela.type WHERE  cod_type =  '$codtype'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Type type
     */
    public function insert($type){
            $this->set($type->name);
            
            $sql = "INSERT INTO db_toquela.type ( name ) 
                    VALUES ('$type->name')";
            $id = $this->executeInsert($sql);	
            /*$type-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Type type
     */
    public function update($type){
        $this->set($type->name);
        
        $sql = "UPDATE db_toquela.type  SET 
		 name = if( strcmp('$type->name'  , '' ) = 1  , '$type->name', name ) WHERE  cod_type =  '$type->codtype'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.type';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.type WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.type WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Type 
     */
    protected function readRow($row) {
        $type = new Type();
        $type->codtype = $row['cod_type'];
        $type->name = $row['name'];
        return $type;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.type";
         return $this->getList($sql, true);
    }
    
}

?>