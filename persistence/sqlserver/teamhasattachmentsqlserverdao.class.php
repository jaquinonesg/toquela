<?php 
 /**
 * Clase que opera sobre la tabla 'team_has_attachment'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-08-23 12:10
 */
class TeamHasAttachmentSqlServerDAO extends ModelDAO implements TeamHasAttachmentDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return TeamHasAttachment
     */
    public function load($codattachment,$codteam){
        
$this->set($codattachment);
$this->set($codteam);
        $sql = "SELECT * FROM db_toquela.team_has_attachment WHERE  cod_attachment =  '$codattachment' AND  cod_team =  '$codteam'";
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
        $sql = "SELECT * FROM db_toquela.team_has_attachment $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.team_has_attachment ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param teamhasattachment primary key
     */
    public function delete($codattachment,$codteam){
            
$this->set($codattachment);
$this->set($codteam);
            $sql = "DELETE FROM db_toquela.team_has_attachment WHERE  cod_attachment =  '$codattachment' AND  cod_team =  '$codteam'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param TeamHasAttachment teamhasattachment
     */
    public function insert($teamhasattachment){
            ;
            
            $sql = "INSERT INTO db_toquela.team_has_attachment ( cod_attachment , cod_team ) 
                    VALUES ('$teamhasattachment->codattachment','$teamhasattachment->codteam')";
            $id = $this->executeInsert($sql);	
            /*$teamhasattachment-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param TeamHasAttachment teamhasattachment
     */
    public function update($teamhasattachment){
        ;
        
        $sql = "UPDATE db_toquela.team_has_attachment  SET  WHERE  cod_attachment =  '$teamhasattachment->codattachment' AND  cod_team =  '$teamhasattachment->codteam'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.team_has_attachment';
        return $this->executeUpdate($sql);
    }


                                
                 
                
        
	
    /**
     * Read row
     *
     * @return TeamHasAttachment 
     */
    protected function readRow($row) {
        $teamhasattachment = new TeamHasAttachment();
        $teamhasattachment->codattachment = $row['cod_attachment'];
        $teamhasattachment->codteam = $row['cod_team'];
        return $teamhasattachment;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.team_has_attachment";
         return $this->getList($sql, true);
    }
    
}
  
?>
