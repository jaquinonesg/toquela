<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface AdministratorDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AdministratorMySql 
	 */
	public function load($codadministrator);

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
 	 * @param administrator primary key
 	 */
	public function delete($codadministrator);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AdministratorMySql administrator
 	 */
	public function insert($administrator);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AdministratorMySql administrator
 	 */
	public function update($administrator);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByPassword($value);    
       public function queryByEmail($value);    
       public function queryByAddress($value);    
       public function queryByPhone($value);    
       public function queryByIsDiary($value);    
       public function queryByIsUser($value);    
       public function queryByIsComplex($value);    
       public function queryByIsIndex($value);    
       public function queryByCodComplex($value);    
       public function queryByIsToquela($value);    
    

        public function deleteByName($value);    
        public function deleteByPassword($value);    
        public function deleteByEmail($value);    
        public function deleteByAddress($value);    
        public function deleteByPhone($value);    
        public function deleteByIsDiary($value);    
        public function deleteByIsUser($value);    
        public function deleteByIsComplex($value);    
        public function deleteByIsIndex($value);    
        public function deleteByCodComplex($value);    
        public function deleteByIsToquela($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>