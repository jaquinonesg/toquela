<?php 
 /**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2013-12-16 16:56
 */
interface LanguageDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return LanguageMySql 
	 */
	public function load($codlanguage);

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
 	 * @param language primary key
 	 */
	public function delete($codlanguage);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LanguageMySql language
 	 */
	public function insert($language);
	
	/**
 	 * Update record in table
 	 *
 	 * @param LanguageMySql language
 	 */
	public function update($language);	

	/**
	 * Delete all rows
	 */
	public function clean();

      public function queryByWord($value);    
       public function queryByTraduction($value);    
       public function queryByDialect($value);    
    

        public function deleteByWord($value);    
        public function deleteByTraduction($value);    
        public function deleteByDialect($value);    
    
    /**
    * Delete all rows
    */
    public function describe();
    
}

?>