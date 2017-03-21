<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-17 10:28
 */
interface TournamentHasTeamDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TournamentHasTeamMySql 
	 */
	public function load($codtournament,$codteam);

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
 	 * @param tournamenthasteam primary key
 	 */
	public function delete($codtournament,$codteam);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TournamentHasTeamMySql tournamenthasteam
 	 */
	public function insert($tournamenthasteam);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TournamentHasTeamMySql tournamenthasteam
 	 */
	public function update($tournamenthasteam);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByNumber($value);    
       public function queryByRound($value);    
       public function queryByStatus($value);    
    

            public function deleteByNumber($value);    
        public function deleteByRound($value);    
        public function deleteByStatus($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>