<?php 
 /**
 * Clase que opera sobre la tabla 'tournament'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2013-12-16 16:56
 */
class TournamentMySqlDAO extends ModelDAO implements TournamentDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Tournament
     */
    public function load($codtournament){
        
$this->set($codtournament);
        $sql = "SELECT * FROM db_toquela.tournament WHERE  cod_tournament =  '$codtournament'";
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
        $sql = "SELECT * FROM db_toquela.tournament $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.tournament ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param tournament primary key
     */
    public function delete($codtournament){
            
$this->set($codtournament);
            $sql = "DELETE FROM db_toquela.tournament WHERE  cod_tournament =  '$codtournament'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Tournament tournament
     */
    public function insert($tournament){
            $this->set($tournament->name);
$this->set($tournament->type);
$this->set($tournament->description);
$this->set($tournament->numberparticipants);
$this->set($tournament->poster);
$this->set($tournament->start);
$this->set($tournament->end);
$this->set($tournament->contacts);
$this->set($tournament->rules);
$this->set($tournament->inscriptions);
$this->set($tournament->places);
$this->set($tournament->date);
$this->set($tournament->coduser);
$this->set($tournament->status);
            
            $sql = "INSERT INTO db_toquela.tournament ( name , type , description , number_participants , poster , start , end , contacts , rules , inscriptions , places , date , cod_user , status ) 
                    VALUES ('$tournament->name','$tournament->type','$tournament->description','$tournament->numberparticipants','$tournament->poster','$tournament->start','$tournament->end','$tournament->contacts','$tournament->rules','$tournament->inscriptions','$tournament->places','$tournament->date','$tournament->coduser','$tournament->status')";
            $id = $this->executeInsert($sql);	
            /*$tournament-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Tournament tournament
     */
    public function update($tournament){
        $this->set($tournament->name);
$this->set($tournament->type);
$this->set($tournament->description);
$this->set($tournament->numberparticipants);
$this->set($tournament->poster);
$this->set($tournament->start);
$this->set($tournament->end);
$this->set($tournament->contacts);
$this->set($tournament->rules);
$this->set($tournament->inscriptions);
$this->set($tournament->places);
$this->set($tournament->date);
$this->set($tournament->coduser);
$this->set($tournament->status);
        
        $sql = "UPDATE db_toquela.tournament  SET 
		 name = if( strcmp('$tournament->name'  , '' ) = 1  , '$tournament->name', name ),
		 type = if( strcmp('$tournament->type'  , '' ) = 1  , '$tournament->type', type ),
		 description = if( strcmp('$tournament->description'  , '' ) = 1  , '$tournament->description', description ),
		 number_participants = if( strcmp('$tournament->numberparticipants'  , '' ) = 1  , '$tournament->numberparticipants', number_participants ),
		 poster = if( strcmp('$tournament->poster'  , '' ) = 1  , '$tournament->poster', poster ),
		 start = if( strcmp('$tournament->start'  , '' ) = 1  , '$tournament->start', start ),
		 end = if( strcmp('$tournament->end'  , '' ) = 1  , '$tournament->end', end ),
		 contacts = if( strcmp('$tournament->contacts'  , '' ) = 1  , '$tournament->contacts', contacts ),
		 rules = if( strcmp('$tournament->rules'  , '' ) = 1  , '$tournament->rules', rules ),
		 inscriptions = if( strcmp('$tournament->inscriptions'  , '' ) = 1  , '$tournament->inscriptions', inscriptions ),
		 places = if( strcmp('$tournament->places'  , '' ) = 1  , '$tournament->places', places ),
		 date = if( strcmp('$tournament->date'  , '' ) = 1  , '$tournament->date', date ),
		 cod_user = if( strcmp('$tournament->coduser'  , '' ) = 1  , '$tournament->coduser', cod_user ),
		 status = if( strcmp('$tournament->status'  , '' ) = 1  , '$tournament->status', status ) WHERE  cod_tournament =  '$tournament->codtournament'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.tournament';
        return $this->executeUpdate($sql);
    }


                        public function queryByName($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE name  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE type  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE description  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByNumberParticipants($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE number_participants  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPoster($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE poster  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByStart($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE start  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByEnd($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE end  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByContacts($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE contacts  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByRules($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE rules  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByInscriptions($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE inscriptions  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPlaces($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE places  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE cod_user  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByStatus($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.tournament WHERE status  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByName($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE name  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE type  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE description  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByNumberParticipants($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE number_participants  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPoster($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE poster  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByStart($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE start  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByEnd($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE end  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByContacts($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE contacts  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByRules($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE rules  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByInscriptions($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE inscriptions  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPlaces($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE places  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE date  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE cod_user  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByStatus($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.tournament WHERE status  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Tournament 
     */
    protected function readRow($row) {
        $tournament = new Tournament();
        $tournament->codtournament = $row['cod_tournament'];
        $tournament->name = $row['name'];
        $tournament->type = $row['type'];
        $tournament->description = $row['description'];
        $tournament->numberparticipants = $row['number_participants'];
        $tournament->poster = $row['poster'];
        $tournament->start = $row['start'];
        $tournament->end = $row['end'];
        $tournament->contacts = $row['contacts'];
        $tournament->rules = $row['rules'];
        $tournament->inscriptions = $row['inscriptions'];
        $tournament->places = $row['places'];
        $tournament->date = $row['date'];
        $tournament->coduser = $row['cod_user'];
        $tournament->status = $row['status'];
        return $tournament;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.tournament";
         return $this->getList($sql, true);
    }
    
}

?>