<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-01-27 11:44
 */
interface AditionalDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return AditionalMySql 
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
 	 * @param aditional primary key
 	 */
	public function delete($coduser);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param AditionalMySql aditional
 	 */
	public function insert($aditional);
	
	/**
 	 * Update record in table
 	 *
 	 * @param AditionalMySql aditional
 	 */
	public function update($aditional);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByTypedoc($value);    
       public function queryByNumdoc($value);    
       public function queryByDatebirth($value);    
       public function queryByCategory($value);    
       public function queryByTypeblood($value);    
       public function queryByEps($value);    
       public function queryByProfession($value);    
       public function queryByUniversity($value);    
       public function queryByNationality($value);    
       public function queryByGuardian($value);    
       public function queryByTeamcarnet($value);    
    

        public function deleteByTypedoc($value);    
        public function deleteByNumdoc($value);    
        public function deleteByDatebirth($value);    
        public function deleteByCategory($value);    
        public function deleteByTypeblood($value);    
        public function deleteByEps($value);    
        public function deleteByProfession($value);    
        public function deleteByUniversity($value);    
        public function deleteByNationality($value);    
        public function deleteByGuardian($value);    
        public function deleteByTeamcarnet($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>