<?php 
 /**
 * Clase que opera sobre la tabla 'tournament_has_attachment'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class TournamentHasAttachmentMySqlDAO extends ModelDAO implements TournamentHasAttachmentDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return TournamentHasAttachment
     */
    public function load($codtournament,$codattachment){
        
$this->set($codtournament);
$this->set($codattachment);
        $sql = "SELECT * FROM db_toquela.tournament_has_attachment WHERE  cod_tournament =  '$codtournament' AND  cod_attachment =  '$codattachment'";
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
        $sql = "SELECT * FROM db_toquela.tournament_has_attachment $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.tournament_has_attachment ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param tournamenthasattachment primary key
     */
    public function delete($codtournament,$codattachment){
            
$this->set($codtournament);
$this->set($codattachment);
            $sql = "DELETE FROM db_toquela.tournament_has_attachment WHERE  cod_tournament =  '$codtournament' AND  cod_attachment =  '$codattachment'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param TournamentHasAttachment tournamenthasattachment
     */
    public function insert($tournamenthasattachment){
            ;
            
            $sql = "INSERT INTO db_toquela.tournament_has_attachment ( cod_tournament , cod_attachment ) 
                    VALUES ('$tournamenthasattachment->codtournament','$tournamenthasattachment->codattachment')";
            $id = $this->executeInsert($sql);	
            /*$tournamenthasattachment-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param TournamentHasAttachment tournamenthasattachment
     */
    public function update($tournamenthasattachment){
        ;
        
        $sql = "UPDATE db_toquela.tournament_has_attachment  SET  WHERE  cod_tournament =  '$tournamenthasattachment->codtournament' AND  cod_attachment =  '$tournamenthasattachment->codattachment'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.tournament_has_attachment';
        return $this->executeUpdate($sql);
    }


                                
                 
                
        
	
    /**
     * Read row
     *
     * @return TournamentHasAttachment 
     */
    protected function readRow($row) {
        $tournamenthasattachment = new TournamentHasAttachment();
        $tournamenthasattachment->codtournament = $row['cod_tournament'];
        $tournamenthasattachment->codattachment = $row['cod_attachment'];
        return $tournamenthasattachment;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.tournament_has_attachment";
         return $this->getList($sql, true);
    }
    
}

?>