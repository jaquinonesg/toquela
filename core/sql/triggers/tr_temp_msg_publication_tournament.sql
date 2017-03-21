DROP TRIGGER IF EXISTS `tr_temp_msg_publication_tournament`;
DELIMITER $$
CREATE TRIGGER `tr_temp_msg_publication_tournament` AFTER INSERT ON `news` FOR EACH ROW BEGIN 
			CALL db_toquela.sp_set_message_temp_publish_tournament(NEW.cod_tournament, DATE(NEW.date), TIME(NEW.date));
    END
$$
DELIMITER ;