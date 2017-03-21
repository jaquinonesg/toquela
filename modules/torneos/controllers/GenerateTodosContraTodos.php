<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class GenerateTodosContraTodos {

    public function generate($rounds, $teams) {
        $html = "";
        if ((count($rounds) == 0) || (count($teams) == 0)) {
            return "";
        }
        $inter = true;
        $class_inter = "verde";
        $class_collapse = "in";
        $count = 0;
        foreach ($rounds as $round) {
            if ($inter) {
                $class_inter = "verde";
                $inter = false;
            } else {
                $class_inter = "azul";
                $inter = true;
            }
            if ($count == 0) {
                $class_collapse = "in";
            } else {
                $class_collapse = "collapse";
            }
            $html .= '<div class="panel panel-default ' . $class_inter . '">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_' . $count . '">
            <div class="panel-heading">
                <h4 class="panel-title" title="Grupo ' . $round->number . '">Grupo ' . $round->number . '</h4>
            </div>
        </a>
        <div id="collapse_' . $count . '" class="panel-collapse ' . $class_collapse . '" style="height: auto;">
            <div class="panel-body">
                <table class="table table-condensed round" data-round="' . $round->number . '">
                    <tbody>';
            foreach ($round->matches as $match) {
                $html .= '<tr>
                                <td>
                                    <select class="form-control" data-width="170px" data-team="' . $match->local->codteam . '" data-name="' . $match->local->name . '">
                                        <option value="0">------</option>';
                foreach ($teams as $team) {
                    if ($team->codteam == $match->local->codteam) {
                        $html .= '<option value="' . $team->codteam . '" selected="">' . $team->name . '</option>';
                    } else {
                        $html .= '<option value="' . $team->codteam . '">' . $team->name . '</option>';
                    }
                }
                $html .= '</select>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="no-back-popup swap" title="intercambia ida/vuelta" tabindex="-1">↔</a>
                                </td>
                                <td>';
                if ($match->visitant->codteam == 0) {
                    $html .= $match->visitant->name;
                } else {
                    $html .= '<select class="form-control" data-width="170px" data-team="' . $match->visitant->codteam . '" data-name="' . $match->visitant->name . '">
                                            <option value="0">------</option>';
                    foreach ($teams as $team) {
                        if ($team->codteam == $match->visitant->codteam) {
                            $html .= '<option value="' . $team->codteam . '" selected="">' . $team->name . '</option>';
                        } else {
                            $html .= '<option value="' . $team->codteam . '">' . $team->name . '</option>';
                        }
                    }
                    $html .= '</select>';
                }
                $html .= '</td>
                            </tr>';
            }
            $html .= '</tbody>
                </table>
            </div>
        </div>
    </div>';
            $count++;
        }
        return $html;
    }

    public function generateGruposEliminatorias($rounds, $teams) {
        $html = "";
        if ((count($rounds) == 0) || (count($teams) == 0)) {
            return "";
        }
        $inter = true;
        $class_inter = "verde";
        $class_collapse = "in";
        $count = 0;
        foreach ($rounds as $round) {
            if ($inter) {
                $class_inter = "verde";
                $inter = false;
            } else {
                $class_inter = "azul";
                $inter = true;
            }
            if ($count == 0) {
                $class_collapse = "in";
            } else {
                $class_collapse = "collapse";
            }
            $html .= '<div class="panel panel-default ' . $class_inter . '">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_' . $count . '">
            <div class="panel-heading">
                <h4 class="panel-title" title="Grupo ' . $round->number . '">Grupo ' . $round->number . '</h4>
            </div>
        </a>
        <div id="collapse_' . $count . '" class="panel-collapse ' . $class_collapse . '" style="height: auto;">
            <div class="panel-body">
                <table class="table table-condensed round" data-round="' . $round->number . '">
                    <tbody>';
            foreach ($round->matches as $match) {
                $html .= '<tr>
                                <td>
                                    <select class="form-control" data-width="170px" data-team="' . $match->local->codteam . '" data-name="' . $match->local->name . '" grupo="' . $round->number . '">
                                        <option value="0">------</option>';
                foreach ($teams as $team) {
                    if ($team->codteam == $match->local->codteam) {
                        $html .= '<option value="' . $team->codteam . '" selected="">' . $team->name . '</option>';
                    } else {
                        $html .= '<option value="' . $team->codteam . '">' . $team->name . '</option>';
                    }
                }
                $html .= '</select>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="no-back-popup swap" title="intercambia ida/vuelta" tabindex="-1">↔</a>
                                </td>
                                <td>';
                if ($match->visitant->codteam == 0) {
                    $html .= $match->visitant->name;
                } else {
                    $html .= '<select class="form-control" data-width="170px" data-team="' . $match->visitant->codteam . '" data-name="' . $match->visitant->name . '" grupo="' . $round->number . '">
                                            <option value="0">------</option>';
                    foreach ($teams as $team) {
                        if ($team->codteam == $match->visitant->codteam) {
                            $html .= '<option value="' . $team->codteam . '" selected="">' . $team->name . '</option>';
                        } else {
                            $html .= '<option value="' . $team->codteam . '">' . $team->name . '</option>';
                        }
                    }
                    $html .= '</select>';
                }
                $html .= '</td>
                            </tr>';
            }
            $html .= '</tbody>
                </table>
            </div>
        </div>
    </div>';
            $count++;
        }
        return $html;
    }

    public function generateFaseGrupos($matches, $teams) {
        $html = "";
        $num_matches = count($matches);
        if (($num_matches == 0) || (count($teams) == 0)) {
            return "";
        }
        $inter = true;
        $class_inter = "verde";
        $class_collapse = "in";
        $count = 0;
        $round = 0;
        $fin = '</tbody>
                </table>
            </div>
        </div>
    </div>';
        $htmlcontend = "";
        foreach ($matches as $match) {
            $count++;
            if ($round == $match->round) {
                $htmlcontend .= $this->contendFaseGrupos($match, $teams, $count);
            } else {
                $round = $match->round;
                if ($inter) {
                    $class_inter = "verde";
                    $inter = false;
                } else {
                    $class_inter = "azul";
                    $inter = true;
                }
                if ($count == 1) {
                    //$class_collapse = "in";
                    $class_collapse = "collapse";
                } else {
                    $class_collapse = "collapse";
                }

                $init = '<div class="panel panel-default ' . $class_inter . '" style="margin-bottom: 2px;">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_' . $match->group . '_' . $count . '">
            <div class="panel-heading">
                <h4 class="panel-title" title="Grupo ' . $round . '">Grupo ' . $round . '</h4>
            </div>
        </a>
        <div id="collapse_' . $match->group . '_' . $count . '" class="panel-collapse ' . $class_collapse . '" style="height: auto;">
            <div class="panel-body">
                <table class="table table-condensed round" data-round="' . $round . '">
                    <tbody>
                    <tr class="text-center elemento-azul-claro">
                        <td>Local</td><td>Visitante</td><td>J</td>
                    </tr>';
                if ($count == 1) {
                    $html .= $init . $this->contendFaseGrupos($match, $teams, $count);
                } else {
                    $html .= $htmlcontend . $fin . $init;
                    $htmlcontend = "";
                    $htmlcontend .= $this->contendFaseGrupos($match, $teams, $count);
                }
            }
            if ($count == ($num_matches)) {
                $html .= $htmlcontend . $fin;
            }
        }
        
        $obj = new stdClass();
        $obj->html = $html;
        $obj->nummatches = $count;
        $obj->numrounds = $round;
        return $obj;
    }

    private function contendFaseGrupos($match, $teams, $cont) {
        $aux_jornada = isset($match->numjornada) ? $match->numjornada : "J";
        $htmlcontend .= '<tr>
                                <td>
                                    <div class="contador-partido"># ' . $cont . '</div>
                                    <select class="form-control" data-width="170px" data-team="' . $match->teamlocal . '" data-name="' . $match->local . '" data-round="' . $match->round . '" fase="' . $match->group . '" partido="' . $match->codmatch . '" num="' . $cont . '">';
        foreach ($teams as $team) {
            if ($team->codteam == $match->teamlocal) {
                $htmlcontend .= '<option value="' . $team->codteam . '" selected="">' . $team->name . '</option>';
            } else {
                $htmlcontend .= '<option value="' . $team->codteam . '">' . $team->name . '</option>';
            }
        }
        $htmlcontend .= '</select></td><td>';

        $htmlcontend .= '<select class="form-control" data-width="170px" data-team="' . $match->teamvisitant . '" data-name="' . $match->visitant . '" data-round="' . $match->round . '" fase="' . $match->group . '" partido="' . $match->codmatch . '" num="' . $cont . '">';
        foreach ($teams as $team) {
            if ($team->codteam == $match->teamvisitant) {
                $htmlcontend .= '<option value="' . $team->codteam . '" selected="">' . $team->name . '</option>';
            } else {
                $htmlcontend .= '<option value="' . $team->codteam . '">' . $team->name . '</option>';
            }
        }
        $htmlcontend .= '</select></td>
                    <td class="text-center" style="vertical-align: middle;">
                        ' . $aux_jornada . '
                    </td></tr>';
        return $htmlcontend;
    }

}

?>
