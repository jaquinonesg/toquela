<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-07-24 15:50
 */
interface GamesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return GamesMySql 
	 */
	public function load($codgames);

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
 	 * @param games primary key
 	 */
	public function delete($codgames);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param GamesMySql games
 	 */
	public function insert($games);
	
	/**
 	 * Update record in table
 	 *
 	 * @param GamesMySql games
 	 */
	public function update($games);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByDatetimegame($value);    
       public function queryByDescription($value);    
       public function queryByStatus($value);    
       public function queryByType($value);    
       public function queryByCodComplex($value);    
       public function queryByConfirmComplex($value);    
       public function queryByCodTeamManager($value);    
       public function queryByCodUserManager($value);    
       public function queryByCodTeamRival($value);    
       public function queryByCodMatch($value);    
       public function queryByIdcourtamateur($value);    
    

        public function deleteByDatetimegame($value);    
        public function deleteByDescription($value);    
        public function deleteByStatus($value);    
        public function deleteByType($value);    
        public function deleteByCodComplex($value);    
        public function deleteByConfirmComplex($value);    
        public function deleteByCodTeamManager($value);    
        public function deleteByCodUserManager($value);    
        public function deleteByCodTeamRival($value);    
        public function deleteByCodMatch($value);    
        public function deleteByIdcourtamateur($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>