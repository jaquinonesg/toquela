<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-11-11 11:11
 */
interface TeamHasAttachmentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TeamHasAttachmentMySql 
	 */
	public function load($codattachment,$codteam);

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
 	 * @param teamhasattachment primary key
 	 */
	public function delete($codattachment,$codteam);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TeamHasAttachmentMySql teamhasattachment
 	 */
	public function insert($teamhasattachment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TeamHasAttachmentMySql teamhasattachment
 	 */
	public function update($teamhasattachment);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByStatus($value);    
    

            public function deleteByStatus($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>