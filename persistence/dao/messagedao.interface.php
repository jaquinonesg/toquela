<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-01-27 17:35
 */
interface MessageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MessageMySql 
	 */
	public function load($codmessage);

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
 	 * @param message primary key
 	 */
	public function delete($codmessage);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MessageMySql message
 	 */
	public function insert($message);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MessageMySql message
 	 */
	public function update($message);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByText($value);    
       public function queryBySubject($value);    
       public function queryByDate($value);    
       public function queryByViewed($value);    
       public function queryByState($value);    
       public function queryByFrom($value);    
       public function queryByTo($value);    
       public function queryByCodTeam($value);    
    

        public function deleteByText($value);    
        public function deleteBySubject($value);    
        public function deleteByDate($value);    
        public function deleteByViewed($value);    
        public function deleteByState($value);    
        public function deleteByFrom($value);    
        public function deleteByTo($value);    
        public function deleteByCodTeam($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>