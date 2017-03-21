<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface VirtuesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return VirtuesMySql 
	 */
	public function load($codvirtues);

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
 	 * @param virtues primary key
 	 */
	public function delete($codvirtues);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param VirtuesMySql virtues
 	 */
	public function insert($virtues);
	
	/**
 	 * Update record in table
 	 *
 	 * @param VirtuesMySql virtues
 	 */
	public function update($virtues);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByType($value);    
       public function queryByCodVirtuesGroup($value);    
    

        public function deleteByName($value);    
        public function deleteByType($value);    
        public function deleteByCodVirtuesGroup($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>