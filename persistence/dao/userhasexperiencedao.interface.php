<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface UserHasExperienceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UserHasExperienceMySql 
	 */
	public function load($coduser,$codexperience);

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
 	 * @param userhasexperience primary key
 	 */
	public function delete($coduser,$codexperience);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UserHasExperienceMySql userhasexperience
 	 */
	public function insert($userhasexperience);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UserHasExperienceMySql userhasexperience
 	 */
	public function update($userhasexperience);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByValue($value);    
    

            public function deleteByValue($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>