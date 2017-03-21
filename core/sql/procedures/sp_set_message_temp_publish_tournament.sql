DROP PROCEDURE IF EXISTS `sp_set_message_temp_publish_tournament`;
DELIMITER $$
CREATE PROCEDURE `sp_set_message_temp_publish_tournament`(IN codtorneo INT, IN publicdate DATE, IN publichour TIME)
BEGIN
	DECLARE listemail text DEFAULT "";
	DECLARE _body_msg text DEFAULT "<p>Sin mensaje</p>";
	DECLARE femail VARCHAR (255) DEFAULT "";
        DECLARE codaux INT DEFAULT 0;
	DECLARE _subject VARCHAR (255) DEFAULT "";
        DECLARE _link VARCHAR (255) DEFAULT "";
	DECLARE done INT DEFAULT 0; 
	
	DECLARE emails CURSOR FOR SELECT DISTINCT
            u.cod_user,
            u.email
        FROM
            tournament_has_team AS tht
        INNER JOIN user_has_team AS uht ON tht.cod_team = uht.cod_team
        INNER JOIN users AS u ON uht.cod_user = u.cod_user
        WHERE
            tht.cod_tournament = codtorneo
        AND (
            uht.`status` = 'CAPTAIN'
            OR uht.`status` = 'PLAYER'
        ); 

        DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1 ;

SELECT
	CONCAT(
		"<p>Se realizo una publicación nueva para el torneo el ",
		t.`name`,
		" en la fecha ",
		publicdate,
		" a las ",
		publichour,
		', para verla presione AQUÍ</p>'
	) 'bodymsg',
	CONCAT(
		"Tóquela - publicación torneo ",
		t.`name`
	) 'subjectmsg',
        CONCAT('/torneos/tablero/publico_temp/',t.cod_tournament) 'link'
    INTO _body_msg, _subject, _link 
FROM
	db_toquela.tournament AS t
WHERE
	t.cod_tournament = codtorneo;

        OPEN emails ; 
                WHILE done = 0 DO
                        IF femail != "" AND codaux != 0 THEN
                                SET listemail = CONCAT(listemail, femail, ';');
                                INSERT INTO `db_toquela`.`notification` (`text`, `subject`, `link`, `codtypenotifications`, `cod_user`) VALUES (_body_msg, _subject, _link, '3', codaux);
                        END IF;
                        FETCH emails INTO codaux, femail;
                END WHILE;
        CLOSE emails ;


        /*NSERT INTO `db_toquela`.`mailtemp` (`tomails`, `subject`, `text`, `date`) VALUES (listemail, _subject, _body_msg, NULL);*/
        
        END
$$
DELIMITER ;