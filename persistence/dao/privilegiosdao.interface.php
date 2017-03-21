<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-11-20 10:37
 */
interface PrivilegiosDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return PrivilegiosMySql 
	 */
	public function load($idprivilegios);

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
 	 * @param privilegios primary key
 	 */
	public function delete($idprivilegios);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param PrivilegiosMySql privilegios
 	 */
	public function insert($privilegios);
	
	/**
 	 * Update record in table
 	 *
 	 * @param PrivilegiosMySql privilegios
 	 */
	public function update($privilegios);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByNombre($value);    
       public function queryByDescripcion($value);    
       public function queryByLink($value);    
    

        public function deleteByNombre($value);    
        public function deleteByDescripcion($value);    
        public function deleteByLink($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>