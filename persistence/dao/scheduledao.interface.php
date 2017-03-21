<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface ScheduleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ScheduleMySql 
	 */
	public function load($codschedule);

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
 	 * @param schedule primary key
 	 */
	public function delete($codschedule);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ScheduleMySql schedule
 	 */
	public function insert($schedule);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ScheduleMySql schedule
 	 */
	public function update($schedule);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByDay($value);    
       public function queryByStartHour($value);    
       public function queryByEndHour($value);    
       public function queryByPrice($value);    
       public function queryByCodSubComplex($value);    
       public function queryByStatus($value);    
    

        public function deleteByDay($value);    
        public function deleteByStartHour($value);    
        public function deleteByEndHour($value);    
        public function deleteByPrice($value);    
        public function deleteByCodSubComplex($value);    
        public function deleteByStatus($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>