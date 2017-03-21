<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface FavoritesMatchDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FavoritesMatchMySql 
	 */
	public function load($coduser,$codmatch);

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
 	 * @param favoritesmatch primary key
 	 */
	public function delete($coduser,$codmatch);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FavoritesMatchMySql favoritesmatch
 	 */
	public function insert($favoritesmatch);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FavoritesMatchMySql favoritesmatch
 	 */
	public function update($favoritesmatch);	

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