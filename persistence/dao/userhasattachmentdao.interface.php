<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface UserHasAttachmentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UserHasAttachmentMySql 
	 */
	public function load($codattachment,$coduser);

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
 	 * @param userhasattachment primary key
 	 */
	public function delete($codattachment,$coduser);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UserHasAttachmentMySql userhasattachment
 	 */
	public function insert($userhasattachment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UserHasAttachmentMySql userhasattachment
 	 */
	public function update($userhasattachment);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByType($value);    
       public function queryByVariable($value);    
    

            public function deleteByType($value);    
        public function deleteByVariable($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>