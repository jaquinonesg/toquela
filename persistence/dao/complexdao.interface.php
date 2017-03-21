<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface ComplexDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ComplexMySql 
	 */
	public function load($codcomplex);

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
 	 * @param complex primary key
 	 */
	public function delete($codcomplex);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComplexMySql complex
 	 */
	public function insert($complex);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComplexMySql complex
 	 */
	public function update($complex);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByName($value);    
       public function queryByEmail($value);    
       public function queryByLat($value);    
       public function queryByLng($value);    
       public function queryByPhone($value);    
       public function queryByAddress($value);    
       public function queryByDescription($value);    
       public function queryByIfQualification($value);    
    

        public function deleteByName($value);    
        public function deleteByEmail($value);    
        public function deleteByLat($value);    
        public function deleteByLng($value);    
        public function deleteByPhone($value);    
        public function deleteByAddress($value);    
        public function deleteByDescription($value);    
        public function deleteByIfQualification($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>