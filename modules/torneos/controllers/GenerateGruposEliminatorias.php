<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class GenerateGruposEliminatorias {

    public function generate($grupos, $teams) {
        $html = "";
        if ((count($grupos) == 0) || (count($teams) == 0)) {
            return "";
        }
        $inter = true;
        $class_inter = "verde";
        $class_collapse = "in";
        $count = 0;
        foreach ($grupos as $round) {
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
                <h4 class="panel-title" title="Jornada ' . $round->number . '">Jornada ' . $round->number . '</h4>
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

}

?>
