<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-09-15 16:32
 */
interface TypeStatisticDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TypeStatisticMySql 
	 */
	public function load($codtypestatistic);

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
 	 * @param typestatistic primary key
 	 */
	public function delete($codtypestatistic);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TypeStatisticMySql typestatistic
 	 */
	public function insert($typestatistic);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TypeStatisticMySql typestatistic
 	 */
	public function update($typestatistic);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByDescription($value);    
       public function queryByIcon($value);    
    

        public function deleteByName($value);    
        public function deleteByDescription($value);    
        public function deleteByIcon($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>