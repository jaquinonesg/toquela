<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-02-03 11:36
 */
interface MailtempDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MailtempMySql 
	 */
	public function load($codmailtemp);

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
 	 * @param mailtemp primary key
 	 */
	public function delete($codmailtemp);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MailtempMySql mailtemp
 	 */
	public function insert($mailtemp);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MailtempMySql mailtemp
 	 */
	public function update($mailtemp);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByTomails($value);    
       public function queryBySubject($value);    
       public function queryByText($value);    
       public function queryByDate($value);    
       public function queryByState($value);    
       public function queryByPrioritydate($value);    
       public function queryByPriorityhour($value);    
    

        public function deleteByTomails($value);    
        public function deleteBySubject($value);    
        public function deleteByText($value);    
        public function deleteByDate($value);    
        public function deleteByState($value);    
        public function deleteByPrioritydate($value);    
        public function deleteByPriorityhour($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>