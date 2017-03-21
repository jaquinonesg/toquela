<?php 
 /**
 * Clase que opera sobre la tabla 'courtamateur_has_attachment'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2014-07-15 16:34
 */
class CourtamateurHasAttachmentMySqlDAO extends ModelDAO implements CourtamateurHasAttachmentDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return CourtamateurHasAttachment
     */
    public function load($idcourtamateur,$codattachment){
        
$this->set($idcourtamateur);
$this->set($codattachment);
        $sql = "SELECT * FROM db_toquela.courtamateur_has_attachment WHERE  idcourtamateur =  '$idcourtamateur' AND  cod_attachment =  '$codattachment'";
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
        $sql = "SELECT * FROM db_toquela.courtamateur_has_attachment $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.courtamateur_has_attachment ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param courtamateurhasattachment primary key
     */
    public function delete($idcourtamateur,$codattachment){
            
$this->set($idcourtamateur);
$this->set($codattachment);
            $sql = "DELETE FROM db_toquela.courtamateur_has_attachment WHERE  idcourtamateur =  '$idcourtamateur' AND  cod_attachment =  '$codattachment'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param CourtamateurHasAttachment courtamateurhasattachment
     */
    public function insert($courtamateurhasattachment){
            ;
            
            $sql = "INSERT INTO db_toquela.courtamateur_has_attachment ( idcourtamateur , cod_attachment ) 
                    VALUES ('$courtamateurhasattachment->idcourtamateur','$courtamateurhasattachment->codattachment')";
            $id = $this->executeInsert($sql);	
            /*$courtamateurhasattachment-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param CourtamateurHasAttachment courtamateurhasattachment
     */
    public function update($courtamateurhasattachment){
        ;
        
        $sql = "UPDATE db_toquela.courtamateur_has_attachment  SET  WHERE  idcourtamateur =  '$courtamateurhasattachment->idcourtamateur' AND  cod_attachment =  '$courtamateurhasattachment->codattachment'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.courtamateur_has_attachment';
        return $this->executeUpdate($sql);
    }


                                
                 
                
        
	
    /**
     * Read row
     *
     * @return CourtamateurHasAttachment 
     */
    protected function readRow($row) {
        $courtamateurhasattachment = new CourtamateurHasAttachment();
        $courtamateurhasattachment->idcourtamateur = $row['idcourtamateur'];
        $courtamateurhasattachment->codattachment = $row['cod_attachment'];
        return $courtamateurhasattachment;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.courtamateur_has_attachment";
         return $this->getList($sql, true);
    }
    
}

?>