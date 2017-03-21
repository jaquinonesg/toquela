<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-05-22 16:41
 */
interface MatchDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return MatchMySql 
	 */
	public function load($codmatch);

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
 	 * @param match primary key
 	 */
	public function delete($codmatch);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param MatchMySql match
 	 */
	public function insert($match);
	
	/**
 	 * Update record in table
 	 *
 	 * @param MatchMySql match
 	 */
	public function update($match);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByDate($value);    
       public function queryByHour($value);    
       public function queryByRound($value);    
       public function queryByGroup($value);    
       public function queryByType($value);    
       public function queryByCodComplex($value);    
       public function queryByTeamLocal($value);    
       public function queryByScoreLocal($value);    
       public function queryByTeamVisitant($value);    
       public function queryByScoreVisitant($value);    
       public function queryByCodTournament($value);    
       public function queryByDescription($value);    
       public function queryByDescriptionPlace($value);    
       public function queryByNumjornada($value);    
       public function queryByEstate($value);    
       public function queryByArbitros($value);    
       public function queryByStateScoreVisitant($value);    
       public function queryByStateScoreLocal($value);    
       public function queryByGolesFavorLocal($value);    
       public function queryByGolesContraLocal($value);    
       public function queryByGolesFavorVisitant($value);    
       public function queryByGolesContraVisitant($value);    
    

        public function deleteByDate($value);    
        public function deleteByHour($value);    
        public function deleteByRound($value);    
        public function deleteByGroup($value);    
        public function deleteByType($value);    
        public function deleteByCodComplex($value);    
        public function deleteByTeamLocal($value);    
        public function deleteByScoreLocal($value);    
        public function deleteByTeamVisitant($value);    
        public function deleteByScoreVisitant($value);    
        public function deleteByCodTournament($value);    
        public function deleteByDescription($value);    
        public function deleteByDescriptionPlace($value);    
        public function deleteByNumjornada($value);    
        public function deleteByEstate($value);    
        public function deleteByArbitros($value);    
        public function deleteByStateScoreVisitant($value);    
        public function deleteByStateScoreLocal($value);    
        public function deleteByGolesFavorLocal($value);    
        public function deleteByGolesContraLocal($value);    
        public function deleteByGolesFavorVisitant($value);    
        public function deleteByGolesContraVisitant($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>