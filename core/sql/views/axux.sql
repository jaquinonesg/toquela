(
 COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),  0)
    +
 COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`) ,0)
) AS GC,
(
 COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`), 0)
    +
 COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),0)
) AS GF,
(
 COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),0)
    +
 COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),0)
 -
 (
 COALESCE((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`), 0)
    +
 COALESCE((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament`),0)
)
) AS DIF,