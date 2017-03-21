<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface TypeDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TypeMySql 
	 */
	public function load($codtype);

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
 	 * @param type primary key
 	 */
	public function delete($codtype);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TypeMySql type
 	 */
	public function insert($type);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TypeMySql type
 	 */
	public function update($type);	

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