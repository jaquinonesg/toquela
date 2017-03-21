<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface VirtuesGroupDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return VirtuesGroupMySql 
	 */
	public function load($codvirtuesgroup);

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
 	 * @param virtuesgroup primary key
 	 */
	public function delete($codvirtuesgroup);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param VirtuesGroupMySql virtuesgroup
 	 */
	public function insert($virtuesgroup);
	
	/**
 	 * Update record in table
 	 *
 	 * @param VirtuesGroupMySql virtuesgroup
 	 */
	public function update($virtuesgroup);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByDescription($value);    
    

        public function deleteByName($value);    
        public function deleteByDescription($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>