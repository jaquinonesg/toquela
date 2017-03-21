<?php 
 /**
 * Clase que opera sobre la tabla 'country'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class CountryMySqlDAO extends ModelDAO implements CountryDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Country
     */
    public function load($codcountry){
        
$this->set($codcountry);
        $sql = "SELECT * FROM db_toquela.country WHERE  cod_country =  '$codcountry'";
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
        $sql = "SELECT * FROM db_toquela.country $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.country ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param country primary key
     */
    public function delete($codcountry){
            
$this->set($codcountry);
            $sql = "DELETE FROM db_toquela.country WHERE  cod_country =  '$codcountry'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Country country
     */
    public function insert($country){
            $this->set($country->name);
            
            $sql = "INSERT INTO db_toquela.country ( name ) 
                    VALUES ('$country->name')";
            $id = $this->executeInsert($sql);	
            /*$country-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Country country
     */
    public function update($country){
        $this->set($country->name);
        
        $sql = "UPDATE db_toquela.country  SET 
		 name = if( strcmp('$country->name'  , '' ) = 1  , '$country->name', name ) WHERE  cod_country =  '$country->codcountry'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.country';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.country WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.country WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Country 
     */
    protected function readRow($row) {
        $country = new Country();
        $country->codcountry = $row['cod_country'];
        $country->name = $row['name'];
        return $country;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.country";
         return $this->getList($sql, true);
    }
    
}

?>