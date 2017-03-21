<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-11-19 10:44
 */
interface RoleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return RoleMySql 
	 */
	public function load($codrole);

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
 	 * @param role primary key
 	 */
	public function delete($codrole);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param RoleMySql role
 	 */
	public function insert($role);
	
	/**
 	 * Update record in table
 	 *
 	 * @param RoleMySql role
 	 */
	public function update($role);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByDescripcion($value);    
       public function queryByPrivilegios($value);    
    

        public function deleteByName($value);    
        public function deleteByDescripcion($value);    
        public function deleteByPrivilegios($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>