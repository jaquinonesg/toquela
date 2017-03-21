<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface CountryDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CountryMySql 
	 */
	public function load($codcountry);

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
 	 * @param country primary key
 	 */
	public function delete($codcountry);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CountryMySql country
 	 */
	public function insert($country);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CountryMySql country
 	 */
	public function update($country);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
    

        public function deleteByName($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>