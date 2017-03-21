<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface FanDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return FanMySql 
	 */
	public function load($idfan);

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
 	 * @param fan primary key
 	 */
	public function delete($idfan);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param FanMySql fan
 	 */
	public function insert($fan);
	
	/**
 	 * Update record in table
 	 *
 	 * @param FanMySql fan
 	 */
	public function update($fan);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByIcon($value);    
    

        public function deleteByName($value);    
        public function deleteByIcon($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>