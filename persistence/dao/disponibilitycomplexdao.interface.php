<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface DisponibilityComplexDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return DisponibilityComplexMySql 
	 */
	public function load($coddisponibilitycomplex);

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
 	 * @param disponibilitycomplex primary key
 	 */
	public function delete($coddisponibilitycomplex);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param DisponibilityComplexMySql disponibilitycomplex
 	 */
	public function insert($disponibilitycomplex);
	
	/**
 	 * Update record in table
 	 *
 	 * @param DisponibilityComplexMySql disponibilitycomplex
 	 */
	public function update($disponibilitycomplex);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByDay($value);    
       public function queryByHour($value);    
       public function queryByCodComplex($value);    
       public function queryByCodTariff($value);    
    

        public function deleteByDay($value);    
        public function deleteByHour($value);    
        public function deleteByCodComplex($value);    
        public function deleteByCodTariff($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>