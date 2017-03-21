<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-02-10 15:26
 */
interface DomainDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DomainMySql 
	 */
	public function load($coddomain);

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
 	 * @param domain primary key
 	 */
	public function delete($coddomain);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DomainMySql domain
 	 */
	public function insert($domain);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DomainMySql domain
 	 */
	public function update($domain);	

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