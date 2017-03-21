<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GenerateTablero
 *
 * @author JuanP
 */
class GenerateTablero {

    public function generate_tablero($teams, $cod_tournament, $is_names = false, $matches = null) {
        if (is_array($matches) && count($matches) > 0) {
            $exist_matches = true;
        } else {
            $exist_matches = false;
            $ronda = 1;
        }
        $size = count($teams);
        if ($size <= 0) {
            return "<p>No se ha terminado de configurar este torneo.</p>";
        }
        if (($size < 4) && ($size > 32)) {
            return "";
        }
        if ($size % 4 != 0) {
            return "";
        }
        $count_matches = 0;
        $html = "";
        $num_init = floor($size / 2);
        $cont = 0;
        $cont_select = 0;
        $caja_margin_top = 0;
        $brackets = '';
        $html_aux = '';
        $group_height = 75;
        $height_total = ($group_height * $num_init) + (5 * $num_init);
        $mitad_height_caja = ($group_height / 2);
        $html = '<span id="container-tablero">
            <div class="knockoutTree eliminatoria" min="0" max="' . ($size - 1) . '" data-num="' . $size . '" code="' . $cod_tournament . '" style="width:100%; height:auto;">';
        $cont_partido = 0;
        while (true) {
            $height_caja = $height_total / $num_init;
            $cont++;
            $cont_casilla = 0;
            $troque = true;
            $html_aux .= '
                <div class="knockoutBranches" >';
            $caja_margin_top = ($height_caja / 2) - $mitad_height_caja;
            $brackets = '';
            for ($a = 1; $a <= $num_init; $a++) {
                if ($a == 1) {
                    $brackets_margin_top = ($caja_margin_top + $mitad_height_caja);
                } else {
                    if ($troque) {
                        $brackets .= '<div class="brackets" style="height:' . $height_caja . 'px; margin-top:' . $brackets_margin_top . 'px;">&nbsp;</div><div class="single-bracket" style="margin-top:' . ($brackets_margin_top + $caja_margin_top + 18) . 'px;">&nbsp;</div>';
                        $brackets_margin_top = ($group_height + ($caja_margin_top * 2));
                        $troque = false;
                    } else {
                        $troque = true;
                    }
                }
                $cont_partido++;
                $html_aux .= '
                    <div class="knockoutMatch" style="border: solid 1px #FFFFFF; height:' . $height_caja . 'px;">
                    <table class="competitorPerMatch round-select" round="' . $cont . '" style="margin-top:' . $caja_margin_top . 'px; height:' . $group_height . 'px;">
                    <tbody class="partidos" num="' . $cont_partido . '" round="' . $cont . '">
                    <tr class="competitorCont elimi-local">
                    <td class="competitorName">';
                $cont_casilla++;
                $local = "L";
                $visitante = "V";
                if ($exist_matches && ($matches[$count_matches]->round == $cont)) {
                    if (isset($matches[$count_matches]->scorelocal) && isset($matches[$count_matches]->scorevisitant)) {
                        if ($matches[$count_matches]->scorelocal < 0) {
                            $local = "W";
                        } else {
                            $local = $matches[$count_matches]->scorelocal;
                        }
                        if ($matches[$count_matches]->scorevisitant < 0) {
                            $visitante = "W";
                        } else {
                            $visitante = $matches[$count_matches]->scorevisitant;
                        }
                    }
                    foreach ($teams as $team) {
                        if ($matches[$count_matches]->teamlocal == $team->codteam) {
                            $html_aux .= "&nbsp;" . $team->name;
                            break;
                        }
                    }
                } else {
                    if ($cont == $ronda) {
                        if ($is_names) {
                            $html_aux .= '&nbsp;' . $teams[$cont_casilla - 1]->name;
                        } else {
                            $html_aux .= '
                            <select class="form-control select-local" id="elim-select-' . $cont_select . '" index="' . $cont_select . '" title="Local">';
                            for ($b = 0; $b < $size; $b++) {
                                if ($cont_select == $b) {
                                    $html_aux .= '<option subindex="' . $b . '" value="' . $teams[$b]->codteam . '" selected>' . $teams[$b]->name . '</option>';
                                } else {
                                    $html_aux .= '<option subindex="' . $b . '" value="' . $teams[$b]->codteam . '">' . $teams[$b]->name . '</option>';
                                }
                            }
                            $cont_select++;
                            $html_aux .= '</select>';
                        }
                    }
                }

                $html_aux .= '
                        </td>	
                        <td class="competitorRes" title="Local">
                            ' . $local . '
                        </td>
                        </tr>
                        <tr class="competitorCont elimi-visitante" round="' . $cont . '">
                        <td class="competitorName">';
                $cont_casilla++;
                if ($exist_matches && ($matches[$count_matches]->round == $cont)) {
                    foreach ($teams as $team) {
                        if ($matches[$count_matches]->teamvisitant == $team->codteam) {
                            $html_aux .= "&nbsp;" . $team->name;
                            break;
                        }
                    }
                } else {
                    if ($cont == $ronda) {
                        if ($is_names) {
                            $html_aux .= '&nbsp;' . $teams[$cont_casilla - 1]->name;
                        } else {
                            $html_aux .= '
                        <select class="form-control select-visitante" id="elim-select-' . $cont_select . '" index="' . $cont_select . '" title="Visitante">';
                            for ($c = 0; $c < $size; $c++) {
                                if ($cont_select == $c) {
                                    $html_aux .= '<option subindex="' . $c . '" value="' . $teams[$c]->codteam . '" selected>' . $teams[$c]->name . '</option>';
                                } else {
                                    $html_aux .= '<option subindex="' . $c . '" value="' . $teams[$c]->codteam . '">' . $teams[$c]->name . '</option>';
                                }
                            }
                            $cont_select++;
                            $html_aux .= '</select>';
                        }
                    }
                }
                $html_aux .= '</td>	
                        <td class="competitorRes" title="Visitante">
                            ' . $visitante . '
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </div>';
                $count_matches++;
            }

            $html_aux .= '
                </div>
                <div class="lines">
                ' . $brackets . '
                </div>';
            $html .= $html_aux;
            $html_aux = '';

            if ($num_init <= 1) {
                break;
            }
            $num_init = ($num_init / 2);
        }
        $html = $html . '
            <div class="clear"></br></div>
            </div>
            </span>';
        return $html;
    }

    public function generate_params($size, $teams, $cod_tournament, $init_round = 0, $is_names = false, $matches = null, $previa = true) {
        /* if (is_array($matches) && count($matches) > 0) {
          $exist_matches = true;
          } else {
          $exist_matches = false;
          $ronda = 1;
          } */
        if ($size % 4 != 0) {
            return "";
        }
        $html = "";
        $num_init = floor($size / 2);
        $cont = $init_round;
        $cont_select = 0;
        $caja_margin_top = 0;
        $brackets = '';
        $html_aux = '';
        $group_height = 75;
        $height_total = ($group_height * $num_init) + (5 * $num_init);
        $mitad_height_caja = ($group_height / 2);
        $html = '<span id="container-tablero">
            <br><h2><strong>VISTA PREVIA ELIMINATORIA</strong></h2><br>
            <div class="knockoutTree eliminatoria" min="0" max="' . ($size - 1) . '" data-num="' . $size . '" code="' . $cod_tournament . '" style="width:100%; height:auto;">';
        $cont_partido = 0;
        $cont_match = 0;
        while (true) {
            $height_caja = $height_total / $num_init;
            $cont++;
            $cont_casilla = 0;
            $troque = true;
            $html_aux .= '
                <div class="knockoutBranches" >';
            $caja_margin_top = ($height_caja / 2) - $mitad_height_caja;
            $brackets = '';
            for ($a = 1; $a <= $num_init; $a++) {
                if ($a == 1) {
                    $brackets_margin_top = ($caja_margin_top + $mitad_height_caja);
                } else {
                    if ($troque) {
                        $brackets .= '<div class="brackets" style="height:' . $height_caja . 'px; margin-top:' . $brackets_margin_top . 'px;">&nbsp;</div><div class="single-bracket" style="margin-top:' . ($brackets_margin_top + $caja_margin_top + 18) . 'px;">&nbsp;</div>';
                        $brackets_margin_top = ($group_height + ($caja_margin_top * 2));
                        $troque = false;
                    } else {
                        $troque = true;
                    }
                }
                $cont_partido++;
                $html_aux .= '
                    <div class="knockoutMatch" style="border: solid 1px; border-color: transparent; height:' . $height_caja . 'px;">
                    <table class="competitorPerMatch round-select" round="' . $cont . '" style="margin-top:' . $caja_margin_top . 'px; height:' . $group_height . 'px;">
                    <tbody class="partidos" num="' . $cont_partido . '" round="' . $cont . '">
                    <tr class="competitorCont elimi-local">
                    <td class="competitorName">';
                $cont_casilla++;
                $local = "L";
                $visitante = "V";
                if ($is_names) {
                    if (isset($matches[$cont_match]->teamlocal)) {
                        $html_aux .= '&nbsp;' . $matches[$cont_match]->local;
                        if (isset($matches[$cont_match]->scorelocal)) {
                            if ($matches[$cont_match]->scorelocal < 0) {
                                $local = "W";
                            } else {
                                $local = $matches[$cont_match]->scorelocal;
                            }
                        }
                    }
                } else {
                    if (isset($matches[$cont_match]->teamlocal)) {
                        if ($matches[$cont_match]->round == 1) {
                            $html_aux .= '<select class="form-control select-local" id="elim-select-' . $cont_select . '" index="' . $cont_select . '" data-team="' . $matches[$cont_match]->teamlocal . '" data-round="' . $matches[$cont_match]->round . '" fase="' . $matches[$cont_match]->group . '" partido="' . $matches[$cont_match]->codmatch . '" title="Local">';
                            foreach ($teams As $team) {
                                if ($team->codteam == $matches[$cont_match]->teamlocal) {
                                    $html_aux .= '<option subindex="' . $b . '" value="' . $team->codteam . '" selected>' . $team->name . '</option>';
                                } else {
                                    $html_aux .= '<option subindex="' . $b . '" value="' . $team->codteam . '">' . $team->name . '</option>';
                                }
                            }
                            $cont_select++;
                            $html_aux .= '</select>';
                        } else {
                            $html_aux .= '&nbsp;' . $matches[$cont_match]->local;
                        }
                        if (isset($matches[$cont_match]->scorelocal)) {
                            if ($matches[$cont_match]->scorelocal < 0) {
                                $local = "W";
                            } else {
                                $local = $matches[$cont_match]->scorelocal;
                            }
                        }
                    } else {
                        if ($previa) {
                            $html_aux .= '
                            <select class="form-control select-local" id="elim-select-' . $cont_select . '" index="' . $cont_select . '" title="Local">';
                            $html_aux .= '<option subindex="' . $b . '" value="NULL" selected>Equipo 1 - Grupo ' . $cont . '</option>';
                            $html_aux .= '<option subindex="' . $b . '" value="NULL">Equipo 2 - Grupo ' . $cont . '</option>';
                            $cont_select++;
                            $html_aux .= '</select>';
                        }
                    }
                }
                $html_aux .= '
                        </td>	
                        <td class="competitorRes" title="Local">
                            ' . $local . '
                        </td>
                        </tr>
                        <tr class="competitorCont elimi-visitante" round="' . $cont . '">
                        <td class="competitorName">';
                $cont_casilla++;
                if ($is_names) {
                    if (isset($matches[$cont_match]->teamvisitant)) {
                        $html_aux .= '&nbsp;' . $matches[$cont_match]->visitant;
                        if (isset($matches[$cont_match]->scorevisitant)) {
                            if ($matches[$cont_match]->scorevisitant < 0) {
                                $visitante = "W";
                            } else {
                                $visitante = $matches[$cont_match]->scorevisitant;
                            }
                        }
                    }
                } else {
                    if (isset($matches[$cont_match]->teamvisitant)) {
                        if ($matches[$cont_match]->round == 1) {
                            $html_aux .= '
                        <select class="form-control select-visitante" id="elim-select-' . $cont_select . '" index="' . $cont_select . '" data-team="' . $matches[$cont_match]->teamvisitant . '" data-round="' . $matches[$cont_match]->round . '" fase="' . $matches[$cont_match]->group . '" partido="' . $matches[$cont_match]->codmatch . '" title="Visitante">';
                            foreach ($teams As $team) {
                                if ($team->codteam == $matches[$cont_match]->teamvisitant) {
                                    $html_aux .= '<option subindex="' . $b . '" value="' . $team->codteam . '" selected>' . $team->name . '</option>';
                                } else {
                                    $html_aux .= '<option subindex="' . $b . '" value="' . $team->codteam . '">' . $team->name . '</option>';
                                }
                            }
                            $cont_select++;
                            $html_aux .= '</select>';
                        } else {
                            $html_aux .= '&nbsp;' . $matches[$cont_match]->visitant;
                        }
                        if (isset($matches[$cont_match]->scorevisitant)) {
                            if ($matches[$cont_match]->scorevisitant < 0) {
                                $visitante = "W";
                            } else {
                                $visitante = $matches[$cont_match]->scorevisitant;
                            }
                        }
                    } else {
                        if ($previa) {
                            $html_aux .= '
                        <select class="form-control select-visitante" id="elim-select-' . $cont_select . '" index="' . $cont_select . '" title="Visitante">';
                            $html_aux .= '<option subindex="' . $b . '" value="NULL">Equipo 1 - Grupo ' . $cont . '</option>';
                            $html_aux .= '<option subindex="' . $b . '" value="NULL" selected>Equipo 2 - Grupo ' . $cont . '</option>';
                            $cont_select++;
                            $html_aux .= '</select>';
                        }
                    }
                }
                $cont_match++;

                $html_aux .= '</td>	
                        <td class="competitorRes" title="Visitante">
                            ' . $visitante . '
                        </td>
                        </tr>
                        </tbody>
                        </table>
                        </div>';
            }

            $html_aux .= '
                </div>
                <div class="lines">
                ' . $brackets . '
                </div>';
            $html .= $html_aux;
            $html_aux = '';

            if ($num_init <= 1) {
                break;
            }
            $num_init = ($num_init / 2);
        }
        $html = $html . '
            <div class="clear"></br></div>
            </div>
            </span>';
        return $html;
    }

}

?>
