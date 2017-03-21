<?php

/**
 * Class that operate on table 'statistics'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2013-07-17 11:18
 */
class StatisticsMySqlExtDAO extends StatisticsMySqlDAO {

    public function getByPage($page, $limit = 10) {
        $this->set($page);
        $this->set($limit);
        $page = abs((int) $page);
        if (!preg_match('!^\d+$!', $limit)) {
            throw new ErrorException('limit deberia ser un entero');
            return false;
        }
        $limit = abs($limit);

        $sql = "SELECT * FROM db_toquela.statistics LIMIT $page , $limit";
        return $this->getList($sql);
    }

    public function getCountAll() {
        $sql = "SELECT COUNT(*) as total FROM db_toquela.statistics ";
        return $this->getValue($sql);
    }

    public function insertAddModify($statistics) {
        $this->set($statistics->minute);
        $this->set($statistics->date);
        $this->set($statistics->islocal);
        $this->set($statistics->description);
        $this->set($statistics->codtypestatistic);
        $this->set($statistics->coduser);
        $this->set($statistics->codmatch);
        $sql = "INSERT INTO db_toquela.statistics ( minute , date , is_local , description , cod_type_statistic , cod_user , cod_match ) 
                    VALUES ('$statistics->minute',$statistics->date,'$statistics->islocal','$statistics->description','$statistics->codtypestatistic','$statistics->coduser','$statistics->codmatch')";
        return $this->executeInsert($sql);
    }

    public function updateModify($statistics) {
        $this->set($statistics->minute);
        $this->set($statistics->date);
        $this->set($statistics->islocal);
        $this->set($statistics->description);
        $this->set($statistics->codtypestatistic);
        $this->set($statistics->coduser);
        $this->set($statistics->codmatch);

        $sql = "UPDATE db_toquela.statistics  SET 
		 statistics.minute = if( strcmp('$statistics->minute'  , '' ) = 1  , '$statistics->minute', statistics.minute),
		 statistics.date = $statistics->date,
		 is_local = if( strcmp('$statistics->islocal'  , '' ) = 1  , '$statistics->islocal', is_local ),
		 description = if( strcmp('$statistics->description'  , '' ) = 1  , '$statistics->description', description ),
		 cod_type_statistic = if( strcmp('$statistics->codtypestatistic'  , '' ) = 1  , '$statistics->codtypestatistic', cod_type_statistic ),
		 cod_user = if( strcmp('$statistics->coduser'  , '' ) = 1  , '$statistics->coduser', cod_user ),
		 cod_match = if( strcmp('$statistics->codmatch'  , '' ) = 1  , '$statistics->codmatch', cod_match ) WHERE  cod_statistics =  '$statistics->codstatistics'";
        return $this->executeUpdate($sql);
    }

    public function getByCodMatchLocal($cod_match) {
        $this->set($cod_match);
        $sql = "SELECT * FROM db_toquela.statistics WHERE cod_match  = '$cod_match' AND is_local='1';";
        return $this->getList($sql, true);
    }

    public function getByCodStatisticLocal($cod_statistics) {
        $this->set($cod_statistics);
        $sql = "SELECT * FROM db_toquela.statistics WHERE cod_statistics = '$cod_statistics' AND is_local='1';";
        return $this->getList($sql, true);
    }

    public function getByCodStatisticVisitant($cod_statistics) {
        $this->set($cod_statistics);
        $sql = "SELECT * FROM db_toquela.statistics WHERE cod_statistics = '$cod_statistics' AND is_local='0';";
        return $this->getList($sql, true);
    }

    public function getByCodMatchVisitant($cod_match) {
        $this->set($cod_match);
        $sql = "SELECT * FROM db_toquela.statistics WHERE cod_match  = '$cod_match' AND is_local='0';";
        return $this->getList($sql, true);
    }

    public function getGoalsLocalByMatch($cod_match) {
        $sql = "SELECT COUNT(s.`cod_statistics`) AS goals FROM `statistics` AS s WHERE s.`cod_match`='$cod_match' AND s.`is_local`='1' AND s.`cod_type_statistic`='1';";
        $result = $this->getRow($sql, true);
        return (int) $result['goals'];
    }

    public function getGoalsVisitantByMatch($cod_match) {
        $sql = "SELECT COUNT(s.`cod_statistics`) AS goals FROM `statistics` AS s WHERE s.`cod_match`='$cod_match' AND s.`is_local`='0' AND s.`cod_type_statistic`='1';";
        $result = $this->getRow($sql, true);
        return (int) $result['goals'];
    }
    
    /*
     * Vista: vw_type_statistic_user
     * 
     * CREATE VIEW vw_type_statistic_user AS (SELECT 
      ts.cod_type_statistic,
      ts.name,
      s.minute,
      u.cod_user,
      u.name,
      u.last_name,
      s.cod_match
      FROM
      statistics s
      JOIN type_statistic ts USING (cod_type_statistic)
      JOIN users u USING (cod_user)
      );
     */

    /**
     * Este query necesita una vista 
     * par poder funcionar la cual esta en las líneas de arriba
     */
    
    public function getGoalsAndRedYellowCardsByUser($cod_user) {
        $sql = "SELECT 
	cod_user,
	name,
                IF( ISNULL(goles.cantidad),0,goles.cantidad) goal,
                IF( ISNULL(amarillas.cantidad),0,amarillas.cantidad) yellow,
                IF( ISNULL(rojas.cantidad),0,rojas.cantidad) red
        FROM
                users 
                LEFT JOIN (SELECT COUNT(*) cantidad , cod_user, icon FROM vw_type_statistic_user WHERE cod_type_statistic = 1 GROUP BY cod_user) goles USING(cod_user)
                LEFT JOIN (SELECT COUNT(*) cantidad , cod_user, icon FROM vw_type_statistic_user WHERE cod_type_statistic = 5 GROUP BY cod_user) amarillas USING(cod_user)
                LEFT JOIN (SELECT COUNT(*) cantidad , cod_user, icon FROM vw_type_statistic_user WHERE cod_type_statistic = 6 GROUP BY cod_user) rojas USING(cod_user)
        WHERE cod_user = '$cod_user';";
        return $this->getRow($sql, true);
    }

    /**
     * Retorno todas las estadisticas de un usuario 
     * 
     * @param int $cod_user
     * @return Array(Statistics)
     */
    public function getAllStatisticsByUser($cod_user) {
        $sql = "SELECT 
                    ts.name,
                    ts.cod_type_statistic,
                    ts.`icon`,
                    IF(
                      ISNULL(v.cod_type_statistic),
                      0,
                      COUNT(ts.cod_type_statistic)
                    ) 'count'
                  FROM
                    type_statistic ts 
                    LEFT JOIN 
                      (SELECT 
                        * 
                      FROM
                        vw_type_statistic_user 
                      WHERE cod_user = '$cod_user') v USING (cod_type_statistic) 
                  GROUP BY cod_type_statistic;";
        return $this->getList($sql, true);
    }

    public function getPlayedMatches($coduser) {
        $sql = "SELECT 
                    SUM(COALESCE(lo.win, 0) + COALESCE(vi.win, 0)) totalwin,
                    SUM(COALESCE(lol.lost, 0) + COALESCE(vil.lost, 0)) totallost,
                    SUM(COALESCE(lod.lost, 0) + COALESCE(vid.lost, 0)) totaldraw,
                    sum(COALESCE(lo.win, 0) + COALESCE(vi.win, 0) + COALESCE(lol.lost, 0) + COALESCE(vil.lost, 0) + COALESCE(lod.lost, 0) + COALESCE(vid.lost, 0)) totalplayed
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
                    cod_user = '$coduser'";
        return $this->getRow($sql, true);
    }

}

?>
