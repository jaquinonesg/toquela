

/**
query para mostra cantidad de partidos 
tanto por visitante como por local jugaods  
de cada equipo por un jugador en especifico
**/

SELECT 
    t.name,
    uht.cod_team,
    COALESCE(lo.cantidad,0) localmatch,
    COALESCE(vi.cantidad,0) visitantmatch,
    (COALESCE(lo.cantidad,0) + COALESCE(vi.cantidad,0)) totalmatch
  FROM
    user_has_team uht 
    JOIN team t USING (cod_team) 
    left JOIN (SELECT COUNT(cod_match) cantidad , team_local 'cod_team' FROM `match` WHERE  (score_local IS NOT NULL AND score_visitant IS NOT NULL)  GROUP BY `team_local`) lo USING(cod_team)
    left JOIN (SELECT COUNT(cod_match) cantidad , team_visitant 'cod_team' FROM `match` WHERE  (score_local IS NOT NULL AND score_visitant IS NOT NULL) GROUP BY `team_visitant`) vi USING(cod_team)
  WHERE cod_user = '2'


/**
Query par ver los equipos de un usuario en especifico 
lo cuales ha ganado por local o visitante y total , 
ha perdido por local o visitante y total , 
ha empatado por local o visitante y total , 
**/

  SELECT 
    t.name,
    uht.cod_team,
    COALESCE(lo.win,0) localwin,
    COALESCE(vi.win,0) visitantwin,
    (COALESCE(lo.win,0) + COALESCE(vi.win,0)) totalwin,
    
    COALESCE(lol.lost,0) locallost,
    COALESCE(vil.lost,0) visitantlost,
    (COALESCE(lol.lost,0) + COALESCE(vil.lost,0)) totallost,
    
    COALESCE(lod.lost,0) localdraw,
    COALESCE(vid.lost,0) visitantdraw,
    (COALESCE(lod.lost,0) + COALESCE(vid.lost,0)) totaldraw,

    ( COALESCE(lo.win,0) + COALESCE(vi.win,0) + COALESCE(lol.lost,0) + COALESCE(vil.lost,0) + COALESCE(lod.lost,0) + COALESCE(vid.lost,0) ) totalmatchs    user_has_team uht 
    JOIN team t USING (cod_team) 
    left JOIN vw_team_win_local lo USING(cod_team)
    left JOIN vw_team_win_visitant vi USING(cod_team)    
    left join vw_team_lost_local lol using (cod_team)
    left JOIN vw_team_lost_visitant vil using (cod_team)    
    LEFT JOIN vw_team_draw_local lod USING (cod_team)
    LEFT JOIN vw_team_draw_visitant vid USING (cod_team)    
  WHERE cod_user = '2'



/**

query para saber de un usuario específico 
que ha jugado en direrentes equipos los 
partidos que ha ganado, perdido o empatado 
*/

SELECT 
  SUM( COALESCE(lo.win, 0) + COALESCE(vi.win, 0) ) totalwin,
  SUM( COALESCE(lol.lost, 0) + COALESCE(vil.lost, 0) ) totallost,
  SUM( COALESCE(lod.lost, 0) + COALESCE(vid.lost, 0) ) totaldraw,
  SUM( COALESCE(lo.win, 0) + COALESCE(vi.win, 0) +  COALESCE(lol.lost, 0) + COALESCE(vil.lost, 0) + COALESCE(lod.lost, 0) + COALESCE(vid.lost, 0)) totalplayed
FROM
  user_has_team uht 
  JOIN team t USING (cod_team) 
  LEFT JOIN vw_team_win_local lo USING (cod_team) 
  LEFT JOIN vw_team_win_visitant vi USING (cod_team) 
  LEFT JOIN vw_team_lost_local lol USING (cod_team) 
  LEFT JOIN vw_team_lost_visitant vil USING (cod_team) 
  LEFT JOIN vw_team_draw_local lod USING (cod_team) 
  LEFT JOIN vw_team_draw_visitant vid USING (cod_team) 
WHERE cod_user = '2' 


/**
query para saber la cantidad de 
partidos en diferentes equipos 
jugados de local y visitante 
de un usuario en especifico 
**/

SELECT     
    SUM(COALESCE(lo.cantidad,0)) localmatch,
    SUM(COALESCE(vi.cantidad,0)) visitantmatch,
    SUM(COALESCE(lo.cantidad,0) + COALESCE(vi.cantidad,0)) totalmatch
  FROM
    user_has_team uht 
    JOIN team t USING (cod_team) 
    LEFT JOIN (SELECT COUNT(cod_match) cantidad , team_local 'cod_team' FROM `match` WHERE  (score_local IS NOT NULL AND score_visitant IS NOT NULL)  GROUP BY `team_local`) lo USING(cod_team)
    LEFT JOIN (SELECT COUNT(cod_match) cantidad , team_visitant 'cod_team' FROM `match` WHERE  (score_local IS NOT NULL AND score_visitant IS NOT NULL) GROUP BY `team_visitant`) vi USING(cod_team)
  WHERE cod_user = '2'





