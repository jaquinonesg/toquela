<?php 
 /**
 * Clase que opera sobre la tabla 'virtues_group'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class VirtuesGroupMySqlDAO extends ModelDAO implements VirtuesGroupDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return VirtuesGroup
     */
    public function load($codvirtuesgroup){
        
$this->set($codvirtuesgroup);
        $sql = "SELECT * FROM db_toquela.virtues_group WHERE  cod_virtues_group =  '$codvirtuesgroup'";
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
        $sql = "SELECT * FROM db_toquela.virtues_group $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.virtues_group ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param virtuesgroup primary key
     */
    public function delete($codvirtuesgroup){
            
$this->set($codvirtuesgroup);
            $sql = "DELETE FROM db_toquela.virtues_group WHERE  cod_virtues_group =  '$codvirtuesgroup'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param VirtuesGroup virtuesgroup
     */
    public function insert($virtuesgroup){
            $this->set($virtuesgroup->name);
$this->set($virtuesgroup->description);
            
            $sql = "INSERT INTO db_toquela.virtues_group ( name , description ) 
                    VALUES ('$virtuesgroup->name','$virtuesgroup->description')";
            $id = $this->executeInsert($sql);	
            /*$virtuesgroup-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param VirtuesGroup virtuesgroup
     */
    public function update($virtuesgroup){
        $this->set($virtuesgroup->name);
$this->set($virtuesgroup->description);
        
        $sql = "UPDATE db_toquela.virtues_group  SET 
		 name = if( strcmp('$virtuesgroup->name'  , '' ) = 1  , '$virtuesgroup->name', name ),
		 description = if( strcmp('$virtuesgroup->description'  , '' ) = 1  , '$virtuesgroup->description', description ) WHERE  cod_virtues_group =  '$virtuesgroup->codvirtuesgroup'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.virtues_group';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.virtues_group WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.virtues_group WHERE description  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.virtues_group WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.virtues_group WHERE description  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return VirtuesGroup 
     */
    protected function readRow($row) {
        $virtuesgroup = new VirtuesGroup();
        $virtuesgroup->codvirtuesgroup = $row['cod_virtues_group'];
        $virtuesgroup->name = $row['name'];
        $virtuesgroup->description = $row['description'];
        return $virtuesgroup;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.virtues_group";
         return $this->getList($sql, true);
    }
    
}

?>