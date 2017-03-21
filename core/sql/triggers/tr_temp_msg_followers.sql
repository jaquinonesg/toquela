DROP TRIGGER IF EXISTS `tr_temp_msg_followers`;
DELIMITER $$
CREATE TRIGGER `tr_temp_msg_followers` AFTER INSERT ON `followers` FOR EACH ROW BEGIN 
			CALL db_toquela.sp_set_message_temp_followers(NEW.`from`, NEW.`to`);
    END
$$ DELIMITER ;