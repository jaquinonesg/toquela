<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface TeamHasVirtuesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TeamHasVirtuesMySql 
	 */
	public function load($codteam,$codvirtues);

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
 	 * @param teamhasvirtues primary key
 	 */
	public function delete($codteam,$codvirtues);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TeamHasVirtuesMySql teamhasvirtues
 	 */
	public function insert($teamhasvirtues);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TeamHasVirtuesMySql teamhasvirtues
 	 */
	public function update($teamhasvirtues);	

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