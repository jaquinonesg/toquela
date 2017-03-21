<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface TournamentHasAttachmentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return TournamentHasAttachmentMySql 
	 */
	public function load($codtournament,$codattachment);

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
 	 * @param tournamenthasattachment primary key
 	 */
	public function delete($codtournament,$codattachment);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param TournamentHasAttachmentMySql tournamenthasattachment
 	 */
	public function insert($tournamenthasattachment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param TournamentHasAttachmentMySql tournamenthasattachment
 	 */
	public function update($tournamenthasattachment);	

	/**
	 * Delete all rows
	 */
	public function clean();

      

        
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>