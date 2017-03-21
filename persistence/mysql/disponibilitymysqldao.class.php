<?php 
 /**
 * Clase que opera sobre la tabla 'disponibility'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class DisponibilityMySqlDAO extends ModelDAO implements DisponibilityDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Disponibility
     */
    public function load($coddisponibility){
        
$this->set($coddisponibility);
        $sql = "SELECT * FROM db_toquela.disponibility WHERE  cod_disponibility =  '$coddisponibility'";
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
        $sql = "SELECT * FROM db_toquela.disponibility $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.disponibility ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param disponibility primary key
     */
    public function delete($coddisponibility){
            
$this->set($coddisponibility);
            $sql = "DELETE FROM db_toquela.disponibility WHERE  cod_disponibility =  '$coddisponibility'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Disponibility disponibility
     */
    public function insert($disponibility){
            $this->set($disponibility->day);
$this->set($disponibility->starthour);
$this->set($disponibility->endhour);
$this->set($disponibility->coduser);
            
            $sql = "INSERT INTO db_toquela.disponibility ( day , start_hour , end_hour , cod_user ) 
                    VALUES ('$disponibility->day','$disponibility->starthour','$disponibility->endhour','$disponibility->coduser')";
            $id = $this->executeInsert($sql);	
            /*$disponibility-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Disponibility disponibility
     */
    public function update($disponibility){
        $this->set($disponibility->day);
$this->set($disponibility->starthour);
$this->set($disponibility->endhour);
$this->set($disponibility->coduser);
        
        $sql = "UPDATE db_toquela.disponibility  SET 
		 day = if( strcmp('$disponibility->day'  , '' ) = 1  , '$disponibility->day', day ),
		 start_hour = if( strcmp('$disponibility->starthour'  , '' ) = 1  , '$disponibility->starthour', start_hour ),
		 end_hour = if( strcmp('$disponibility->endhour'  , '' ) = 1  , '$disponibility->endhour', end_hour ),
		 cod_user = if( strcmp('$disponibility->coduser'  , '' ) = 1  , '$disponibility->coduser', cod_user ) WHERE  cod_disponibility =  '$disponibility->coddisponibility'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.disponibility';
        return $this->executeUpdate($sql);
    }


                        public function queryByDay($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.disponibility WHERE day  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByStartHour($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.disponibility WHERE start_hour  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByEndHour($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.disponibility WHERE end_hour  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.disponibility WHERE cod_user  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByDay($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.disponibility WHERE day  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByStartHour($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.disponibility WHERE start_hour  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByEndHour($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.disponibility WHERE end_hour  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.disponibility WHERE cod_user  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Disponibility 
     */
    protected function readRow($row) {
        $disponibility = new Disponibility();
        $disponibility->coddisponibility = $row['cod_disponibility'];
        $disponibility->day = $row['day'];
        $disponibility->starthour = $row['start_hour'];
        $disponibility->endhour = $row['end_hour'];
        $disponibility->coduser = $row['cod_user'];
        return $disponibility;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.disponibility";
         return $this->getList($sql, true);
    }
    
}

?>