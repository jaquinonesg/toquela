<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-10-27 16:21
 */
interface MatchHasTeamDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MatchHasTeamMySql 
	 */
	public function load($codmatch,$codteam);

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
 	 * @param matchhasteam primary key
 	 */
	public function delete($codmatch,$codteam);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MatchHasTeamMySql matchhasteam
 	 */
	public function insert($matchhasteam);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MatchHasTeamMySql matchhasteam
 	 */
	public function update($matchhasteam);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByLocal($value);    
       public function queryByScore($value);    
    

            public function deleteByLocal($value);    
        public function deleteByScore($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}
  
?>