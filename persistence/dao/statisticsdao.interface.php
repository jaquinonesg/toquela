<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-11-25 12:27
 */
interface StatisticsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return StatisticsMySql 
	 */
	public function load($codstatistics);

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
 	 * @param statistics primary key
 	 */
	public function delete($codstatistics);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param StatisticsMySql statistics
 	 */
	public function insert($statistics);
	
	/**
 	 * Update record in table
 	 *
 	 * @param StatisticsMySql statistics
 	 */
	public function update($statistics);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByMinute($value);    
       public function queryByDate($value);    
       public function queryByIsLocal($value);    
       public function queryByDescription($value);    
       public function queryByCodTypeStatistic($value);    
       public function queryByCodUser($value);    
       public function queryByCodMatch($value);    
       public function queryByEstado($value);    
    

        public function deleteByMinute($value);    
        public function deleteByDate($value);    
        public function deleteByIsLocal($value);    
        public function deleteByDescription($value);    
        public function deleteByCodTypeStatistic($value);    
        public function deleteByCodUser($value);    
        public function deleteByCodMatch($value);    
        public function deleteByEstado($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>