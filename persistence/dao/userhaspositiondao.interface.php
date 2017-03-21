<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface UserHasPositionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UserHasPositionMySql 
	 */
	public function load($coduser,$codposition);

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
 	 * @param userhasposition primary key
 	 */
	public function delete($coduser,$codposition);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UserHasPositionMySql userhasposition
 	 */
	public function insert($userhasposition);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UserHasPositionMySql userhasposition
 	 */
	public function update($userhasposition);	

	/**
	 * Delete all rows
	 */
	public function clean();

      

        
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>