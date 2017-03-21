<?php 
 /**
 * Clase que opera sobre la tabla 'language'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class LanguageMySqlDAO extends ModelDAO implements LanguageDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Language
     */
    public function load($codlanguage){
        
$this->set($codlanguage);
        $sql = "SELECT * FROM db_toquela.language WHERE  cod_language =  '$codlanguage'";
        return $this->getRow($sql);
    }

    /**
     * Obtiene todo los registro de la tabla
     */
    /**
     * Obtener todos los registro de las tablas
     */
    public function queryAll($limit = null, $page = null) {
        $extra = "";
        if (!is_null($page)) {
            $this->set($page);
            $this->set($limit);
            $page = abs((int) $page);
            if (!preg_match('!^\d+$!', $limit)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            if (!preg_match('!^\d+$!', $page)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            $limit = abs($limit);
            $extra = "  LIMIT $page , $limit";
        } elseif (!is_null($limit)) {
            if (!preg_match('!^\d+$!', $limit)) {
                throw new ErrorException('limit deberia ser un entero');
                return false;
            }
            $extra = " LIMIT $limit";
        }
        $sql = "SELECT * FROM db_toquela.language $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.language ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param language primary key
     */
    public function delete($codlanguage){
            
$this->set($codlanguage);
            $sql = "DELETE FROM db_toquela.language WHERE  cod_language =  '$codlanguage'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Language language
     */
    public function insert($language){
            $this->set($language->word);
$this->set($language->traduction);
$this->set($language->dialect);
            
            $sql = "INSERT INTO db_toquela.language ( word , traduction , dialect ) 
                    VALUES ('$language->word','$language->traduction','$language->dialect')";
            $id = $this->executeInsert($sql);	
            /*$language-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Language language
     */
    public function update($language){
        $this->set($language->word);
$this->set($language->traduction);
$this->set($language->dialect);
        
        $sql = "UPDATE db_toquela.language  SET 
		 word = if( strcmp('$language->word'  , '' ) = 1  , '$language->word', word ),
		 traduction = if( strcmp('$language->traduction'  , '' ) = 1  , '$language->traduction', traduction ),
		 dialect = if( strcmp('$language->dialect'  , '' ) = 1  , '$language->dialect', dialect ) WHERE  cod_language =  '$language->codlanguage'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.language';
        return $this->executeUpdate($sql);
    }


                        public function queryByWord($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.language WHERE word  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByTraduction($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.language WHERE traduction  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDialect($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.language WHERE dialect  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByWord($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.language WHERE word  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByTraduction($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.language WHERE traduction  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDialect($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.language WHERE dialect  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Language 
     */
    protected function readRow($row) {
        $language = new Language();
        $language->codlanguage = $row['cod_language'];
        $language->word = $row['word'];
        $language->traduction = $row['traduction'];
        $language->dialect = $row['dialect'];
        return $language;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.language";
         return $this->getList($sql, true);
    }
    
}

?>