<?php

/**
 * Class that operate on table 'team_has_attachment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class TeamHasAttachmentMySqlExtDAO extends TeamHasAttachmentMySqlDAO {

    public function getAttachments($cod_team) {
        $sql = "SELECT a.*,h.`status` FROM db_toquela.attachment a, db_toquela.team_has_attachment h WHERE a.cod_attachment = h.cod_attachment AND h.cod_team = '$cod_team';";
        return $this->getList($sql, true);
    }

    public function getFirtsAttachment($cod_team) {
        $sql = "SELECT a.path FROM db_toquela.attachment a, db_toquela.team_has_attachment h WHERE a.cod_attachment = h.cod_attachment AND h.cod_team = '$cod_team' LIMIT 1;";
        return $this->getRow($sql, true);
    }

    public function getPhotoPerfilByUser($cod_user) {
        $sql = "SELECT a.`path` FROM db_toquela.`user_has_attachment` AS uha INNER JOIN db_toquela.`attachment` AS a ON uha.`cod_attachment` = a.`cod_attachment` 
        WHERE uha.`cod_user` = '$cod_user' AND uha.`type`='PERFIL' LIMIT 1;";
        return $this->getRow($sql, true);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM team_has_attachment ";
        return $this->getValue($sql);
    }
    public function getPathAttachment($cod_team) {
        $sql = "SELECT a.path FROM db_toquela.attachment a, db_toquela.team_has_attachment h WHERE a.cod_attachment = h.cod_attachment AND h.cod_team = '$cod_team';";
        return $this->getList($sql, true);
    }

}

?>
