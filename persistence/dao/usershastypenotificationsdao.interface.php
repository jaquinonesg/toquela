<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-02-10 15:26
 */
interface UsersHasTypenotificationsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UsersHasTypenotificationsMySql 
	 */
	public function load($coduser,$codtypenotifications);

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
 	 * @param usershastypenotifications primary key
 	 */
	public function delete($coduser,$codtypenotifications);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsersHasTypenotificationsMySql usershastypenotifications
 	 */
	public function insert($usershastypenotifications);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsersHasTypenotificationsMySql usershastypenotifications
 	 */
	public function update($usershastypenotifications);	

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