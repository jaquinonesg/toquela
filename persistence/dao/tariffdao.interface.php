<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface TariffDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TariffMySql 
	 */
	public function load($codtariff);

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
 	 * @param tariff primary key
 	 */
	public function delete($codtariff);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TariffMySql tariff
 	 */
	public function insert($tariff);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TariffMySql tariff
 	 */
	public function update($tariff);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByAmount($value);    
    

        public function deleteByAmount($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>