<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-11-19 11:29
 */
interface UsersDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UsersMySql 
	 */
	public function load($coduser);

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
 	 * @param users primary key
 	 */
	public function delete($coduser);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UsersMySql users
 	 */
	public function insert($users);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UsersMySql users
 	 */
	public function update($users);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryById($value);    
       public function queryByName($value);    
       public function queryByLastName($value);    
       public function queryByPhone($value);    
       public function queryByCellular($value);    
       public function queryByAddress($value);    
       public function queryByCity($value);    
       public function queryByUsername($value);    
       public function queryByPassword($value);    
       public function queryByEmail($value);    
       public function queryBySex($value);    
       public function queryByAge($value);    
       public function queryByLongitude($value);    
       public function queryByLatitude($value);    
       public function queryBySkilledLeg($value);    
       public function queryByCodLocality($value);    
       public function queryByCodRole($value);    
       public function queryByIdfan($value);    
       public function queryByPrivilegios($value);    
    

        public function deleteById($value);    
        public function deleteByName($value);    
        public function deleteByLastName($value);    
        public function deleteByPhone($value);    
        public function deleteByCellular($value);    
        public function deleteByAddress($value);    
        public function deleteByCity($value);    
        public function deleteByUsername($value);    
        public function deleteByPassword($value);    
        public function deleteByEmail($value);    
        public function deleteBySex($value);    
        public function deleteByAge($value);    
        public function deleteByLongitude($value);    
        public function deleteByLatitude($value);    
        public function deleteBySkilledLeg($value);    
        public function deleteByCodLocality($value);    
        public function deleteByCodRole($value);    
        public function deleteByIdfan($value);    
        public function deleteByPrivilegios($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>