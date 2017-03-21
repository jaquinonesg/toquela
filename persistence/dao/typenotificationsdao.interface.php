<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-02-03 11:36
 */
interface TypenotificationsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TypenotificationsMySql 
	 */
	public function load($codtypenotifications);

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
 	 * @param typenotifications primary key
 	 */
	public function delete($codtypenotifications);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TypenotificationsMySql typenotifications
 	 */
	public function insert($typenotifications);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TypenotificationsMySql typenotifications
 	 */
	public function update($typenotifications);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByDescription($value);    
    

        public function deleteByName($value);    
        public function deleteByDescription($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>