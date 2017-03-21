<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface PaymentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PaymentMySql 
	 */
	public function load($codpayment);

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
 	 * @param payment primary key
 	 */
	public function delete($codpayment);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PaymentMySql payment
 	 */
	public function insert($payment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PaymentMySql payment
 	 */
	public function update($payment);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
    

        public function deleteByName($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>