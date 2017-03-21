<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface TransactionDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TransactionMySql 
	 */
	public function load($codtransactions);

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
 	 * @param transaction primary key
 	 */
	public function delete($codtransactions);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TransactionMySql transaction
 	 */
	public function insert($transaction);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TransactionMySql transaction
 	 */
	public function update($transaction);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByAmount($value);    
       public function queryByCodUser($value);    
    

        public function deleteByAmount($value);    
        public function deleteByCodUser($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>