<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface CityDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CityMySql 
	 */
	public function load($codcity);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param city primary key
 	 */
	public function delete($codcity);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CityMySql city
 	 */
	public function insert($city);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CityMySql city
 	 */
	public function update($city);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByCodCountry($value);    
       public function queryByOrder($value);    
    

        public function deleteByName($value);    
        public function deleteByCodCountry($value);    
        public function deleteByOrder($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>