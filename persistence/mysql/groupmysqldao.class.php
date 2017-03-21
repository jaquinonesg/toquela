<?php 
 /**
 * Clase que opera sobre la tabla 'group'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class GroupMySqlDAO extends ModelDAO implements GroupDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Group
     */
    public function load($codtournament,$codteam){
        
$this->set($codtournament);
$this->set($codteam);
        $sql = "SELECT * FROM db_toquela.group WHERE  cod_tournament =  '$codtournament' AND  cod_team =  '$codteam'";
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
        $sql = "SELECT * FROM db_toquela.group $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.group ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param group primary key
     */
    public function delete($codtournament,$codteam){
            
$this->set($codtournament);
$this->set($codteam);
            $sql = "DELETE FROM db_toquela.group WHERE  cod_tournament =  '$codtournament' AND  cod_team =  '$codteam'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Group group
     */
    public function insert($group){
            $this->set($group->number);
            
            $sql = "INSERT INTO db_toquela.group ( cod_tournament , cod_team , number ) 
                    VALUES ('$group->codtournament','$group->codteam','$group->number')";
            $id = $this->executeInsert($sql);	
            /*$group-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Group group
     */
    public function update($group){
        $this->set($group->number);
        
        $sql = "UPDATE db_toquela.group  SET 
		 number = if( strcmp('$group->number'  , '' ) = 1  , '$group->number', number ) WHERE  cod_tournament =  '$group->codtournament' AND  cod_team =  '$group->codteam'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.group';
        return $this->executeUpdate($sql);
    }


                                    public function queryByNumber($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.group WHERE number  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
                
            public function deleteByNumber($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.group WHERE number  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Group 
     */
    protected function readRow($row) {
        $group = new Group();
        $group->codtournament = $row['cod_tournament'];
        $group->codteam = $row['cod_team'];
        $group->number = $row['number'];
        return $group;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.group";
         return $this->getList($sql, true);
    }
    
}

?>