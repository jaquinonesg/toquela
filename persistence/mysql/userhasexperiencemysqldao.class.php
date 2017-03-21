<?php 
 /**
 * Clase que opera sobre la tabla 'user_has_experience'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class UserHasExperienceMySqlDAO extends ModelDAO implements UserHasExperienceDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return UserHasExperience
     */
    public function load($coduser,$codexperience){
        
$this->set($coduser);
$this->set($codexperience);
        $sql = "SELECT * FROM db_toquela.user_has_experience WHERE  cod_user =  '$coduser' AND  cod_experience =  '$codexperience'";
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
        $sql = "SELECT * FROM db_toquela.user_has_experience $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.user_has_experience ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param userhasexperience primary key
     */
    public function delete($coduser,$codexperience){
            
$this->set($coduser);
$this->set($codexperience);
            $sql = "DELETE FROM db_toquela.user_has_experience WHERE  cod_user =  '$coduser' AND  cod_experience =  '$codexperience'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param UserHasExperience userhasexperience
     */
    public function insert($userhasexperience){
            $this->set($userhasexperience->value);
            
            $sql = "INSERT INTO db_toquela.user_has_experience ( cod_user , cod_experience , value ) 
                    VALUES ('$userhasexperience->coduser','$userhasexperience->codexperience','$userhasexperience->value')";
            $id = $this->executeInsert($sql);	
            /*$userhasexperience-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param UserHasExperience userhasexperience
     */
    public function update($userhasexperience){
        $this->set($userhasexperience->value);
        
        $sql = "UPDATE db_toquela.user_has_experience  SET 
		 value = if( strcmp('$userhasexperience->value'  , '' ) = 1  , '$userhasexperience->value', value ) WHERE  cod_user =  '$userhasexperience->coduser' AND  cod_experience =  '$userhasexperience->codexperience'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.user_has_experience';
        return $this->executeUpdate($sql);
    }


                                    public function queryByValue($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.user_has_experience WHERE value  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
                
            public function deleteByValue($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.user_has_experience WHERE value  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return UserHasExperience 
     */
    protected function readRow($row) {
        $userhasexperience = new UserHasExperience();
        $userhasexperience->coduser = $row['cod_user'];
        $userhasexperience->codexperience = $row['cod_experience'];
        $userhasexperience->value = $row['value'];
        return $userhasexperience;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.user_has_experience";
         return $this->getList($sql, true);
    }
    
}

?>