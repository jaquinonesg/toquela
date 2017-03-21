<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface FavoritesComplexDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FavoritesComplexMySql 
	 */
	public function load($coduser,$codcomplex);

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
 	 * @param favoritescomplex primary key
 	 */
	public function delete($coduser,$codcomplex);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FavoritesComplexMySql favoritescomplex
 	 */
	public function insert($favoritescomplex);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FavoritesComplexMySql favoritescomplex
 	 */
	public function update($favoritescomplex);	

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