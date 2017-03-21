<?php 
 /**
 * Clase que opera sobre la tabla 'match'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2015-05-22 16:41
 */
class MatchMySqlDAO extends ModelDAO implements MatchDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Match
     */
    public function load($codmatch){
        
$this->set($codmatch);
        $sql = "SELECT * FROM db_toquela.match WHERE  cod_match =  '$codmatch'";
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
        $sql = "SELECT * FROM db_toquela.match $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.match ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param match primary key
     */
    public function delete($codmatch){
            
$this->set($codmatch);
            $sql = "DELETE FROM db_toquela.match WHERE  cod_match =  '$codmatch'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Match match
     */
    public function insert($match){
            $this->set($match->date);
$this->set($match->hour);
$this->set($match->round);
$this->set($match->group);
$this->set($match->type);
$this->set($match->codcomplex);
$this->set($match->teamlocal);
$this->set($match->scorelocal);
$this->set($match->teamvisitant);
$this->set($match->scorevisitant);
$this->set($match->codtournament);
$this->set($match->description);
$this->set($match->descriptionplace);
$this->set($match->numjornada);
$this->set($match->estate);
$this->set($match->arbitros);
$this->set($match->statescorevisitant);
$this->set($match->statescorelocal);
$this->set($match->golesfavorlocal);
$this->set($match->golescontralocal);
$this->set($match->golesfavorvisitant);
$this->set($match->golescontravisitant);
            
            $sql = "INSERT INTO db_toquela.match ( date , hour , round , group , type , cod_complex , team_local , score_local , team_visitant , score_visitant , cod_tournament , description , description_place , numjornada , estate , arbitros , state_score_visitant , state_score_local , goles_favor_local , goles_contra_local , goles_favor_visitant , goles_contra_visitant ) 
                    VALUES ('$match->date','$match->hour','$match->round','$match->group','$match->type','$match->codcomplex','$match->teamlocal','$match->scorelocal','$match->teamvisitant','$match->scorevisitant','$match->codtournament','$match->description','$match->descriptionplace','$match->numjornada','$match->estate','$match->arbitros','$match->statescorevisitant','$match->statescorelocal','$match->golesfavorlocal','$match->golescontralocal','$match->golesfavorvisitant','$match->golescontravisitant')";
            $id = $this->executeInsert($sql);	
            /*$match-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Match match
     */
    public function update($match){
        $this->set($match->date);
$this->set($match->hour);
$this->set($match->round);
$this->set($match->group);
$this->set($match->type);
$this->set($match->codcomplex);
$this->set($match->teamlocal);
$this->set($match->scorelocal);
$this->set($match->teamvisitant);
$this->set($match->scorevisitant);
$this->set($match->codtournament);
$this->set($match->description);
$this->set($match->descriptionplace);
$this->set($match->numjornada);
$this->set($match->estate);
$this->set($match->arbitros);
$this->set($match->statescorevisitant);
$this->set($match->statescorelocal);
$this->set($match->golesfavorlocal);
$this->set($match->golescontralocal);
$this->set($match->golesfavorvisitant);
$this->set($match->golescontravisitant);
        
        $sql = "UPDATE db_toquela.match  SET 
		 date = if( strcmp('$match->date'  , '' ) = 1  , '$match->date', date ),
		 hour = if( strcmp('$match->hour'  , '' ) = 1  , '$match->hour', hour ),
		 round = if( strcmp('$match->round'  , '' ) = 1  , '$match->round', round ),
		 group = if( strcmp('$match->group'  , '' ) = 1  , '$match->group', group ),
		 type = if( strcmp('$match->type'  , '' ) = 1  , '$match->type', type ),
		 cod_complex = if( strcmp('$match->codcomplex'  , '' ) = 1  , '$match->codcomplex', cod_complex ),
		 team_local = if( strcmp('$match->teamlocal'  , '' ) = 1  , '$match->teamlocal', team_local ),
		 score_local = if( strcmp('$match->scorelocal'  , '' ) = 1  , '$match->scorelocal', score_local ),
		 team_visitant = if( strcmp('$match->teamvisitant'  , '' ) = 1  , '$match->teamvisitant', team_visitant ),
		 score_visitant = if( strcmp('$match->scorevisitant'  , '' ) = 1  , '$match->scorevisitant', score_visitant ),
		 cod_tournament = if( strcmp('$match->codtournament'  , '' ) = 1  , '$match->codtournament', cod_tournament ),
		 description = if( strcmp('$match->description'  , '' ) = 1  , '$match->description', description ),
		 description_place = if( strcmp('$match->descriptionplace'  , '' ) = 1  , '$match->descriptionplace', description_place ),
		 numjornada = if( strcmp('$match->numjornada'  , '' ) = 1  , '$match->numjornada', numjornada ),
		 estate = if( strcmp('$match->estate'  , '' ) = 1  , '$match->estate', estate ),
		 arbitros = if( strcmp('$match->arbitros'  , '' ) = 1  , '$match->arbitros', arbitros ),
		 state_score_visitant = if( strcmp('$match->statescorevisitant'  , '' ) = 1  , '$match->statescorevisitant', state_score_visitant ),
		 state_score_local = if( strcmp('$match->statescorelocal'  , '' ) = 1  , '$match->statescorelocal', state_score_local ),
		 goles_favor_local = if( strcmp('$match->golesfavorlocal'  , '' ) = 1  , '$match->golesfavorlocal', goles_favor_local ),
		 goles_contra_local = if( strcmp('$match->golescontralocal'  , '' ) = 1  , '$match->golescontralocal', goles_contra_local ),
		 goles_favor_visitant = if( strcmp('$match->golesfavorvisitant'  , '' ) = 1  , '$match->golesfavorvisitant', goles_favor_visitant ),
		 goles_contra_visitant = if( strcmp('$match->golescontravisitant'  , '' ) = 1  , '$match->golescontravisitant', goles_contra_visitant ) WHERE  cod_match =  '$match->codmatch'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.match';
        return $this->executeUpdate($sql);
    }


                        public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByHour($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE hour  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByRound($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE round  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByGroup($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE group  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE type  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodComplex($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE cod_complex  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByTeamLocal($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE team_local  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByScoreLocal($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE score_local  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByTeamVisitant($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE team_visitant  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByScoreVisitant($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE score_visitant  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodTournament($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE cod_tournament  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescription($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE description  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDescriptionPlace($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE description_place  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByNumjornada($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE numjornada  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByEstate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE estate  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByArbitros($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE arbitros  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByStateScoreVisitant($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE state_score_visitant  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByStateScoreLocal($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE state_score_local  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByGolesFavorLocal($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE goles_favor_local  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByGolesContraLocal($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE goles_contra_local  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByGolesFavorVisitant($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE goles_favor_visitant  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByGolesContraVisitant($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.match WHERE goles_contra_visitant  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE date  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByHour($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE hour  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByRound($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE round  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByGroup($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE group  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE type  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodComplex($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE cod_complex  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByTeamLocal($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE team_local  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByScoreLocal($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE score_local  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByTeamVisitant($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE team_visitant  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByScoreVisitant($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE score_visitant  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodTournament($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE cod_tournament  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescription($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE description  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDescriptionPlace($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE description_place  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByNumjornada($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE numjornada  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByEstate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE estate  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByArbitros($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE arbitros  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByStateScoreVisitant($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE state_score_visitant  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByStateScoreLocal($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE state_score_local  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByGolesFavorLocal($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE goles_favor_local  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByGolesContraLocal($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE goles_contra_local  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByGolesFavorVisitant($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE goles_favor_visitant  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByGolesContraVisitant($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.match WHERE goles_contra_visitant  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Match 
     */
    protected function readRow($row) {
        $match = new Match();
        $match->codmatch = $row['cod_match'];
        $match->date = $row['date'];
        $match->hour = $row['hour'];
        $match->round = $row['round'];
        $match->group = $row['group'];
        $match->type = $row['type'];
        $match->codcomplex = $row['cod_complex'];
        $match->teamlocal = $row['team_local'];
        $match->scorelocal = $row['score_local'];
        $match->teamvisitant = $row['team_visitant'];
        $match->scorevisitant = $row['score_visitant'];
        $match->codtournament = $row['cod_tournament'];
        $match->description = $row['description'];
        $match->descriptionplace = $row['description_place'];
        $match->numjornada = $row['numjornada'];
        $match->estate = $row['estate'];
        $match->arbitros = $row['arbitros'];
        $match->statescorevisitant = $row['state_score_visitant'];
        $match->statescorelocal = $row['state_score_local'];
        $match->golesfavorlocal = $row['goles_favor_local'];
        $match->golescontralocal = $row['goles_contra_local'];
        $match->golesfavorvisitant = $row['goles_favor_visitant'];
        $match->golescontravisitant = $row['goles_contra_visitant'];
        return $match;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.match";
         return $this->getList($sql, true);
    }
    
}

?>