<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface GroupDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GroupMySql 
	 */
	public function load($codtournament,$codteam);

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
 	 * @param group primary key
 	 */
	public function delete($codtournament,$codteam);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GroupMySql group
 	 */
	public function insert($group);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GroupMySql group
 	 */
	public function update($group);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByNumber($value);    
    

            public function deleteByNumber($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>