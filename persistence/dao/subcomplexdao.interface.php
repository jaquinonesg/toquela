<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface SubComplexDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return SubComplexMySql 
	 */
	public function load($codsubcomplex);

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
 	 * @param subcomplex primary key
 	 */
	public function delete($codsubcomplex);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param SubComplexMySql subcomplex
 	 */
	public function insert($subcomplex);
	
	/**
 	 * Update record in table
 	 *
 	 * @param SubComplexMySql subcomplex
 	 */
	public function update($subcomplex);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByCodComplex($value);    
    

        public function deleteByName($value);    
        public function deleteByCodComplex($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>