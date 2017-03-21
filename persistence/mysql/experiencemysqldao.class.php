<?php 
 /**
 * Clase que opera sobre la tabla 'experience'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class ExperienceMySqlDAO extends ModelDAO implements ExperienceDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Experience
     */
    public function load($codexperience){
        
$this->set($codexperience);
        $sql = "SELECT * FROM db_toquela.experience WHERE  cod_experience =  '$codexperience'";
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
        $sql = "SELECT * FROM db_toquela.experience $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.experience ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param experience primary key
     */
    public function delete($codexperience){
            
$this->set($codexperience);
            $sql = "DELETE FROM db_toquela.experience WHERE  cod_experience =  '$codexperience'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Experience experience
     */
    public function insert($experience){
            $this->set($experience->name);
            
            $sql = "INSERT INTO db_toquela.experience ( name ) 
                    VALUES ('$experience->name')";
            $id = $this->executeInsert($sql);	
            /*$experience-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Experience experience
     */
    public function update($experience){
        $this->set($experience->name);
        
        $sql = "UPDATE db_toquela.experience  SET 
		 name = if( strcmp('$experience->name'  , '' ) = 1  , '$experience->name', name ) WHERE  cod_experience =  '$experience->codexperience'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.experience';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.experience WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.experience WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Experience 
     */
    protected function readRow($row) {
        $experience = new Experience();
        $experience->codexperience = $row['cod_experience'];
        $experience->name = $row['name'];
        return $experience;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.experience";
         return $this->getList($sql, true);
    }
    
}

?>