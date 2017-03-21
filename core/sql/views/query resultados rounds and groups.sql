SELECT
'1' AS ro,
'1' AS gr,
t.`cod_team`,
t.`name`,
(SELECT COUNT(*) FROM `match` m WHERE (m.team_local = t.cod_team OR m.team_visitant = t.cod_team) AND !ISNULL(m.score_local) AND !ISNULL(m.score_visitant) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) AS J,
(SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) AS G,
(SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) AS E,
(SELECT COUNT(*) FROM `match` m WHERE ((m.score_local < m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant < m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) AS P,
(
 IF (!ISNULL((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)), (SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr), 0)
    +
 IF (!ISNULL((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)), (SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr),0)
) AS GC,
(
 IF (!ISNULL((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)), (SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr), 0)
    +
 IF (!ISNULL((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)), (SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr),0)
) AS GF,
(

 (IF (!ISNULL((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)), (SELECT SUM(m.score_local) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr), 0)
    +
 IF (!ISNULL((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)), (SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr),0))
 -
 (
 IF (!ISNULL((SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)), (SELECT SUM(m.score_visitant) FROM `match` m WHERE m.team_local = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr), 0)
    +
 IF (!ISNULL((SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)), (SELECT SUM(m.score_local) FROM `match` m WHERE m.team_visitant = t.`cod_team` AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr),0)
)
) AS DIF,
(
   ((SELECT COUNT(*) FROM `match` m WHERE ((m.score_local > m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant > m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr) * 3)
   +
   (SELECT COUNT(*) FROM `match` m WHERE ((m.score_local = m.score_visitant AND m.team_local = t.`cod_team`) OR (m.score_visitant = m.score_local AND m.team_visitant = t.`cod_team`)) AND m.cod_tournament = h.`cod_tournament` AND m.round=ro AND m.`group`=gr)
) AS Puntos
FROM
tournament_has_team AS h,
team t
WHERE h.`cod_team` = t.`cod_team` 
AND h.`cod_tournament` = '47' AND h.round = '1' ORDER BY Puntos DESC, DIF DESC, GF DESC, GC DESC;