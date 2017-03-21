<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface FollowersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FollowersMySql 
	 */
	public function load($from,$to);

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
 	 * @param followers primary key
 	 */
	public function delete($from,$to);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FollowersMySql followers
 	 */
	public function insert($followers);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FollowersMySql followers
 	 */
	public function update($followers);	

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