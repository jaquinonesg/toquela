<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface TeamDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TeamMySql 
	 */
	public function load($codteam);

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
 	 * @param team primary key
 	 */
	public function delete($codteam);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TeamMySql team
 	 */
	public function insert($team);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TeamMySql team
 	 */
	public function update($team);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByType($value);    
       public function queryByCodLocality($value);    
       public function queryByDescription($value);    
    

        public function deleteByName($value);    
        public function deleteByType($value);    
        public function deleteByCodLocality($value);    
        public function deleteByDescription($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>