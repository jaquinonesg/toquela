DROP PROCEDURE IF EXISTS `sp_set_message_match_temp`;
DELIMITER $$
CREATE PROCEDURE `sp_set_message_match_temp`(IN incodmatch BIGINT)
BEGIN
	DECLARE listemail text DEFAULT "";
	DECLARE _body_msg text DEFAULT "<p>Sin mensaje</p>";
	DECLARE _date DATE DEFAULT NULL;
	DECLARE _hour TIME DEFAULT NULL;
	DECLARE femail VARCHAR (255) DEFAULT "";
	DECLARE codaux INT DEFAULT 0;
	DECLARE _subject VARCHAR (255) DEFAULT "";
	DECLARE done INT DEFAULT 0; 
	
	DECLARE
            emails_match CURSOR FOR SELECT DISTINCT
                u.cod_user,
                u.email
            FROM
                `match` AS m,
                user_has_team AS uht
            INNER JOIN users AS u ON uht.cod_user = u.cod_user
            WHERE
                m.cod_match = incodmatch
            AND (
                uht.cod_team = m.team_local
                OR uht.cod_team = m.team_visitant
            )
            AND (
                uht.`status` = 'CAPTAIN'
                OR uht.`status` = 'PLAYER'
            );

        DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

SELECT 
  CONCAT(
		"<h1>PARTIDO: ", (tl.`name`), " VS ", (tv.`name`),
    "</h1><p>Fecha: " ,COALESCE(mo.date , "No disponible"),
    "</p><p>Hora: " , COALESCE(mo.`hour` , "No disponible") ,
    "</p><p>Descripción del lugar: " , COALESCE(mo.description_place, "No disponible"),
    "</p><p>Localización: " , COALESCE(c.`name`, "No disponible"),
    "</p><p>Equipo local: " , (tl.`name`) ,
    "</p><p>Equipo visitante: " , (tv.`name`), "</p>"
  ) 'bodymsg',
	CONCAT("Tóquela - partido: ", tl.`name`," VS ", tv.`name`),
	mo.`date`,  
	mo.`hour` 
	INTO 
	_body_msg, 
	_subject, 
	_date, 
	_hour 
  FROM db_toquela.`match` AS mo 
  JOIN db_toquela.team  tl ON tl.`cod_team` = mo.`team_local`
  JOIN db_toquela.team  tv ON tv.`cod_team` = mo.`team_visitant`  
  LEFT JOIN complex c USING(cod_complex)
  WHERE mo.cod_match = incodmatch;

        OPEN emails_match; 
            WHILE done = 0 DO
                IF femail != "" AND codaux != 0 THEN
                    SET listemail = CONCAT(listemail, femail, ';');
                    INSERT INTO `db_toquela`.`notification` (`text`, `subject`, `link`, `codtypenotifications`, `cod_user`) VALUES (_body_msg, _subject, '', '1', codaux);
                END IF;
                FETCH emails_match INTO codaux, femail;
            END WHILE;
        CLOSE emails_match;

    /*INSERT INTO `db_toquela`.`mailtemp` (`tomails`, `subject`, `text`, `date`, `prioritydate`, `priorityhour`) VALUES (listemail, _subject, _body_msg, NULL, _date, _hour);*/

    END
$$ DELIMITER;