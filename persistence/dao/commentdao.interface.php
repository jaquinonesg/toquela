<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface CommentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CommentMySql 
	 */
	public function load($codcomment);

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
 	 * @param comment primary key
 	 */
	public function delete($codcomment);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CommentMySql comment
 	 */
	public function insert($comment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CommentMySql comment
 	 */
	public function update($comment);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByMessage($value);    
       public function queryByCodMatch($value);    
       public function queryByCodUser($value);    
    

        public function deleteByMessage($value);    
        public function deleteByCodMatch($value);    
        public function deleteByCodUser($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>