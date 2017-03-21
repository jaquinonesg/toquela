<?php

/**
 * Class that operate on table 'team'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class TeamMySqlExtDAO extends TeamMySqlDAO {

    public function autocompleteTeam($term) {
        $sql = "SELECT distinct c.`cod_team` AS 'value', c.`name` AS 'label' FROM team c WHERE c.`name` LIKE '%$term%' LIMIT 10;";
        $result = $this->getList($sql, true);
        return !is_null($result) ? $result : array();
    }

    public function getInfoTeam($codteam) {
        $sql = "SELECT t.*, a.path,
        (IF (t.`type` = 'MALE',
            'Masculino',
            IF (t.`type` = 'FEMALE',
                'Femenino',
                IF (t.`type` = 'MIXED',
                    'Mixto',
                    NULL)))) 'tipo',
(SELECT 
    v.`name` 
    FROM
    db_toquela.`virtues` AS v 
    JOIN db_toquela.`team_has_virtues` thv 
    USING(cod_virtues)
    WHERE thv.cod_team = t.`cod_team` 
    AND v.cod_virtues_group = 1 
    LIMIT 1) 'futboltype'
FROM
team AS t
LEFT JOIN team_has_attachment AS h ON t.cod_team = h.cod_team
LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment
WHERE t.cod_team = '$codteam';";
return $this->getRow($sql, true);
}

public function getNumOfTeams() {
    $sql = "SELECT COUNT(c.cod_team) AS num FROM team AS c;";
    $result = $this->getRow($sql, true);
    return $result->num;
}

public function getGames($cod_team) {
    $sql = "SELECT v.* FROM db_toquela.team_has_virtues h, db_toquela.virtues v WHERE v.cod_virtues = h.cod_virtues AND h.cod_team = '$cod_team';";
    return $this->getList($sql, true);
}

public function getUnitGame($cod_team) {
    $sql = "SELECT v.* FROM db_toquela.team_has_virtues h, db_toquela.virtues v WHERE v.cod_virtues = h.cod_virtues AND h.cod_team = '$cod_team' LIMIT 1;";
    return $this->getRow($sql, true);
}

public function getTorneosPartidosPorEquipo($cod_team) {
    $sql = "SELECT 
    t.`cod_tournament`,
    t.`name`,
    m.* 
    FROM
    db_toquela.`tournament` AS t 
    INNER JOIN db_toquela.`match` AS m 
    ON t.`cod_tournament` = m.`cod_tournament` 
    WHERE m.`estate` = '3' 
    AND (
      m.`team_local` = '$cod_team' 
      OR m.`team_visitant` = '$cod_team'
      );";
return $this->getList($sql, true);
}

public function getAllStatisticsByTeam($cod_team) {
    $sql = "SELECT
    ts.`name`,
    ts.cod_type_statistic,
    ts.`icon`,

    IF (
        ISNULL(v.cod_type_statistic),
        0,
        COUNT(ts.cod_type_statistic)
        ) 'count'
FROM
type_statistic ts
LEFT JOIN (
    SELECT
                                *
    FROM
    vw_type_statistic_teams
    WHERE
    team_local = '$cod_team' OR team_visitant ='$cod_team'
    ) v USING (cod_type_statistic)
GROUP BY
cod_type_statistic;";
return $this->getList($sql, true);
}

public function getInfoMatchesTeam($cod_team) {
    $sql = "SELECT 
    (COALESCE(lo.win, 0) + COALESCE(vi.win, 0)) totalwin,
    (COALESCE(lol.lost, 0) + COALESCE(vil.lost, 0)) totallost,
    (COALESCE(lod.lost, 0) + COALESCE(vid.lost, 0)) totaldraw,
    (COALESCE(lo.win, 0) + COALESCE(vi.win, 0) + COALESCE(lol.lost, 0) + COALESCE(vil.lost, 0) + COALESCE(lod.lost, 0) + COALESCE(vid.lost, 0)) totalplayed
    FROM
    user_has_team uht
    JOIN team t USING (cod_team)
    LEFT JOIN vw_team_win_local lo USING (cod_team)
    LEFT JOIN vw_team_win_visitant vi USING (cod_team)
    LEFT JOIN vw_team_lost_local lol USING (cod_team)
    LEFT JOIN vw_team_lost_visitant vil USING (cod_team)
    LEFT JOIN vw_team_draw_local lod USING (cod_team)
    LEFT JOIN vw_team_draw_visitant vid USING (cod_team)
    WHERE
    cod_team = '$cod_team' LIMIT 1;";
    return $this->getRow($sql, true);
}

public function getTournamentsByTeamPlayed($cod_team) {
    $sql = "SELECT
    DISTINCT t.cod_tournament,
    t.`name`
    FROM
    user_has_team AS ut,
    `match` AS m
    INNER JOIN tournament AS t ON m.cod_tournament = t.cod_tournament
    WHERE
    ut.cod_team = '$cod_team' AND m.estate = '3'
    AND (
        ut.cod_team = m.team_local
        OR ut.cod_team = m.team_visitant
        );";
return $this->getList($sql, true);
}

public function autocompleteTeamAndTournament($term, $codtournament) {
    $sql = "SELECT
    c.`cod_team` AS 'value',
    c.`name` AS 'label'
    FROM
    tournament_has_team AS tht
    INNER JOIN team AS c USING (cod_team)
    WHERE
    tht.cod_tournament = '$codtournament'
    AND c.`name` LIKE '%$term%'
    LIMIT 10;";
    $result = $this->getList($sql, true);
    return !is_null($result) ? $result : array();
}

public function getMessagesTeam($cod_team) {
//           $sql = "SELECT 
//                        *
//                    FROM
//                        message
//                            JOIN
//                        team USING (cod_team)
//                            LEFT JOIN
//                        user_has_team USING (cod_team)
//                            JOIN
//                        users USING (cod_user)
//                    GROUP BY cod_message
//                    ORDER BY (message.`date`) DESC;";

    $sql = "SELECT 
    message.`date`,
    message.`cod_message`,
    message.`subject`,
    message.`text`,
    message.`from`,
    users.`name`,
    users.`last_name`,
    users.`cod_user`,
    team.`cod_team`
    FROM
    message
    JOIN
    team USING (cod_team)
    LEFT JOIN
    user_has_team USING (cod_team)
    LEFT JOIN
    users USING (cod_user)
    WHERE
    message.`from` = users.`cod_user`
    AND cod_team = '$cod_team'
    GROUP BY message.`cod_message`
    ORDER BY (message.`date`) DESC;";
    return $this->getList($sql, true);
}

    //valido que el usuario que este logueado 
    //pertenezca al equipo y asi pude enviar mensajes y eliminar
public function validateUserHasTeam($cod_team, $cod_user) {
    $sql = "SELECT 
    COUNT(*) 'num'
    FROM
    `db_toquela`.`user_has_team` AS uht
    WHERE
    uht.`cod_team` = '$cod_team'
    AND uht.`cod_user` = '$cod_user';";
    return $this->getRow($sql, true);
}

public function loadTeam($codTeam) {
    $sql = "SELECT * FROM `db_toquela`.`team` cod_team = $codTeam;";
    return $this->getList($sql);
}

public function getNumOfMatchPublics() {
    $sql = "SELECT COUNT(c.cod_games) AS num FROM games AS c WHERE type = '2';";
    $result = $this->getRow($sql, true);
    return $result->num;
}

public function getIfMyTeam($cod_user, $cod_team) {
    $sql = "SELECT name FROM `db_toquela`.`team` AS t 
    INNER JOIN db_toquela.`user_has_team` AS uth ON t.cod_team = uth.cod_team
    WHERE uth.cod_user = '$cod_user' AND t.cod_team = '$cod_team' AND uth.`status` != '" . UserHasTeam::STATUS_POSTULANT . "';";
    return $this->getList($sql, true);
}

public function getPlayersByTeam($cod_team) {
    if (is_numeric($cod_team)) {
        $sql = "SELECT 
        u.cod_user,
        u.`name`,
        u.last_name,
        uht.`status`
        FROM user_has_team AS uht LEFT JOIN users AS u ON uht.cod_user = u.cod_user
        WHERE uht.cod_team = '$cod_team';";
        return $this->getList($sql, true);
    }
    return null;
}

public function getImageTeam($codteam){
    $sql = "SELECT
    t. NAME,
    t.`cod_team`,
    (
        SELECT
        a.`path`
        FROM
        db_toquela.`team_has_attachment` AS att
        JOIN db_toquela.`attachment` AS a USING (cod_attachment)
        WHERE
        att.`cod_team` = t.`cod_team`
        AND a.`type` = 'image'
        LIMIT 1
        ) 'image'
FROM
db_toquela.`team` AS t 
WHERE t.`cod_team` = '$codteam';";
return $this->getRow($sql, true);
}

public function getTeamInfo($codteam){
    $sql = "SELECT t.*, a.path,
    (IF (t.`type` = 'MALE',
        'Masculino',
        IF (t.`type` = 'FEMALE',
            'Femenino',
            IF (t.`type` = 'MIXED',
                'Mixto',
                NULL)))) 'tipo',
(SELECT 
    v.`name` 
    FROM
    db_toquela.`virtues` AS v 
    JOIN db_toquela.`team_has_virtues` thv 
    USING(cod_virtues)
    WHERE thv.cod_team = t.`cod_team` 
    AND v.cod_virtues_group = 1 
    LIMIT 1) 'futboltype'
FROM
team AS t
LEFT JOIN team_has_attachment AS h ON t.cod_team = h.cod_team
LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment
WHERE t.cod_team = '$codteam' AND h.`status` = '1';";
return $this->getRow($sql, true);
}

public function insertWithValNull($team) {
    $this->set($team->name);
    $this->set($team->type);
    $this->set($team->codlocality);
    $this->set($team->description);
    $sql = "INSERT INTO db_toquela.team ( name , type , cod_locality , description ) 
    VALUES ('$team->name','$team->type','$team->codlocality','$team->description')";
    $id = $this->executeInsert($sql);
    /* $team-> = $id; */
    return $id;
}

public function getByName($value) {
        $this->set($value);
        $sql = "SELECT name FROM db_toquela.team WHERE cod_team  = '$value'";
        return $this->getRow($sql, true);
    }

}
