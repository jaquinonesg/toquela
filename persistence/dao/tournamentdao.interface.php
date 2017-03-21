<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface TournamentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TournamentMySql 
	 */
	public function load($codtournament);

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
 	 * @param tournament primary key
 	 */
	public function delete($codtournament);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TournamentMySql tournament
 	 */
	public function insert($tournament);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TournamentMySql tournament
 	 */
	public function update($tournament);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByType($value);    
       public function queryByDescription($value);    
       public function queryByNumberParticipants($value);    
       public function queryByPoster($value);    
       public function queryByStart($value);    
       public function queryByEnd($value);    
       public function queryByContacts($value);    
       public function queryByRules($value);    
       public function queryByInscriptions($value);    
       public function queryByPlaces($value);    
       public function queryByDate($value);    
       public function queryByCodUser($value);    
       public function queryByStatus($value);    
    

        public function deleteByName($value);    
        public function deleteByType($value);    
        public function deleteByDescription($value);    
        public function deleteByNumberParticipants($value);    
        public function deleteByPoster($value);    
        public function deleteByStart($value);    
        public function deleteByEnd($value);    
        public function deleteByContacts($value);    
        public function deleteByRules($value);    
        public function deleteByInscriptions($value);    
        public function deleteByPlaces($value);    
        public function deleteByDate($value);    
        public function deleteByCodUser($value);    
        public function deleteByStatus($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>