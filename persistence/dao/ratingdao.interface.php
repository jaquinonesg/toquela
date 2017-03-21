<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface RatingDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RatingMySql 
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
 	 * @param rating primary key
 	 */
	public function delete($coduser,$codmatch);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RatingMySql rating
 	 */
	public function insert($rating);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RatingMySql rating
 	 */
	public function update($rating);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByScore($value);    
    

            public function deleteByScore($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>