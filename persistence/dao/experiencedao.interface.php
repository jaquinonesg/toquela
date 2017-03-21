<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface ExperienceDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ExperienceMySql 
	 */
	public function load($codexperience);

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
 	 * @param experience primary key
 	 */
	public function delete($codexperience);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ExperienceMySql experience
 	 */
	public function insert($experience);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ExperienceMySql experience
 	 */
	public function update($experience);	

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