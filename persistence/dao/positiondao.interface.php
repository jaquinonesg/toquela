<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface PositionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PositionMySql 
	 */
	public function load($codposition);

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
 	 * @param position primary key
 	 */
	public function delete($codposition);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PositionMySql position
 	 */
	public function insert($position);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PositionMySql position
 	 */
	public function update($position);	

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