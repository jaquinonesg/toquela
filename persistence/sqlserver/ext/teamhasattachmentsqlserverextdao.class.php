<?php

/**
 * Class that operate on table 'team_has_attachment'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class TeamHasAttachmentSqlServerExtDAO extends TeamHasAttachmentSqlServerDAO {

    public function getAttachments($cod_team) {
        $sql = "SELECT a.* FROM db_toquela.attachment a, db_toquela.team_has_attachment h WHERE a.cod_attachment = h.cod_attachment AND h.cod_team = '$cod_team';";
        return $this->getList($sql, true);
    }

}
