-- ----------------------------
-- View structure for vw_type_statistic_teams
-- ----------------------------
DROP VIEW IF EXISTS `vw_type_statistic_teams`;
CREATE VIEW `vw_type_statistic_teams` AS (
	SELECT
		`ts`.`cod_type_statistic` AS `cod_type_statistic`,
		`ts`.`name` AS `name`,
		`ts`.`icon` AS `icon`,
		`m`.`team_local` AS `team_local`,
		`m`.`team_visitant` AS `team_visitant`,
		`m`.`cod_tournament` AS `cod_tournament`,
		`m`.`cod_match` AS `cod_match`
	FROM
		(
			(
				`match` `m`
				JOIN `statistics` ON (
					(
						`m`.`cod_match` = `statistics`.`cod_match`
					)
				)
			)
			JOIN `type_statistic` `ts` ON (
				(
					`statistics`.`cod_type_statistic` = `ts`.`cod_type_statistic`
				)
			)
		)
);