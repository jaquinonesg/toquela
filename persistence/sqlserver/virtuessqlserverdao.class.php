<?php 
 /**
 * Clase que opera sobre la tabla 'virtues'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-08-08 11:12
 */
class VirtuesSqlServerDAO extends ModelDAO implements VirtuesDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Virtues
     */
    public function load($codvirtues){
        
$this->set($codvirtues);
        $sql = "SELECT * FROM db_toquela.virtues WHERE  cod_virtues =  '$codvirtues'";
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
        $sql = "SELECT * FROM db_toquela.virtues $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.virtues ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param virtues primary key
     */
    public function delete($codvirtues){
            
$this->set($codvirtues);
            $sql = "DELETE FROM db_toquela.virtues WHERE  cod_virtues =  '$codvirtues'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Virtues virtues
     */
    public function insert($virtues){
            $this->set($virtues->name);
$this->set($virtues->type);
$this->set($virtues->codvirtuesgroup);
            
            $sql = "INSERT INTO db_toquela.virtues ( name , type , cod_virtues_group ) 
                    VALUES ('$virtues->name','$virtues->type','$virtues->codvirtuesgroup')";
            $id = $this->executeInsert($sql);	
            /*$virtues-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Virtues virtues
     */
    public function update($virtues){
        $this->set($virtues->name);
$this->set($virtues->type);
$this->set($virtues->codvirtuesgroup);
        
        $sql = "UPDATE db_toquela.virtues  SET 
		 name = iif( len('$virtues->name' ) <> 0  , '$virtues->name', name ),
		 type = iif( len('$virtues->type' ) <> 0  , '$virtues->type', type ),
		 cod_virtues_group = iif( len('$virtues->codvirtuesgroup' ) <> 0  , '$virtues->codvirtuesgroup', cod_virtues_group ) WHERE  cod_virtues =  '$virtues->codvirtues'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.virtues';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.virtues WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.virtues WHERE type  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodVirtuesGroup($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.virtues WHERE cod_virtues_group  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.virtues WHERE name  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.virtues WHERE type  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByCodVirtuesGroup($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.virtues WHERE cod_virtues_group  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Virtues 
     */
    protected function readRow($row) {
        $virtues = new Virtues();
        $virtues->codvirtues = $row['cod_virtues'];
        $virtues->name = $row['name'];
        $virtues->type = $row['type'];
        $virtues->codvirtuesgroup = $row['cod_virtues_group'];
        return $virtues;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.virtues";
         return $this->getList($sql, true);
    }
    
}
  
?>