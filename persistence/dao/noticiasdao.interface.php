<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-23 14:13
 */
interface NoticiasDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return NoticiasMySql 
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
 	 * @param noticias primary key
 	 */
	public function delete($codnews);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param NoticiasMySql noticias
 	 */
	public function insert($noticias);
	
	/**
 	 * Update record in table
 	 *
 	 * @param NoticiasMySql noticias
 	 */
	public function update($noticias);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByMessage($value);    
       public function queryByType($value);    
       public function queryByDate($value);    
       public function queryByCodTournament($value);    
       public function queryByCodUser($value);    
       public function queryByResumen($value);    
       public function queryByLocImg($value);    
       public function queryByTitulo($value);    
       public function queryByPrioridadTorneo($value);    
       public function queryByPrioridadHome($value);    
    

        public function deleteByMessage($value);    
        public function deleteByType($value);    
        public function deleteByDate($value);    
        public function deleteByCodTournament($value);    
        public function deleteByCodUser($value);    
        public function deleteByResumen($value);    
        public function deleteByLocImg($value);    
        public function deleteByTitulo($value);    
        public function deleteByPrioridadTorneo($value);    
        public function deleteByPrioridadHome($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>