DROP VIEW IF EXISTS `vw_type_statistic_user`;

CREATE VIEW `vw_type_statistic_user` AS (
	SELECT
		`ts`.`cod_type_statistic` AS `cod_type_statistic`,
		`ts`.`name` AS `name`,
		`ts`.`icon` AS `icon`,
		`s`.`minute` AS `minute`,
		`u`.`cod_user` AS `cod_user`,
		`u`.`name` AS `username`,
		`u`.`last_name` AS `last_name`,
		`s`.`cod_match` AS `cod_match`,
		m.cod_tournament
	FROM ((`statistics` `s` JOIN `type_statistic` `ts` ON ((`s`.`cod_type_statistic` = `ts`.`cod_type_statistic`)))
			JOIN `users` `u` ON ((`s`.`cod_user` = `u`.`cod_user`))
			JOIN `match` m USING (cod_match)));

-- ----------------------------
-- View structure for vw_type_statistic_user
-- ----------------------------
DROP VIEW IF EXISTS `vw_type_statistic_user`;
CREATE  VIEW `vw_type_statistic_user` AS (select `ts`.`cod_type_statistic` AS `cod_type_statistic`,`ts`.`name` AS `name`,`ts`.`icon` AS `icon`,`s`.`minute` AS `minute`,`u`.`cod_user` AS `cod_user`,`u`.`name` AS `username`,`u`.`last_name` AS `last_name`,`s`.`cod_match` AS `cod_match` from ((`statistics` `s` join `type_statistic` `ts` on((`s`.`cod_type_statistic` = `ts`.`cod_type_statistic`))) join `users` `u` on((`s`.`cod_user` = `u`.`cod_user`)))) ;
