CREATE VIEW vw_team_lost_local AS (SELECT 
  COUNT(cod_match) 'lost',  
  team_local 'cod_team'
FROM
  `match` 
WHERE (
    score_local IS NOT NULL 
    AND score_visitant IS NOT NULL
  ) AND  score_local < score_visitant
  GROUP BY team_local );

-- ----------------------------
-- View structure for vw_team_lost_local
-- ----------------------------
DROP VIEW IF EXISTS `vw_team_lost_local`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `vw_team_lost_local` AS (select count(`match`.`cod_match`) AS `lost`,`match`.`team_local` AS `cod_team` from `match` where ((`match`.`score_local` is not null) and (`match`.`score_visitant` is not null) and (`match`.`score_local` < `match`.`score_visitant`)) group by `match`.`team_local`) ;
