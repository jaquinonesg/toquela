<?php 
 /**
 * Clase que opera sobre la tabla 'user_has_virtues'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class UserHasVirtuesMySqlDAO extends ModelDAO implements UserHasVirtuesDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return UserHasVirtues
     */
    public function load($coduser,$codvirtues){
        
$this->set($coduser);
$this->set($codvirtues);
        $sql = "SELECT * FROM db_toquela.user_has_virtues WHERE  cod_user =  '$coduser' AND  cod_virtues =  '$codvirtues'";
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
        $sql = "SELECT * FROM db_toquela.user_has_virtues $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.user_has_virtues ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param userhasvirtues primary key
     */
    public function delete($coduser,$codvirtues){
            
$this->set($coduser);
$this->set($codvirtues);
            $sql = "DELETE FROM db_toquela.user_has_virtues WHERE  cod_user =  '$coduser' AND  cod_virtues =  '$codvirtues'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param UserHasVirtues userhasvirtues
     */
    public function insert($userhasvirtues){
            $this->set($userhasvirtues->main);
            
            $sql = "INSERT INTO db_toquela.user_has_virtues ( cod_user , cod_virtues , main ) 
                    VALUES ('$userhasvirtues->coduser','$userhasvirtues->codvirtues','$userhasvirtues->main')";
            $id = $this->executeInsert($sql);	
            /*$userhasvirtues-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param UserHasVirtues userhasvirtues
     */
    public function update($userhasvirtues){
        $this->set($userhasvirtues->main);
        
        $sql = "UPDATE db_toquela.user_has_virtues  SET 
		 main = if( strcmp('$userhasvirtues->main'  , '' ) = 1  , '$userhasvirtues->main', main ) WHERE  cod_user =  '$userhasvirtues->coduser' AND  cod_virtues =  '$userhasvirtues->codvirtues'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.user_has_virtues';
        return $this->executeUpdate($sql);
    }


                                    public function queryByMain($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.user_has_virtues WHERE main  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
                
            public function deleteByMain($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.user_has_virtues WHERE main  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return UserHasVirtues 
     */
    protected function readRow($row) {
        $userhasvirtues = new UserHasVirtues();
        $userhasvirtues->coduser = $row['cod_user'];
        $userhasvirtues->codvirtues = $row['cod_virtues'];
        $userhasvirtues->main = $row['main'];
        return $userhasvirtues;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.user_has_virtues";
         return $this->getList($sql, true);
    }
    
}

?>