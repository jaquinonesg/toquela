DROP TRIGGER IF EXISTS `tr_temp_msg_calendar`;
DELIMITER $$
CREATE TRIGGER `tr_temp_msg_calendar` AFTER UPDATE ON `match` FOR EACH ROW BEGIN 
        IF ((NEW.date != COALESCE(OLD.date,"")) || (NEW.cod_complex != COALESCE(OLD.cod_complex,"")) || (NEW.`hour` != COALESCE(OLD.`hour`,"")) || (NEW.description_place != COALESCE(OLD.description_place,""))) THEN
					CALL db_toquela.sp_set_message_match_temp(NEW.cod_match);
				END IF;
    END
$$ DELIMITER ;