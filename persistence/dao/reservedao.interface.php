<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-07-24 15:50
 */
interface ReserveDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ReserveMySql 
	 */
	public function load($codreserve);

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
 	 * @param reserve primary key
 	 */
	public function delete($codreserve);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ReserveMySql reserve
 	 */
	public function insert($reserve);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ReserveMySql reserve
 	 */
	public function update($reserve);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByAmount($value);    
       public function queryByDeposit($value);    
       public function queryByCanal($value);    
       public function queryByStart($value);    
       public function queryByEnd($value);    
       public function queryByCodUser($value);    
       public function queryByCodSubComplex($value);    
       public function queryByDate($value);    
       public function queryByCodSchedule($value);    
       public function queryByCodGames($value);    
    

        public function deleteByAmount($value);    
        public function deleteByDeposit($value);    
        public function deleteByCanal($value);    
        public function deleteByStart($value);    
        public function deleteByEnd($value);    
        public function deleteByCodUser($value);    
        public function deleteByCodSubComplex($value);    
        public function deleteByDate($value);    
        public function deleteByCodSchedule($value);    
        public function deleteByCodGames($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>