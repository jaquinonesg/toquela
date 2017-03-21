<?php

/**
 * Class that operate on table 'carnet'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2014-01-22 16:53
 */
class CarnetMySqlExtDAO extends CarnetMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.carnet LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.carnet ";
        return $this->getValue($sql);
    }

    public function getDataCarnetForPreview($cod_user) {
        $sql = "SELECT
                a.*, 
                u.email,
                u.phone,
                u.cellular,
                u.`name`,
                u.last_name,
                u.sex,
                (
                        SELECT
                                att.path
                        FROM
                                attachment AS att
                        INNER JOIN user_has_attachment AS uha ON att.cod_attachment = uha.cod_attachment
                        WHERE
                                uha.cod_user = u.cod_user
                        AND uha.type = '" . UserHasAttachment::TYPE_PERFIL . "'
                        ORDER BY
                                att.cod_attachment DESC
                        LIMIT 1
                ) AS 'path',
                (
                        SELECT
                                t.`name`
                        FROM
                                team AS t
                        WHERE
                                t.cod_team = a.teamcarnet
                ) AS 'teamname'
        FROM
                db_toquela.users AS u
        LEFT JOIN db_toquela.aditional AS a USING (cod_user)
        WHERE u.cod_user = '$cod_user';";
        return $this->getRow($sql, true);
    }

    public function getDataCarnetForTornamentTeam($codteam, $codtournament) {
        $sql = "SELECT DISTINCT
                    uht.cod_user,
                    a.*, u.email,
                    u.phone,
                    u.cellular,
                    u.`name`,
                    u.last_name,
                    u.sex,
                    (
                            SELECT
                                    att.path
                            FROM
                                    attachment AS att
                            INNER JOIN user_has_attachment AS uha ON att.cod_attachment = uha.cod_attachment
                            WHERE
                                    uha.cod_user = uht.cod_user
                            AND uha.type = '" . UserHasAttachment::TYPE_PERFIL . "'
                            ORDER BY
                                    att.cod_attachment DESC
                            LIMIT 1
                    ) AS 'path',
                    (
                            SELECT
                                    t.`name`
                            FROM
                                    team AS t
                            WHERE
                                    t.cod_team = a.teamcarnet
                    ) AS 'teamname'
            FROM
                    tournament_has_team AS tht
            INNER JOIN user_has_team AS uht ON tht.cod_team = uht.cod_team
            LEFT JOIN users AS u ON uht.cod_user = u.cod_user
            LEFT JOIN aditional AS a ON u.cod_user = a.cod_user
            WHERE
                    tht.cod_tournament = '$codtournament'
                    AND tht.cod_team = '$codteam'
            AND (
                    uht.`status` = 'CAPTAIN'
                    OR uht.`status` = 'PLAYER'
            ) AND uht.cod_user != '1';";
        return $this->getList($sql, true);
    }
    
    public function getDataCarnetForTornament($codtournament) {
        $sql = "SELECT DISTINCT
                    uht.cod_user,
                    a.*, u.email,
                    u.phone,
                    u.cellular,
                    u.`name`,
                    u.last_name,
                    u.sex,
                    (
                            SELECT
                                    att.path
                            FROM
                                    attachment AS att
                            INNER JOIN user_has_attachment AS uha ON att.cod_attachment = uha.cod_attachment
                            WHERE
                                    uha.cod_user = uht.cod_user
                            AND uha.type = '" . UserHasAttachment::TYPE_PERFIL . "'
                            ORDER BY
                                    att.cod_attachment DESC
                            LIMIT 1
                    ) AS 'path',
                    (
                            SELECT
                                    t.`name`
                            FROM
                                    team AS t
                            WHERE
                                    t.cod_team = a.teamcarnet
                    ) AS 'teamname'
            FROM
                    tournament_has_team AS tht
            INNER JOIN user_has_team AS uht ON tht.cod_team = uht.cod_team
            LEFT JOIN users AS u ON uht.cod_user = u.cod_user
            LEFT JOIN aditional AS a ON u.cod_user = a.cod_user
            WHERE
                    tht.cod_tournament = '$codtournament'
            AND (
                    uht.`status` = 'CAPTAIN'
                    OR uht.`status` = 'PLAYER'
            ) AND uht.cod_user != '1';";
        return $this->getList($sql, true);
    }

}

?>