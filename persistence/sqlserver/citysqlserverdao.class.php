<?php 
 /**
 * Clase que opera sobre la tabla 'city'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-08-09 01:03
 */
class CitySqlServerDAO extends ModelDAO implements CityDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return City
     */
    public function load($codcity){
        
$this->set($codcity);
        $sql = "SELECT * FROM db_toquela.city WHERE  cod_city =  '$codcity'";
        return $this->getRow($sql);
    }

    /**
     * Obtiene todo los registro de la tabla
     */
    /**
     * Obtener todos los registro de las tablas
     */
    public function queryAll($limit = null, $page = null) {     
        $sql = 'SELECT * FROM db_toquela.city ORDER BY "order" DESC , name';
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.city ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param city primary key
     */
    public function delete($codcity){
            
$this->set($codcity);
            $sql = "DELETE FROM db_toquela.city WHERE  cod_city =  '$codcity'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param City city
     */
    public function insert($city){
            $this->set($city->name);
$this->set($city->codcountry);
$this->set($city->order);
            
            $sql = "INSERT INTO db_toquela.city ( cod_city , name , cod_country , order ) 
                    VALUES ('$city->codcity','$city->name','$city->codcountry','$city->order')";
            $id = $this->executeInsert($sql);	
            /*$city-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param City city
     */
    public function update($city){
        $this->set($city->name);
$this->set($city->codcountry);
$this->set($city->order);
        
        $sql = "UPDATE db_toquela.city  SET 
		 name = iif( len('$city->name' ) <> 0  , '$city->name', name ),
		 cod_country = iif( len('$city->codcountry' ) <> 0  , '$city->codcountry', cod_country ),
		 order = iif( len('$city->order' ) <> 0  , '$city->order', order ) WHERE  cod_city =  '$city->codcity'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.city';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.city WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodCountry($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.city WHERE cod_country  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByOrder($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.city WHERE order  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.city WHERE name  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByCodCountry($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.city WHERE cod_country  = '$value'";
        return $this->getList($sql);
        }
        
            
            public function deleteByOrder($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.city WHERE order  = '$value'";
        return $this->getList($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return City 
     */
    protected function readRow($row) {
        $city = new City();
        $city->codcity = $row['cod_city'];
        $city->name = $row['name'];
        $city->codcountry = $row['cod_country'];
        $city->order = $row['order'];
        return $city;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.city";
         return $this->getList($sql, true);
    }
    
}
  
?>