<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-07-15 16:34
 */
interface CourtamateurDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return CourtamateurMySql 
	 */
	public function load($idcourtamateur);

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
 	 * @param courtamateur primary key
 	 */
	public function delete($idcourtamateur);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param CourtamateurMySql courtamateur
 	 */
	public function insert($courtamateur);
	
	/**
 	 * Update record in table
 	 *
 	 * @param CourtamateurMySql courtamateur
 	 */
	public function update($courtamateur);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByNombre($value);    
       public function queryByLat($value);    
       public function queryByLng($value);    
       public function queryByDireccion($value);    
       public function queryByRedirec($value);    
       public function queryByDescripcion($value);    
    

        public function deleteByNombre($value);    
        public function deleteByLat($value);    
        public function deleteByLng($value);    
        public function deleteByDireccion($value);    
        public function deleteByRedirec($value);    
        public function deleteByDescripcion($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>