SELECT 
    t.cod_team,
    t.name,
    SUM(COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0) + COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) J,
    SUM(COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) G,
    SUM(COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) E,
    SUM(COALESCE(Ll.P, 0) + COALESCE(Vl.P, 0)) P,
    SUM(COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0)) GC,
    SUM(COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0)) GF,
    SUM(-(COALESCE(Lw.GC, 0) + COALESCE(Vw.GC, 0) + COALESCE(Ll.GC, 0) + COALESCE(Vl.GC, 0) + COALESCE(Ld.GC, 0) + COALESCE(Vd.GC, 0)) + (COALESCE(Lw.GF, 0) + COALESCE(Vw.GF, 0) + COALESCE(Ll.GF, 0) + COALESCE(Vl.GF, 0) + COALESCE(Ld.GF, 0) + COALESCE(Vd.GF, 0))) DIF,
    SUM(((COALESCE(Lw.P, 0) + COALESCE(Vw.P, 0)) * 3) + COALESCE(Ld.P, 0) + COALESCE(Vd.P, 0)) Puntos
    /*,SUM(COALESCE(Lw.P,0)) 'GANOLOCAL',
    SUM(COALESCE(Vw.P,0)) 'GANOVISITANTE',
    SUM(COALESCE(Ld.P,0)) 'EMPATOLOCAL',
    SUM(COALESCE(Vd.P,0)) 'EMPATOVISITANTE',
    SUM(COALESCE(Ll.P,0)) 'PERDIOLOCAL',
    SUM(COALESCE(Vl.P,0)) 'PERDIOVISITANTE'*/
FROM
    team t
        JOIN
    tournament_has_team h USING (cod_team)
        LEFT JOIN
    (SELECT 
        m.cod_tournament,
            m.team_local 'cod_team',
            m.cod_match,
            SUM(score_local) GF,
            SUM(score_visitant) GC,
            COUNT(m.cod_match) P
    FROM
        `match` m
    WHERE
        ! ISNULL(m.score_local)
            AND ! ISNULL(m.score_visitant)
            AND score_local > score_visitant
            AND m.group = 1
    GROUP BY m.cod_tournament , m.team_local) Lw USING (cod_tournament , cod_team)
        LEFT JOIN
    (SELECT 
        m.cod_tournament,
            m.team_visitant 'cod_team',
            m.cod_match,
            SUM(score_visitant) GF,
            SUM(score_local) GC,
            COUNT(m.cod_match) P
    FROM
        `match` m
    WHERE
        ! ISNULL(m.score_local)
            AND ! ISNULL(m.score_visitant)
            AND score_visitant > score_local
            AND m.group = 1
    GROUP BY m.cod_tournament , m.team_visitant) Vw USING (cod_tournament , cod_team)
        LEFT JOIN
    (SELECT 
        m.cod_tournament,
            m.team_local 'cod_team',
            m.cod_match,
            SUM(score_local) GF,
            SUM(score_visitant) GC,
            COUNT(m.cod_match) P
    FROM
        `match` m
    WHERE
        ! ISNULL(m.score_local)
            AND ! ISNULL(m.score_visitant)
            AND score_local < score_visitant
            AND m.group = 1
    GROUP BY m.cod_tournament , m.team_local) Ll USING (cod_tournament , cod_team)
        LEFT JOIN
    (SELECT 
        m.cod_tournament,
            m.team_visitant 'cod_team',
            m.cod_match,
            SUM(score_visitant) GF,
            SUM(score_local) GC,
            COUNT(m.cod_match) P
    FROM
        `match` m
    WHERE
        ! ISNULL(m.score_local)
            AND ! ISNULL(m.score_visitant)
            AND score_visitant < score_local
            AND m.group = 1
    GROUP BY m.cod_tournament , m.team_visitant) Vl USING (cod_tournament , cod_team)
        LEFT JOIN
    (SELECT 
        m.cod_tournament,
            m.team_local 'cod_team',
            m.cod_match,
            SUM(score_local) GF,
            SUM(score_visitant) GC,
            COUNT(m.cod_match) P
    FROM
        `match` m
    WHERE
        ! ISNULL(m.score_local)
            AND ! ISNULL(m.score_visitant)
            AND score_local = score_visitant
            AND m.group = 1
    GROUP BY m.cod_tournament , m.team_local) Ld USING (cod_tournament , cod_team)
        LEFT JOIN
    (SELECT 
        m.cod_tournament,
            m.team_visitant 'cod_team',
            m.cod_match,
            SUM(score_visitant) GF,
            SUM(score_local) GC,
            COUNT(m.cod_match) P
    FROM
        `match` m
    WHERE
        ! ISNULL(m.score_local)
            AND ! ISNULL(m.score_visitant)
            AND score_visitant = score_local
            AND m.group = 1
    GROUP BY m.cod_tournament , m.team_visitant) Vd USING (cod_tournament , cod_team)
WHERE
    cod_tournament = 47
GROUP BY cod_team
