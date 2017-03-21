<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2014-05-08 12:59
 */
interface ComplexHasAttachmentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ComplexHasAttachmentMySql 
	 */
	public function load($codattachment,$codcomplex);

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
 	 * @param complexhasattachment primary key
 	 */
	public function delete($codattachment,$codcomplex);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComplexHasAttachmentMySql complexhasattachment
 	 */
	public function insert($complexhasattachment);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComplexHasAttachmentMySql complexhasattachment
 	 */
	public function update($complexhasattachment);	

	/**
	 * Delete all rows
	 */
	public function clean();

         public function queryByCodSubComplex($value);    
    

            public function deleteByCodSubComplex($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>