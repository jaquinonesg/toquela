<?php 
 /**
 * Class that operate on table 'noticias'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-09 12:45
 */
 class NoticiasMySqlExtDAO extends NoticiasMySqlDAO{
        
    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.noticias LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.noticias ";        
        return $this->getValue($sql);
    } 

    
    public function setNewNoticia($cod_usuario, $titulo, $resumen, $contenido, $cod_torneo, $type, $loc_img){
        $sql = "INSERT INTO db_toquela.noticias (message,type,date,cod_tournament, cod_user,resumen,titulo,loc_img) 
                VALUES ( '$contenido', '$type', NOW(), $cod_torneo , $cod_usuario , '$resumen','$titulo','$loc_img')";
        $id = $this->executeInsert($sql);
        return $id;
    }
    public function getByCodUser($id){
        $sql = "SELECT * FROM db_toquela.noticias WHERE cod_user = $id ORDER BY date";
        return $this->getList($sql);
    }
    public function getbyTournament($id, $cod_user = null){
        if(!is_null($cod_user))/**ordena por la prioridad Home para el webmaster*/
            $sql = "SELECT * FROM db_toquela.noticias WHERE cod_tournament = $id AND cod_user = $cod_user ORDER BY prioridad_home DESC,date DESC";
        else/**ordena por la prioridad Torneo para el administrador */
            $sql = "SELECT * FROM db_toquela.noticias WHERE cod_tournament = $id ORDER BY prioridad_torneo DESC,date DESC";
        return $this->getList($sql);
    }
    public function getPublics(){
        $sql = "SELECT * FROM db_toquela.noticias WHERE type = 'public' ORDER BY prioridad_home DESC,date DESC";
        return $this->getList($sql);
    }
    public function getCountAllPublics() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.noticias AS u WHERE type = 'public' ";
        return $this->getValue($sql);
    }
    public function getCountAllTournament($cod_tournament) {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.noticias AS u WHERE cod_tournament = $cod_tournament";
        return $this->getValue($sql);
    }
    public function getbyId($id){
        $sql = " SELECT * FROM db_toquela.noticias WHERE cod_news = $id ;";
        return $this->getRow($sql);
    }
    public function borrarNoticia($id){
        $sql = "DELETE FROM db_toquela.noticias WHERE cod_news = $id";
        return $this->executeUpdate($sql);
    }
    public function priorizarHome($id){
        $sql = "UPDATE db_toquela.noticias SET prioridad_home='1' WHERE cod_news=$id ";
        return $this->executeUpdate($sql);
    }
    public function despriorizarHome($id){
        $sql = "UPDATE db_toquela.noticias SET prioridad_home='0' WHERE cod_news=$id ";
        return $this->executeUpdate($sql);
    }
    public function priorizarTorneo($id){
        $sql = "UPDATE db_toquela.noticias SET prioridad_torneo='1' WHERE cod_news=$id ";
        return $this->executeUpdate($sql);
    }
    public function despriorizarTorneo($id){
        $sql = "UPDATE db_toquela.noticias SET prioridad_torneo='0' WHERE cod_news=$id ";
        return $this->executeUpdate($sql);
    }
    public function publicar($id){
        $sql = "UPDATE db_toquela.noticias SET type='public' WHERE cod_news=$id ";
        return $this->executeUpdate($sql);
    }
    public function noPublicar($id){
        $sql = "UPDATE db_toquela.noticias SET type='private' WHERE cod_news=$id ";
        return $this->executeUpdate($sql);
    }
}

?>