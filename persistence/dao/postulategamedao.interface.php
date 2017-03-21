<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-06-27 15:24
 */
interface PostulategameDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PostulategameMySql 
	 */
	public function load($codpostulategame);

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
 	 * @param postulategame primary key
 	 */
	public function delete($codpostulategame);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PostulategameMySql postulategame
 	 */
	public function insert($postulategame);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PostulategameMySql postulategame
 	 */
	public function update($postulategame);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByCodGames($value);    
       public function queryByCodTeam($value);    
       public function queryByStatus($value);    
    

        public function deleteByCodGames($value);    
        public function deleteByCodTeam($value);    
        public function deleteByStatus($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>