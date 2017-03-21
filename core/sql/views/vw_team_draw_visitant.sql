CREATE VIEW vw_team_draw_visitant AS (
SELECT 
  COUNT(cod_match) 'lost',  
  team_visitant 'cod_team'
  
FROM
  `match` 
WHERE (
    score_local IS NOT NULL 
    AND score_visitant IS NOT NULL
  ) AND score_visitant = score_local 
  GROUP BY team_visitant);

-- ----------------------------
-- View structure for vw_team_draw_visitant
-- ----------------------------
DROP VIEW IF EXISTS `vw_team_draw_visitant`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vw_team_draw_visitant` AS (select count(`match`.`cod_match`) AS `lost`,`match`.`team_visitant` AS `cod_team` from `match` where ((`match`.`score_local` is not null) and (`match`.`score_visitant` is not null) and (`match`.`score_visitant` = `match`.`score_local`)) group by `match`.`team_visitant`) ;