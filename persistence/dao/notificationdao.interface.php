<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-02-12 09:35
 */
interface NotificationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return NotificationMySql 
	 */
	public function load($codnotification);

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
 	 * @param notification primary key
 	 */
	public function delete($codnotification);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NotificationMySql notification
 	 */
	public function insert($notification);
	
	/**
 	 * Update record in table
 	 *
 	 * @param NotificationMySql notification
 	 */
	public function update($notification);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByText($value);    
       public function queryBySubject($value);    
       public function queryByDate($value);    
       public function queryByViewed($value);    
       public function queryByState($value);    
       public function queryByLink($value);    
       public function queryByCodtypenotifications($value);    
       public function queryByCodUser($value);    
       public function queryByCodTeam($value);    
    

        public function deleteByText($value);    
        public function deleteBySubject($value);    
        public function deleteByDate($value);    
        public function deleteByViewed($value);    
        public function deleteByState($value);    
        public function deleteByLink($value);    
        public function deleteByCodtypenotifications($value);    
        public function deleteByCodUser($value);    
        public function deleteByCodTeam($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>