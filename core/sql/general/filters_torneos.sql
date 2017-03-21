/*-------------------------FECHA UNICA-------------------------*/
SELECT 
	DISTINCT m.*,
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_local`) 'local',
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_visitant`) 'visitant',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_local` LIMIT 1) 'imglocal',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_visitant` LIMIT 1) 'imgvisitant',
	(SELECT c.`name` FROM complex AS c WHERE c.cod_complex = m.cod_complex) 'namecomplex'
FROM
	`match` AS m 
WHERE m.cod_tournament = '61' AND m.date = '2014-07-10';
/*------------------------RANGO FECHAS----------------------*/
SELECT 
	DISTINCT m.*,
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_local`) 'local',
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_visitant`) 'visitant',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_local` LIMIT 1) 'imglocal',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_visitant` LIMIT 1) 'imgvisitant',
	(SELECT c.`name` FROM complex AS c WHERE c.cod_complex = m.cod_complex) 'namecomplex'
FROM
	`match` AS m 
WHERE m.cod_tournament = '61' AND (m.date BETWEEN '2014-07-10' AND '2014-07-17');
/*-----------------------COMPLEJO Y LUGARES----------------------------*/
SELECT 
	DISTINCT m.*,
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_local`) 'local',
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_visitant`) 'visitant',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_local` LIMIT 1) 'imglocal',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_visitant` LIMIT 1) 'imgvisitant',
	(SELECT c.`name` FROM complex AS c WHERE c.cod_complex = m.cod_complex) 'namecomplex'
FROM
	`match` AS m 
	LEFT JOIN complex AS co ON m.cod_complex = co.cod_complex
WHERE m.cod_tournament = '61' AND (co.`name` LIKE '%alqueria%') OR (m.description_place LIKE '%alqueria%');
/*-----------------------------EQUIPOS----------------------------*/
SELECT 
	DISTINCT m.*,
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_local`) 'local',
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_visitant`) 'visitant',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_local` LIMIT 1) 'imglocal',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_visitant` LIMIT 1) 'imgvisitant',
	(SELECT c.`name` FROM complex AS c WHERE c.cod_complex = m.cod_complex) 'namecomplex'
FROM
	`match` AS m 
	LEFT JOIN team AS te ON (m.team_local = te.cod_team) OR (m.team_visitant = te.cod_team)
WHERE m.cod_tournament = '61' AND te.`name` LIKE '%Real Madrid Bogota%';
/*------------------------------USUARIOS-----------------------------*/
SELECT 
	DISTINCT m.*,
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_local`) 'local',
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_visitant`) 'visitant',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_local` LIMIT 1) 'imglocal',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_visitant` LIMIT 1) 'imgvisitant',
	(SELECT c.`name` FROM complex AS c WHERE c.cod_complex = m.cod_complex) 'namecomplex'
FROM
	`match` AS m 
	LEFT JOIN team AS te ON (m.team_local = te.cod_team) OR (m.team_visitant = te.cod_team)
	LEFT JOIN user_has_team AS uht ON te.cod_team = uht.cod_team
	LEFT JOIN users AS u ON uht.cod_user = u.cod_user
WHERE m.cod_tournament = '61' AND (CONCAT(u.`name`,' ',u.last_name) LIKE '%jorge luis%');
/*------------------------------ARBITROS-----------------------------*/
SELECT 
	DISTINCT m.*,
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_local`) 'local',
	(SELECT t.`name` FROM db_toquela.team AS t WHERE t.`cod_team` = m.`team_visitant`) 'visitant',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_local` LIMIT 1) 'imglocal',
	(SELECT a.path FROM team_has_attachment AS h LEFT JOIN attachment AS a ON h.cod_attachment = a.cod_attachment WHERE h.cod_team = m.`team_visitant` LIMIT 1) 'imgvisitant',
	(SELECT c.`name` FROM complex AS c WHERE c.cod_complex = m.cod_complex) 'namecomplex'
FROM
	db_toquela.`match` AS m 
WHERE m.cod_tournament = '61' AND (m.arbitros LIKE '%nuevo arbitro%');

/* ----------------------------Goleadores por fase------------------------------------------

SELECT 
  u.`name`,
  u.`cod_user`,
  ts.`name`,
  te.`name`,
  u.`cod_user` 
FROM
  statistics s,
  type_statistic ts,
  `match` m,
  users u,
  tournament t,
  team te 
WHERE u.cod_user = s.cod_user 
  AND s.cod_type_statistic = 1 
  AND m.cod_match = s.cod_match 
  AND m.`cod_tournament` = 61 
  AND m.`group` = 1 
GROUP BY s.`cod_statistics` 

  SELECT 
    u.`name`,
    u.`cod_user`,
    ts.`name`,
    u.`cod_user`
  FROM
    type_statistic ts,
    users u 
    LEFT JOIN `statistics` s 
      ON u.`cod_user` = s.`cod_user` 
    LEFT JOIN `match` m 
      ON m.`cod_match` = s.`cod_match` 
  WHERE s.`cod_type_statistic` = 1 
    AND m.`cod_tournament` = 61 AND ts.`cod_type_statistic`=1 
    AND m.`group` = 1 
 */