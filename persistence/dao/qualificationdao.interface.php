<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface QualificationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return QualificationMySql 
	 */
	public function load($codqualification);

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
 	 * @param qualification primary key
 	 */
	public function delete($codqualification);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param QualificationMySql qualification
 	 */
	public function insert($qualification);
	
	/**
 	 * Update record in table
 	 *
 	 * @param QualificationMySql qualification
 	 */
	public function update($qualification);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByDescription($value);    
       public function queryByType($value);    
    

        public function deleteByName($value);    
        public function deleteByDescription($value);    
        public function deleteByType($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>