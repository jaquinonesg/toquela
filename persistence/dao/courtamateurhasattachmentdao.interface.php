<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-07-15 16:34
 */
interface CourtamateurHasAttachmentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CourtamateurHasAttachmentMySql 
	 */
	public function load($idcourtamateur,$codattachment);

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
 	 * @param courtamateurhasattachment primary key
 	 */
	public function delete($idcourtamateur,$codattachment);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CourtamateurHasAttachmentMySql courtamateurhasattachment
 	 */
	public function insert($courtamateurhasattachment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CourtamateurHasAttachmentMySql courtamateurhasattachment
 	 */
	public function update($courtamateurhasattachment);	

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