<?php 
 /**
 * Clase que opera sobre la tabla 'noticias'. Database Mysql.
 *
 * @author: Hernán Cortés <heralfstb@gmail.com>
 * @date: 2015-07-23 14:13
 */
class NoticiasMySqlDAO extends ModelDAO implements NoticiasDAO{

    /**
     * Obtiene el registro por medio de las llaves primarias
     *
     * @return Noticias
     */
    public function load($codnews){
        
$this->set($codnews);
        $sql = "SELECT * FROM db_toquela.noticias WHERE  cod_news =  '$codnews'";
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
        $sql = "SELECT * FROM db_toquela.noticias $extra";
        return $this->getList($sql);
    }
	
    /**
     * Obtiene los registros de la tabla ordenados por un campo en espcifico
     *
     * @param $orderColumn column name
     */
    public function queryAllOrderBy($orderColumn){
        $sql = "SELECT * FROM db_toquela.noticias ORDER BY $orderColumn";
        return $this->getList($sql);
    }
	
    /**
     * Borra un registro de la tabla segun las llaves primarias
     * @param noticias primary key
     */
    public function delete($codnews){
            
$this->set($codnews);
            $sql = "DELETE FROM db_toquela.noticias WHERE  cod_news =  '$codnews'";
            return $this->executeUpdate($sql);
    }
	
    /**
     * Insert record to table
     *
     * @param Noticias noticias
     */
    public function insert($noticias){
            $this->set($noticias->message);
$this->set($noticias->type);
$this->set($noticias->date);
$this->set($noticias->codtournament);
$this->set($noticias->coduser);
$this->set($noticias->resumen);
$this->set($noticias->locimg);
$this->set($noticias->titulo);
$this->set($noticias->prioridadtorneo);
$this->set($noticias->prioridadhome);
            
            $sql = "INSERT INTO db_toquela.noticias ( message , type , date , cod_tournament , cod_user , resumen , loc_img , titulo , prioridad_torneo , prioridad_home ) 
                    VALUES ('$noticias->message','$noticias->type','$noticias->date','$noticias->codtournament','$noticias->coduser','$noticias->resumen','$noticias->locimg','$noticias->titulo','$noticias->prioridadtorneo','$noticias->prioridadhome')";
            $id = $this->executeInsert($sql);	
            /*$noticias-> = $id;*/
            return $id;
    }
	
    /**
     * Update record in table
     *
     * @param Noticias noticias
     */
    public function update($noticias){
        $this->set($noticias->message);
$this->set($noticias->type);
$this->set($noticias->date);
$this->set($noticias->codtournament);
$this->set($noticias->coduser);
$this->set($noticias->resumen);
$this->set($noticias->locimg);
$this->set($noticias->titulo);
$this->set($noticias->prioridadtorneo);
$this->set($noticias->prioridadhome);
        
        $sql = "UPDATE db_toquela.noticias  SET 
		 message = if( strcmp('$noticias->message'  , '' ) = 1  , '$noticias->message', message ),
		 type = if( strcmp('$noticias->type'  , '' ) = 1  , '$noticias->type', type ),
		 date = if( strcmp('$noticias->date'  , '' ) = 1  , '$noticias->date', date ),
		 cod_tournament = if( strcmp('$noticias->codtournament'  , '' ) = 1  , '$noticias->codtournament', cod_tournament ),
		 cod_user = if( strcmp('$noticias->coduser'  , '' ) = 1  , '$noticias->coduser', cod_user ),
		 resumen = if( strcmp('$noticias->resumen'  , '' ) = 1  , '$noticias->resumen', resumen ),
		 loc_img = if( strcmp('$noticias->locimg'  , '' ) = 1  , '$noticias->locimg', loc_img ),
		 titulo = if( strcmp('$noticias->titulo'  , '' ) = 1  , '$noticias->titulo', titulo ),
		 prioridad_torneo = if( strcmp('$noticias->prioridadtorneo'  , '' ) = 1  , '$noticias->prioridadtorneo', prioridad_torneo ),
		 prioridad_home = if( strcmp('$noticias->prioridadhome'  , '' ) = 1  , '$noticias->prioridadhome', prioridad_home ) WHERE  cod_news =  '$noticias->codnews'";
        return $this->executeUpdate($sql);
    }

    /**
     * Delete all rows
     */
    public function clean(){
        $sql = 'DELETE FROM db_toquela.noticias';
        return $this->executeUpdate($sql);
    }


                        public function queryByMessage($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE message  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByType($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE type  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByDate($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE date  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodTournament($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE cod_tournament  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByCodUser($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE cod_user  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByResumen($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE resumen  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByLocImg($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE loc_img  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByTitulo($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE titulo  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPrioridadTorneo($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE prioridad_torneo  = '$value'";
        return $this->getList($sql);    
    }
    
                    public function queryByPrioridadHome($value) {
        $this->set($value);
        $sql = "SELECT * FROM db_toquela.noticias WHERE prioridad_home  = '$value'";
        return $this->getList($sql);    
    }
    
                
                 
            public function deleteByMessage($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE message  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByType($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE type  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByDate($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE date  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodTournament($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE cod_tournament  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByCodUser($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE cod_user  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByResumen($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE resumen  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByLocImg($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE loc_img  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByTitulo($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE titulo  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPrioridadTorneo($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE prioridad_torneo  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
            public function deleteByPrioridadHome($value) {
        $this->set($value);
        $sql = "DELETE FROM db_toquela.noticias WHERE prioridad_home  = '$value'";
        return $this->executeUpdate($sql);
        }
        
            
        
	
    /**
     * Read row
     *
     * @return Noticias 
     */
    protected function readRow($row) {
        $noticias = new Noticias();
        $noticias->codnews = $row['cod_news'];
        $noticias->message = $row['message'];
        $noticias->type = $row['type'];
        $noticias->date = $row['date'];
        $noticias->codtournament = $row['cod_tournament'];
        $noticias->coduser = $row['cod_user'];
        $noticias->resumen = $row['resumen'];
        $noticias->locimg = $row['loc_img'];
        $noticias->titulo = $row['titulo'];
        $noticias->prioridadtorneo = $row['prioridad_torneo'];
        $noticias->prioridadhome = $row['prioridad_home'];
        return $noticias;
    }    
    
    
    public function describe(){
         $sql = "DESC db_toquela.noticias";
         return $this->getList($sql, true);
    }
    
}

?>