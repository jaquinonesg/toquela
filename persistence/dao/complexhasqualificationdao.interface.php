<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface ComplexHasQualificationDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return ComplexHasQualificationMySql 
	 */
	public function load($codqualification,$codcomplex,$coduser);

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
 	 * @param complexhasqualification primary key
 	 */
	public function delete($codqualification,$codcomplex,$coduser);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ComplexHasQualificationMySql complexhasqualification
 	 */
	public function insert($complexhasqualification);
	
	/**
 	 * Update record in table
 	 *
 	 * @param ComplexHasQualificationMySql complexhasqualification
 	 */
	public function update($complexhasqualification);	

	/**
	 * Delete all rows
	 */
	public function clean();

            public function queryByQualification($value);    
    

                public function deleteByQualification($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>