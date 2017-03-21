<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface NewsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return NewsMySql 
	 */
	public function load($codnews);

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
 	 * @param news primary key
 	 */
	public function delete($codnews);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NewsMySql news
 	 */
	public function insert($news);
	
	/**
 	 * Update record in table
 	 *
 	 * @param NewsMySql news
 	 */
	public function update($news);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByMessage($value);    
       public function queryByType($value);    
       public function queryByDate($value);    
       public function queryByCodTournament($value);    
       public function queryByCodUser($value);    
    

        public function deleteByMessage($value);    
        public function deleteByType($value);    
        public function deleteByDate($value);    
        public function deleteByCodTournament($value);    
        public function deleteByCodUser($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>