<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface DisponibilityDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DisponibilityMySql 
	 */
	public function load($coddisponibility);

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
 	 * @param disponibility primary key
 	 */
	public function delete($coddisponibility);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DisponibilityMySql disponibility
 	 */
	public function insert($disponibility);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DisponibilityMySql disponibility
 	 */
	public function update($disponibility);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByDay($value);    
       public function queryByStartHour($value);    
       public function queryByEndHour($value);    
       public function queryByCodUser($value);    
    

        public function deleteByDay($value);    
        public function deleteByStartHour($value);    
        public function deleteByEndHour($value);    
        public function deleteByCodUser($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>