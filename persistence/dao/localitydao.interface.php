<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface LocalityDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return LocalityMySql 
	 */
	public function load($codlocality);

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
 	 * @param locality primary key
 	 */
	public function delete($codlocality);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LocalityMySql locality
 	 */
	public function insert($locality);
	
	/**
 	 * Update record in table
 	 *
 	 * @param LocalityMySql locality
 	 */
	public function update($locality);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByCodCity($value);    
       public function queryByMain($value);    
    

        public function deleteByName($value);    
        public function deleteByCodCity($value);    
        public function deleteByMain($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>