<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface UserHasVirtuesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UserHasVirtuesMySql 
	 */
	public function load($coduser,$codvirtues);

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
 	 * @param userhasvirtues primary key
 	 */
	public function delete($coduser,$codvirtues);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UserHasVirtuesMySql userhasvirtues
 	 */
	public function insert($userhasvirtues);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UserHasVirtuesMySql userhasvirtues
 	 */
	public function update($userhasvirtues);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByMain($value);    
    

            public function deleteByMain($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>