DROP PROCEDURE IF EXISTS `sp_set_message_temp_match_slop`;
DELIMITER $$
CREATE PROCEDURE `sp_set_message_temp_match_slop`()
BEGIN
    DECLARE listcods text DEFAULT "";
    DECLARE done INT DEFAULT 0; 
    DECLARE _codaux BIGINT DEFAULT 0;
    DECLARE _date_next DATE DEFAULT DATE(DATE_ADD(CURDATE(),INTERVAL 1 DAY));
    DECLARE matches_next CURSOR FOR SELECT DISTINCT
                m.cod_match
        FROM
                `match` AS m,
                user_has_team AS uht
        INNER JOIN users AS u ON uht.cod_user = u.cod_user
        WHERE
                 m.date = _date_next
        AND (
                uht.cod_team = m.team_local
                OR uht.cod_team = m.team_visitant
        )
        AND (
                uht.`status` = 'CAPTAIN'
                OR uht.`status` = 'PLAYER'
        ); 
        DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1 ;
        OPEN matches_next ; 
                WHILE done = 0 DO
                        IF _codaux != 0 THEN
                                CALL sp_set_message_match_temp(_codaux);
                        END IF;
                        FETCH matches_next INTO _codaux;

                END WHILE;
        CLOSE matches_next;
END
$$
DELIMITER ;