<?php 
 /**
 * Clase que opera sobre la tabla 'position'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class PositionMySqlDAO extends ModelDAO implements PositionDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Position
     */
    public function load($codposition){
        
$this->set($codposition);
        $sql = "SELECT * FROM db_toquela.position WHERE  cod_position =  '$codposition'";
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
        $sql = "SELECT * FROM db_toquela.position $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.position ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param position primary key
     */
    public function delete($codposition){
            
$this->set($codposition);
            $sql = "DELETE FROM db_toquela.position WHERE  cod_position =  '$codposition'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Position position
     */
    public function insert($position){
            $this->set($position->name);
            
            $sql = "INSERT INTO db_toquela.position ( cod_position , name ) 
                    VALUES ('$position->codposition','$position->name')";
            $id = $this->executeInsert($sql);	
            /*$position-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Position position
     */
    public function update($position){
        $this->set($position->name);
        
        $sql = "UPDATE db_toquela.position  SET 
		 name = if( strcmp('$position->name'  , '' ) = 1  , '$position->name', name ) WHERE  cod_position =  '$position->codposition'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.position';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.position WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.position WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Position 
     */
    protected function readRow($row) {
        $position = new Position();
        $position->codposition = $row['cod_position'];
        $position->name = $row['name'];
        return $position;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.position";
         return $this->getList($sql, true);
    }
    
}

?>