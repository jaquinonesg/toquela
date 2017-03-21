<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface UserHasTeamDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UserHasTeamMySql 
	 */
	public function load($coduser,$codteam);

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
 	 * @param userhasteam primary key
 	 */
	public function delete($coduser,$codteam);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UserHasTeamMySql userhasteam
 	 */
	public function insert($userhasteam);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UserHasTeamMySql userhasteam
 	 */
	public function update($userhasteam);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByStatus($value);    
    

            public function deleteByStatus($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>