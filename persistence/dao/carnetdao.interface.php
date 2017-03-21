<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-01-23 10:43
 */
interface CarnetDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CarnetMySql 
	 */
	public function load($codtournament);

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
 	 * @param carnet primary key
 	 */
	public function delete($codtournament);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CarnetMySql carnet
 	 */
	public function insert($carnet);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CarnetMySql carnet
 	 */
	public function update($carnet);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByNombre($value);    
       public function queryById($value);    
       public function queryByAuxdata($value);    
       public function queryByData($value);    
       public function queryByCods($value);    
       public function queryByLogofilename($value);    
       public function queryByLogoname($value);    
    

        public function deleteByNombre($value);    
        public function deleteById($value);    
        public function deleteByAuxdata($value);    
        public function deleteByData($value);    
        public function deleteByCods($value);    
        public function deleteByLogofilename($value);    
        public function deleteByLogoname($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>