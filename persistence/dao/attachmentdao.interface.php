<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface AttachmentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AttachmentMySql 
	 */
	public function load($codattachment);

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
 	 * @param attachment primary key
 	 */
	public function delete($codattachment);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AttachmentMySql attachment
 	 */
	public function insert($attachment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AttachmentMySql attachment
 	 */
	public function update($attachment);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByType($value);    
       public function queryByPath($value);    
       public function queryByDescription($value);    
       public function queryByDate($value);    
       public function queryByNameFile($value);    
       public function queryByNameEncode($value);    
    

        public function deleteByType($value);    
        public function deleteByPath($value);    
        public function deleteByDescription($value);    
        public function deleteByDate($value);    
        public function deleteByNameFile($value);    
        public function deleteByNameEncode($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>