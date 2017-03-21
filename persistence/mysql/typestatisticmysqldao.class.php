<?php 
 /**
 * Clase que opera sobre la tabla 'type_statistic'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-09-15 16:32
 */
class TypeStatisticMySqlDAO extends ModelDAO implements TypeStatisticDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return TypeStatistic
     */
    public function load($codtypestatistic){
        
$this->set($codtypestatistic);
        $sql = "SELECT * FROM db_toquela.type_statistic WHERE  cod_type_statistic =  '$codtypestatistic'";
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
        $sql = "SELECT * FROM db_toquela.type_statistic $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.type_statistic ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param typestatistic primary key
     */
    public function delete($codtypestatistic){
            
$this->set($codtypestatistic);
            $sql = "DELETE FROM db_toquela.type_statistic WHERE  cod_type_statistic =  '$codtypestatistic'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param TypeStatistic typestatistic
     */
    public function insert($typestatistic){
            $this->set($typestatistic->name);
$this->set($typestatistic->description);
$this->set($typestatistic->icon);
            
            $sql = "INSERT INTO db_toquela.type_statistic ( name , description , icon ) 
                    VALUES ('$typestatistic->name','$typestatistic->description','$typestatistic->icon')";
            $id = $this->executeInsert($sql);	
            /*$typestatistic-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param TypeStatistic typestatistic
     */
    public function update($typestatistic){
        $this->set($typestatistic->name);
$this->set($typestatistic->description);
$this->set($typestatistic->icon);
        
        $sql = "UPDATE db_toquela.type_statistic  SET 
		 name = if( strcmp('$typestatistic->name'  , '' ) = 1  , '$typestatistic->name', name ),
		 description = if( strcmp('$typestatistic->description'  , '' ) = 1  , '$typestatistic->description', description ),
		 icon = if( strcmp('$typestatistic->icon'  , '' ) = 1  , '$typestatistic->icon', icon ) WHERE  cod_type_statistic =  '$typestatistic->codtypestatistic'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.type_statistic';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.type_statistic WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.type_statistic WHERE description  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByIcon($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.type_statistic WHERE icon  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.type_statistic WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.type_statistic WHERE description  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByIcon($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.type_statistic WHERE icon  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return TypeStatistic 
     */
    protected function readRow($row) {
        $typestatistic = new TypeStatistic();
        $typestatistic->codtypestatistic = $row['cod_type_statistic'];
        $typestatistic->name = $row['name'];
        $typestatistic->description = $row['description'];
        $typestatistic->icon = $row['icon'];
        return $typestatistic;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.type_statistic";
         return $this->getList($sql, true);
    }
    
}

?>