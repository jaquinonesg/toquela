<?php 
 /**
 * Clase que opera sobre la tabla 'qualification'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-08-28 12:05
 */
class QualificationSqlServerDAO extends ModelDAO implements QualificationDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Qualification
     */
    public function load($codqualification){
        
$this->set($codqualification);
        $sql = "SELECT * FROM db_toquela.qualification WHERE  cod_qualification =  '$codqualification'";
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
        $sql = "SELECT * FROM db_toquela.qualification $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.qualification ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param qualification primary key
     */
    public function delete($codqualification){
            
$this->set($codqualification);
            $sql = "DELETE FROM db_toquela.qualification WHERE  cod_qualification =  '$codqualification'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Qualification qualification
     */
    public function insert($qualification){
            $this->set($qualification->name);
$this->set($qualification->description);
$this->set($qualification->type);
            
            $sql = "INSERT INTO db_toquela.qualification ( name , description , type ) 
                    VALUES ('$qualification->name','$qualification->description','$qualification->type')";
            $id = $this->executeInsert($sql);	
            /*$qualification-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Qualification qualification
     */
    public function update($qualification){
        $this->set($qualification->name);
$this->set($qualification->description);
$this->set($qualification->type);
        
        $sql = "UPDATE db_toquela.qualification  SET 
		 name = iif( len('$qualification->name' ) <> 0  , '$qualification->name', name ),
		 description = iif( len('$qualification->description' ) <> 0  , '$qualification->description', description ),
		 type = iif( len('$qualification->type' ) <> 0  , '$qualification->type', type ) WHERE  cod_qualification =  '$qualification->codqualification'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.qualification';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.qualification WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.qualification WHERE description  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.qualification WHERE type  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.qualification WHERE name  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.qualification WHERE description  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.qualification WHERE type  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Qualification 
     */
    protected function readRow($row) {
        $qualification = new Qualification();
        $qualification->codqualification = $row['cod_qualification'];
        $qualification->name = $row['name'];
        $qualification->description = $row['description'];
        $qualification->type = $row['type'];
        return $qualification;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.qualification";
         return $this->getList($sql, true);
    }
    
}
  
?>
