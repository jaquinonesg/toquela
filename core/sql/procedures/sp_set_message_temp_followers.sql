DROP PROCEDURE IF EXISTS `sp_set_message_temp_followers`;
DELIMITER $$
CREATE PROCEDURE `sp_set_message_temp_followers`(IN codfrom INT, IN codto INT)
BEGIN
	DECLARE listemail text DEFAULT "";
	DECLARE _body_msg text DEFAULT "<p>Sin mensaje</p>";
	DECLARE _subject VARCHAR (255) DEFAULT "Tóquela";
        DECLARE _link VARCHAR (255) DEFAULT "";
SELECT
	u2.email,
	CONCAT(
		"<h1>!Nuevo amigo¡</h1><p>Ahora ",
		u1.`name`,
		" ",
		u1.last_name,
		' es amigo en Tóquela, para conocer este amigo presione AQUÍ.</p>'
	) 'bodymsg', 
	CONCAT(
		"Ahora ",
		u1.`name`,
		" ",
		u1.last_name,
		" es amigo en Tóquela"
	) 'subjectmsg',
        CONCAT('/perfil/',u1.cod_user ,'-', u1.email) 'link'
	INTO listemail, _body_msg, _subject, _link
FROM
	users AS u1, users AS u2
WHERE
	u1.cod_user = codfrom AND u2.cod_user = codto;
	SET listemail = CONCAT(listemail,";");

        /*INSERT INTO `db_toquela`.`mailtemp` (`tomails`, `subject`, `text`, `date`) VALUES (listemail, _subject, _body_msg, NULL);*/
        INSERT INTO `db_toquela`.`notification` (`text`, `subject`, `link`, `codtypenotifications`, `cod_user`) VALUES (_body_msg, _subject, _link, '2', codto);
    END
$$
DELIMITER ;