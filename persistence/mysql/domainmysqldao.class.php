<?php 
 /**
 * Clase que opera sobre la tabla 'domain'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-02-10 15:26
 */
class DomainMySqlDAO extends ModelDAO implements DomainDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Domain
     */
    public function load($coddomain){
        
$this->set($coddomain);
        $sql = "SELECT * FROM db_toquela.domain WHERE  coddomain =  '$coddomain'";
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
        $sql = "SELECT * FROM db_toquela.domain $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.domain ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param domain primary key
     */
    public function delete($coddomain){
            
$this->set($coddomain);
            $sql = "DELETE FROM db_toquela.domain WHERE  coddomain =  '$coddomain'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Domain domain
     */
    public function insert($domain){
            $this->set($domain->name);
            
            $sql = "INSERT INTO db_toquela.domain ( name ) 
                    VALUES ('$domain->name')";
            $id = $this->executeInsert($sql);	
            /*$domain-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Domain domain
     */
    public function update($domain){
        $this->set($domain->name);
        
        $sql = "UPDATE db_toquela.domain  SET 
		 name = if( strcmp('$domain->name'  , '' ) = 1  , '$domain->name', name ) WHERE  coddomain =  '$domain->coddomain'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.domain';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.domain WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.domain WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Domain 
     */
    protected function readRow($row) {
        $domain = new Domain();
        $domain->coddomain = $row['coddomain'];
        $domain->name = $row['name'];
        return $domain;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.domain";
         return $this->getList($sql, true);
    }
    
}

?>