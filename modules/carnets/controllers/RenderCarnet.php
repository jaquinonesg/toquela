<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RenderCarnet
 *
 * @author Jorge Luis Romero Castañeda (jorgeromen27@gmail.com)
 */
class RenderCarnet {

    private $arreceptuar = array("phone", "profession", "university", "nationality", "guardian");

    private function getAgeByDate($date) {
        $now = new DateTime();
        $birthday = new DateTime($date);
        $age = $birthday->diff($now);
        if ($age->y == 0) {
            return "Indef";
        }
        return $age->y;
    }

    public function getStrTypeCarnet($cod_type_carnet, $isminstr = true) {
        switch ($cod_type_carnet) {
            case 1:
                if ($isminstr) {
                    return "TI:";
                }
                return "Tarjeta de identidad";
                break;
            case 2:
                if ($isminstr) {
                    return "CC:";
                }
                return "Cedula de ciudadanía";
                break;
            case 3:
                if ($isminstr) {
                    return "RC:";
                }
                return "Registro civil";
                break;
            default :
                if ($isminstr) {
                    return "Doc:";
                }
                return "Documento";
                break;
        }
        return "";
    }

    private function getStrFormatDateBirth($date) {
        if (isset($date)) {
            $arrdate = explode("-", $date);
            $strmes = "";
            $nummes = (int) $arrdate[1];
            switch ($nummes) {
                case 1:
                    $strmes = "ENE";
                    break;
                case 2:
                    $strmes = "FEB";
                    break;
                case 3:
                    $strmes = "MAR";
                    break;
                case 4:
                    $strmes = "ABR";
                    break;
                case 5:
                    $strmes = "MAY";
                    break;
                case 6:
                    $strmes = "JUN";
                    break;
                case 7:
                    $strmes = "JUL";
                    break;
                case 8:
                    $strmes = "AGO";
                    break;
                case 9:
                    $strmes = "SEP";
                    break;
                case 10:
                    $strmes = "OCT";
                    break;
                case 11:
                    $strmes = "NOV";
                    break;
                case 12:
                    $strmes = "DIC";
                    break;
            }
            return $arrdate[0] . "-" . $strmes . "-" . $arrdate[2];
        }
        return "Indef";
    }

    public function getHtmlGeneratePlantillaCarnet($plantilla) {
        $ancho_contenido_cm = ($plantilla->ancho - $plantilla->fotoancho - ($plantilla->padding * 2) - $plantilla->franjaancho);
        $ancho_pie_cm = ($plantilla->ancho - ($plantilla->padding * 2) - $plantilla->franjaancho);
        $contend_lateral_width = ($plantilla->alto - ($plantilla->padding * 2));
        $item_rotate_left_cm = ((($contend_lateral_width / 2) - ($plantilla->altoitems / 2) - $plantilla->padding) * -1);
        $item_rotate_top_cm = (($plantilla->alto / 2) - ($plantilla->padding * 2) - $plantilla->padding);
        $contenido = '';
        $contenido2 = '';
        $pie = '';
        $contindex = 0;

        if ($plantilla->islogo) {
            $maqlogo = $this->maquetaLogo($plantilla->logofilename, $plantilla->logoname, ($ancho_contenido_cm - $plantilla->padding_contenido - ($plantilla->bordegrosor * 2)), (($plantilla->altoitems * 2) - ($plantilla->bordegrosor * 2)));
            if ($maqlogo == "Logotipo...") {
                $contenido = '<div class="item_static" style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . ($plantilla->altoitems * 2) . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; line-height: ' . ($plantilla->altoitems * 2) . 'cm; padding-left: 0.1cm;" id="item_logo" separator="true" haveseparator="0" ancho="' . ($ancho_contenido_cm - $plantilla->padding_contenido) . '">' . $maqlogo . '</div>';
            } else {
                $contenido = '<div class="item_static" style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . ($plantilla->altoitems * 2) . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" id="item_logo" separator="true" haveseparator="0" ancho="' . ($ancho_contenido_cm - $plantilla->padding_contenido) . '">' . $maqlogo . '</div>';
            }
            $contenido .= '<div class="item_static" style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; line-height: ' . $plantilla->altoitems . 'cm; padding-left: 0.1cm;" nombre="Nombre">Nombre...</div>';
            for ($a = 0; $a < 2; $a++) {
                $contenido .= '<div class="item_in" style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="2" gridlibres="2" separator="true" haveseparator="0" ancho="' . ($ancho_contenido_cm - $plantilla->padding_contenido) . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 2">' . $this->getHtmlNumberSizeItem(2) . '</div>';
                $contindex++;
            }
            $pie = '<div class="item_in" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; margin-top: 0.13cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="true" haveseparator="0" ancho="' . $ancho_pie_cm . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 3">' . $this->getHtmlNumberSizeItem(3) . '</div>';
            $contindex++;
            //                for ($b = 0; $b < 1; $b++) {
            //                }
            $pie .= '<div class="item_in" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="false" haveseparator="0" ancho="' . $ancho_pie_cm . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 3">' . $this->getHtmlNumberSizeItem(3) . '</div>';
            $contindex++;
        } else {
            $contenido = '<div class="item_static" style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; line-height: ' . $plantilla->altoitems . 'cm; padding-left: 0.1cm;" nombre="Nombre">Nombre...</div>';
            for ($a = 0; $a < 4; $a++) {
                $contenido .= '<div class="item_in" style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="2" gridlibres="2" separator="true" haveseparator="0" ancho="' . ($ancho_contenido_cm - $plantilla->padding_contenido) . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 2">' . $this->getHtmlNumberSizeItem(2) . '</div>';
                $contindex++;
            }
            $pie = '<div class="item_in" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; margin-top: 0.13cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="true" haveseparator="0" ancho="' . $ancho_pie_cm . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 3">' . $this->getHtmlNumberSizeItem(3) . '</div>';
            $contindex++;
            //                for ($b = 0; $b < 1; $b++) {
            //                }
            $pie .= '<div class="item_in" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="false" haveseparator="0" ancho="' . $ancho_pie_cm . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 3">' . $this->getHtmlNumberSizeItem(3) . '</div>';
            $contindex++;
        }

        $contend_lateral = '<div class="item_in item_in_rotate" style="width: ' . $contend_lateral_width . 'cm; height: ' . $plantilla->altoitems . 'cm; position: absolute; left: ' . $item_rotate_left_cm . 'cm; top: ' . $item_rotate_top_cm . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="2" gridlibres="2" separator="false" haveseparator="0" ancho="' . ($plantilla->alto - $plantilla->padding_contenido) . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 2">' . $this->getHtmlNumberSizeItem(2) . '</div>';
        $contindex++;
        $franja_lateral = '<div class="franjalateral" style="width: ' . ($plantilla->franjaancho - $plantilla->bordegrosor) . 'cm; height: ' . ($plantilla->alto - $plantilla->bordegrosor) . 'cm; background-color: ' . $plantilla->franjacolor . ' !important; -webkit-print-color-adjust: exact; left: ' . ($plantilla->ancho - $plantilla->franjaancho) . 'cm; top: ' . ((($plantilla->padding / 2) - $plantilla->bordegrosor) * -1) . 'cm; -webkit-border-top-right-radius: ' . $plantilla->borderadius . 'cm; -webkit-border-bottom-right-radius: ' . $plantilla->borderadius . 'cm; -moz-border-radius-topright: ' . $plantilla->borderadius . 'cm; -moz-border-radius-bottomright: ' . $plantilla->borderadius . 'cm; border-top-right-radius: ' . $plantilla->borderadius . 'cm; border-bottom-right-radius: ' . $plantilla->borderadius . 'cm; position: absolute;">' . $contend_lateral . '</div>';

        for ($c = 0; $c < 6; $c++) {
            $contenido2 .= '<div class="item_in" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="true" haveseparator="0" ancho="' . $ancho_pie_cm . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 3">' . $this->getHtmlNumberSizeItem(3) . '</div>';
            $contindex++;
        }
        $contenido2 .= '<div class="item_in" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="false" haveseparator="0" ancho="' . $ancho_pie_cm . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 2"><img class="logo" src="' . SITE . '/public/img/Logo-Footer.png" title="Logo Toquela" style="width: ' . ($ancho_pie_cm / 3) . 'cm; height: ' . $plantilla->logoalto . 'cm;"/>' . $this->getHtmlNumberSizeItem(2) . '</div>';
        $contindex++;

        $contend_lateral2 = '<div class="item_in item_in_rotate_ri" style="width: ' . $contend_lateral_width . 'cm; height: ' . $plantilla->altoitems . 'cm; left: ' . $item_rotate_left_cm . 'cm; top: ' . (($contend_lateral_width / 2) - ($plantilla->padding * 2)) . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="2" gridlibres="2" separator="false" haveseparator="0" ancho="' . ($plantilla->alto - $plantilla->padding_contenido) . '" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)" data-toggle="tooltip" data-placement="top" data-original-title="Tamaño: 2">' . $this->getHtmlNumberSizeItem(2) . '</div>';
        $contindex++;
        $franja_lateral2 = '<div class="franjalateral" style="width: ' . ($plantilla->franjaancho - $plantilla->bordegrosor) . 'cm; height: ' . ($plantilla->alto - $plantilla->bordegrosor) . 'cm; background-color: #000000 !important; -webkit-print-color-adjust: exact; left: ' . (($plantilla->bordegrosor * 2) * -1) . 'cm; top: ' . ((($plantilla->padding / 2) - $plantilla->bordegrosor) * -1) . 'cm; -webkit-border-top-left-radius: ' . $plantilla->borderadius . 'cm; -webkit-border-bottom-left-radius: ' . $plantilla->borderadius . 'cm; -moz-border-radius-topleft: ' . $plantilla->borderadius . 'cm; -moz-border-radius-bottomleft: ' . $plantilla->borderadius . 'cm; border-top-left-radius: ' . $plantilla->borderadius . 'cm; border-bottom-left-radius: ' . $plantilla->borderadius . 'cm; position: absolute;">' . $contend_lateral2 . '</div>';

        $removed = '<img id="removed" src="' . SITE . '/public/img/recycle-bin-remove.png" ondrop="carnet.drop(event)" ondragleave="carnet.dragleave(event)" ondragover="carnet.dragover(event)"/>';

        $html = '<div class="cara" principal="1" style="width: ' . $plantilla->ancho . 'cm; height: ' . $plantilla->alto . 'cm; padding: ' . $plantilla->padding . 'cm; font-size: ' . $plantilla->fontsize . 'px; border: ' . $plantilla->bordegrosor . 'cm solid ' . $plantilla->bordecolor . '; -webkit-border-radius: ' . $plantilla->borderadius . 'cm; -moz-border-radius: ' . $plantilla->borderadius . 'cm; border-radius: ' . $plantilla->borderadius . 'cm;">' .
                $franja_lateral .
                '<div class="foto" style="width: ' . $plantilla->fotoancho . 'cm; height: ' . $plantilla->fotoalto . 'cm; line-height: ' . $plantilla->fotoalto . 'cm; border: ' . $plantilla->bordegrosor . 'cm solid #000000;"><p>Foto</p></div>' .
                '<div class="contenido" style="width: ' . $ancho_contenido_cm . 'cm; height: ' . $plantilla->fotoalto . 'cm; padding-left: ' . $plantilla->padding_contenido . 'cm;">' . $contenido . '</div>' .
                '<div class="pie" style="width: ' . $ancho_pie_cm . 'cm; height: ' . ($plantilla->alto - $plantilla->fotoalto - ($plantilla->padding * 2)) . 'cm;">' . $pie . '</div>' .
                '</div>' .
                '<div class="cara" principal="0" style="width: ' . $plantilla->ancho . 'cm; height: ' . $plantilla->alto . 'cm; padding: ' . $plantilla->padding . 'cm; font-size: ' . $plantilla->fontsize . 'px; border: ' . $plantilla->bordegrosor . 'cm solid ' . $plantilla->bordecolor . '; -webkit-border-radius: ' . $plantilla->borderadius . 'cm; -moz-border-radius: ' . $plantilla->borderadius . 'cm; border-radius: ' . $plantilla->borderadius . 'cm;">' .
                $franja_lateral2 .
                '<div class="contenido" style="width: ' . $ancho_pie_cm . 'cm; height: ' . ($plantilla->alto - ($plantilla->padding * 2)) . 'cm; padding-left: ' . $plantilla->padding_contenido . 'cm; left: ' . ($plantilla->franjaancho - $plantilla->padding) . 'cm;">' . $contenido2 . '</div>' .
                '</div>' . $removed;

        $format = new stdClass();
        $format->html = $html;
        $format->numitems = $contindex;
        return $format;
    }

    private function getSeparator($contindex, $data) {
        if ($data[$contindex]->haveseparator == 1) {
            return " add_separator";
        }
        return "";
    }

    public function getHtmlDataCarnet($plantillacompleta, $data, $index = 0) {
        $plantilla = $plantillacompleta->auxdata;
        $ancho_contenido_cm = ($plantilla->ancho - $plantilla->fotoancho - ($plantilla->padding * 2) - $plantilla->franjaancho);
        $ancho_pie_cm = ($plantilla->ancho - ($plantilla->padding * 2) - $plantilla->franjaancho);
        $contend_lateral_width = ($plantilla->alto - ($plantilla->padding * 2));
        $item_rotate_left_cm = ((($contend_lateral_width / 2) - ($plantilla->altoitems / 2) - $plantilla->padding) * -1);
        $item_rotate_top_cm = (($plantilla->alto / 2) - ($plantilla->padding * 2) - $plantilla->padding);
        $contenido = '';
        $contenido2 = '';
        $pie = '';
        $contindex = 0;

        if ($plantilla->islogo) {
            $contenido = '<div style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . ($plantilla->altoitems * 2) . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; line-height: ' . ($plantilla->altoitems * 2) . 'cm; padding-left: 0.1cm;" id="item_logo" separator="true" haveseparator="0" ancho="' . ($ancho_contenido_cm - $plantilla->padding_contenido) . '">' . $this->maquetaLogo($plantillacompleta->logofilename, $plantillacompleta->logoname, ($ancho_contenido_cm - $plantilla->padding_contenido - ($plantilla->bordegrosor * 2)), (($plantilla->altoitems * 2) - ($plantilla->bordegrosor * 2))) . '</div>';
            $contenido .= '<div style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; line-height: ' . $plantilla->altoitems . 'cm; padding-left: 0.1cm;" nombre="Nombre">' . $data->name . ' ' . $data->lastname . '</div>';
            for ($a = 0; $a < 2; $a++) {
                $contenido .= '<div class="item_in' . $this->getSeparator($contindex, $plantilla->data) . '" style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="2" gridlibres="2" separator="true" haveseparator="0" ancho="' . ($ancho_contenido_cm - $plantilla->padding_contenido) . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '</div>';
                $contindex++;
            }
            $pie = '<div class="item_in' . $this->getSeparator($contindex, $plantilla->data) . '" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; margin-top: 0.13cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="true" haveseparator="0" ancho="' . $ancho_pie_cm . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '</div>';
            $contindex++;
            //                for ($b = 0; $b < 1; $b++) {
            //                }
            $pie .= '<div class="item_in' . $this->getSeparator($contindex, $plantilla->data) . '" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="false" haveseparator="0" ancho="' . $ancho_pie_cm . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '</div>';
            $contindex++;
        } else {
            $contenido = '<div style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; line-height: ' . $plantilla->altoitems . 'cm; padding-left: 0.1cm;" nombre="Nombre">' . $data->name . ' ' . $data->lastname . '</div>';
            for ($a = 0; $a < 4; $a++) {
                $contenido .= '<div class="item_in' . $this->getSeparator($contindex, $plantilla->data) . '" style="width: ' . ($ancho_contenido_cm - $plantilla->padding_contenido) . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="2" gridlibres="2" separator="true" haveseparator="0" ancho="' . ($ancho_contenido_cm - $plantilla->padding_contenido) . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '</div>';
                $contindex++;
            }
            $pie = '<div class="item_in' . $this->getSeparator($contindex, $plantilla->data) . '" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm; margin-top: 0.13cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="true" haveseparator="0" ancho="' . $ancho_pie_cm . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '</div>';
            $contindex++;
            //                for ($b = 0; $b < 1; $b++) {
            //                }
            $pie .= '<div class="item_in' . $this->getSeparator($contindex, $plantilla->data) . '" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="false" haveseparator="0" ancho="' . $ancho_pie_cm . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '</div>';
            $contindex++;
        }

        $contend_lateral = '<div class="item_in item_in_rotate" style="width: ' . $contend_lateral_width . 'cm; height: ' . $plantilla->altoitems . 'cm; position: absolute; left: ' . $item_rotate_left_cm . 'cm; top: ' . $item_rotate_top_cm . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="2" gridlibres="2" separator="false" haveseparator="0" ancho="' . ($plantilla->alto - $plantilla->padding_contenido) . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '</div>';
        $contindex++;
        $franja_lateral = '<div class="franjalateral" style="width: ' . ($plantilla->franjaancho - $plantilla->bordegrosor) . 'cm; height: ' . ($plantilla->alto - $plantilla->bordegrosor) . 'cm; background-color: ' . $plantilla->franjacolor . ' !important; -webkit-print-color-adjust: exact; left: ' . ($plantilla->ancho - $plantilla->franjaancho) . 'cm; top: ' . ((($plantilla->padding / 2) - $plantilla->bordegrosor) * -1) . 'cm; -webkit-border-top-right-radius: ' . $plantilla->borderadius . 'cm; -webkit-border-bottom-right-radius: ' . $plantilla->borderadius . 'cm; -moz-border-radius-topright: ' . $plantilla->borderadius . 'cm; -moz-border-radius-bottomright: ' . $plantilla->borderadius . 'cm; border-top-right-radius: ' . $plantilla->borderadius . 'cm; border-bottom-right-radius: ' . $plantilla->borderadius . 'cm; position: absolute;">' . $contend_lateral . '</div>';

        for ($c = 0; $c < 6; $c++) {
            $contenido2 .= '<div class="item_in' . $this->getSeparator($contindex, $plantilla->data) . '" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="true" haveseparator="0" ancho="' . $ancho_pie_cm . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '</div>';
            $contindex++;
        }
        $contenido2 .= '<div class="item_in" style=" width: ' . $ancho_pie_cm . 'cm; height: ' . $plantilla->altoitems . 'cm; margin-bottom: ' . $plantilla->separacionitems . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="3" gridlibres="3" separator="false" haveseparator="0" ancho="' . $ancho_pie_cm . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '<img class="logo" src="' . SITE . '/public/img/Logo-Footer.png" title="Logo Toquela" style="width: ' . ($ancho_pie_cm / 3) . 'cm; height: ' . $plantilla->logoalto . 'cm;"/></div>';
        $contindex++;

        $contend_lateral2 = '<div class="item_in item_in_rotate_ri" style="width: ' . $contend_lateral_width . 'cm; height: ' . $plantilla->altoitems . 'cm; left: ' . $item_rotate_left_cm . 'cm; top: ' . (($contend_lateral_width / 2) - ($plantilla->padding * 2)) . 'cm;" index="' . $contindex . '" id="item_contend_' . $contindex . '" ocupado="1" gridmax="2" gridlibres="2" separator="false" haveseparator="0" ancho="' . ($plantilla->alto - $plantilla->padding_contenido) . '">' . $this->loadInfoContend($contindex, $plantilla->data, $data) . '</div>';
        $contindex++;
        $franja_lateral2 = '<div class="franjalateral" style="width: ' . ($plantilla->franjaancho - $plantilla->bordegrosor) . 'cm; height: ' . ($plantilla->alto - $plantilla->bordegrosor) . 'cm; background-color: #000000 !important; -webkit-print-color-adjust: exact; left: ' . (($plantilla->bordegrosor * 2) * -1) . 'cm; top: ' . ((($plantilla->padding / 2) - $plantilla->bordegrosor) * -1) . 'cm; -webkit-border-top-left-radius: ' . $plantilla->borderadius . 'cm; -webkit-border-bottom-left-radius: ' . $plantilla->borderadius . 'cm; -moz-border-radius-topleft: ' . $plantilla->borderadius . 'cm; -moz-border-radius-bottomleft: ' . $plantilla->borderadius . 'cm; border-top-left-radius: ' . $plantilla->borderadius . 'cm; border-bottom-left-radius: ' . $plantilla->borderadius . 'cm; position: absolute;">' . $contend_lateral2 . '</div>';

        $html = '<div class="body_carnet" id="_carnet_' . $index . '" index="' . $index . '">' .
                '<div class="cara" principal="1" style="width: ' . $plantilla->ancho . 'cm; height: ' . $plantilla->alto . 'cm; padding: ' . $plantilla->padding . 'cm; font-size: ' . $plantilla->fontsize . 'px; border: ' . $plantilla->bordegrosor . 'cm solid ' . $plantilla->bordecolor . '; -webkit-border-radius: ' . $plantilla->borderadius . 'cm; -moz-border-radius: ' . $plantilla->borderadius . 'cm; border-radius: ' . $plantilla->borderadius . 'cm;">' .
                $franja_lateral .
                '<div class="foto" style="width: ' . $plantilla->fotoancho . 'cm; height: ' . $plantilla->fotoalto . 'cm; line-height: ' . $plantilla->fotoalto . 'cm;">' . $this->loadFotoUser($data->path, ($plantilla->fotoancho - ($plantilla->bordegrosor * 2)), ($plantilla->fotoalto - ($plantilla->bordegrosor * 2)), $plantilla->bordegrosor) . '</div>' .
                '<div class="contenido" style="width: ' . $ancho_contenido_cm . 'cm; height: ' . $plantilla->fotoalto . 'cm; padding-left: ' . $plantilla->padding_contenido . 'cm;">' . $contenido . '</div>' .
                '<div class="pie" style="width: ' . $ancho_pie_cm . 'cm; height: ' . ($plantilla->alto - $plantilla->fotoalto - ($plantilla->padding * 2)) . 'cm;">' . $pie . '</div>' .
                '</div>' .
                '<div class="cara" principal="0" style="width: ' . $plantilla->ancho . 'cm; height: ' . $plantilla->alto . 'cm; padding: ' . $plantilla->padding . 'cm; font-size: ' . $plantilla->fontsize . 'px; border: ' . $plantilla->bordegrosor . 'cm solid ' . $plantilla->bordecolor . '; -webkit-border-radius: ' . $plantilla->borderadius . 'cm; -moz-border-radius: ' . $plantilla->borderadius . 'cm; border-radius: ' . $plantilla->borderadius . 'cm;">' .
                $franja_lateral2 .
                '<div class="contenido" style="width: ' . $ancho_pie_cm . 'cm; height: ' . ($plantilla->alto - ($plantilla->padding * 2)) . 'cm; padding-left: ' . $plantilla->padding_contenido . 'cm; left: ' . ($plantilla->franjaancho - $plantilla->padding) . 'cm;">' . $contenido2 . '</div>' .
                '</div></div><br>';
        return $html;
    }

    private function loadFotoUser($fotouser, $fotowidth, $fotoheight, $fotobordegrosor) {
        //$htmlfoto = '<div style="width: ' . $fotowidth . 'cm; height: ' . $fotoheight . 'cm; border: solid ' . $fotobordegrosor . 'cm #000000;"><p>Sin foto</p></div>';
        $htmlfoto = '<img src="' . SITE . '/public/img/no_user_image.jpg' . $fotouser . '" style="width: ' . $fotowidth . 'cm; height: ' . $fotoheight . 'cm; border: ' . $fotobordegrosor . 'cm solid #000000;"/>';
        if (isset($fotouser)) {
            $htmlfoto = '<img src="' . SITE . '/' . $fotouser . '" style="width: ' . $fotowidth . 'cm; height: ' . $fotoheight . 'cm; border: ' . $fotobordegrosor . 'cm solid #000000;"/>';
        }
        return $htmlfoto;
    }

    private function loadInfoContend($indexconted, $datacarnet, $datauser) {
        $arrcods = $datacarnet[$indexconted]->coditem;
        $result = "";
        $cont = 0;
        foreach ($arrcods as $coditem) {
            if ($cont == 0) {
                $result .= '<span class="distribucion">' . $this->validateDataCarnet($datauser, $coditem) . "</span>";
            } else {
                $result .= '<span class="distribucion"> ' . $this->validateDataCarnet($datauser, $coditem) . "</span>";
            }
            $cont++;
        }
        return $result;
    }

    private function getStrGenero($sex) {
        $auxsex = "";
        if ($sex == "HOMBRE") {
            $auxsex = "M";
        } elseif ($sex == "MUJER") {
            $auxsex = "F";
        } else {
            $auxsex = "Indef";
        }
        return $auxsex;
    }

    private function validateDataCarnet($datauser, $coditem) {
        switch ($coditem) {
            case 'numdoc':
                $numdoc = "No tiene";
                if (isset($datauser->eps)) {
                    $numdoc = $datauser->numdoc;
                }
                return $this->getStrTypeCarnet($datauser->typedoc) . ' ' . $numdoc;
                break;
            case 'sex':
                return 'Genero: ' . $this->getStrGenero($datauser->sex);
                break;
            case 'datebirth':
                return "FN: " . $this->getStrFormatDateBirth($datauser->datebirth);
                break;
            case 'age':
                return 'Edad: ' . $this->getAgeByDate($datauser->datebirth);
                break;
            case 'university':
                $universidad = 'Sin universidad.';
                if (isset($datauser->university)) {
                    $universidad = "Universidad: " . $datauser->university;
                }
                return $universidad;
                break;
            case 'guardian':
                $acudiente = 'Sin acudiente.';
                if (isset($datauser->guardian)) {
                    $acudiente = "Acudiente: " . $datauser->guardian;
                }
                return $acudiente;
                break;
            case 'eps':
                $eps = "EPS: No tiene.";
                if (isset($datauser->eps)) {
                    $eps = "EPS: " . $datauser->eps;
                }
                return $eps;
                break;
            case 'typeblood':
                $rh = "RH: Indef";
                if (isset($datauser->typeblood)) {
                    $rh = "RH: " . $datauser->typeblood;
                }
                return $rh;
                break;
            case 'nationality':
                $nacionalidad = "Sin nacionalidad";
                if (isset($datauser->nationality)) {
                    $nacionalidad = "Nacionalidad: " . $datauser->nationality;
                }
                return $nacionalidad;
                break;
            case 'phone':
                $telefono = "TEL: No tiene.";
                if (isset($datauser->phone)) {
                    $telefono = "TEL: " . $datauser->phone;
                }
                return $telefono;
                break;
            case 'cellular':
                $celular = "CEL: No tiene.";
                if (isset($datauser->cellular)) {
                    $celular = "CEL: " . $datauser->cellular;
                }
                return $celular;
                break;
            case 'category':
                $categoria = "Sin categoría";
                if (isset($datauser->category)) {
                    $categoria = "Categoría: " . $datauser->category;
                }
                return $categoria;
                break;
            case 'pt':
                return DOMINIO;
                break;
            case 'teamcarnet':
                $teamname = "Sin equipo.";
                if (isset($datauser->teamname)) {
                    $teamname = $datauser->teamname;
                }
                return "Equipo: " . $teamname;
                break;
            default :
                return $datauser->$coditem;
                break;
        }
        return '';
    }

    private function getHtmlNumberSizeItem($sizeitem) {
        return '<span class="text_size_item_in">' . $sizeitem . '</span>';
    }

    private function maquetaLogo($logofilename, $logoname, $width, $height) {
        if ($logofilename != "") {
            return '<img src="' . SITE . '/public/files/carnets/logos/' . $logofilename . '" title="' . $logoname . '" style="width: ' . $width . 'cm; height: ' . $height . 'cm;"/>';
        }
        return 'Logotipo...';
    }

    public function getHtmlReport($datauser) {
        $html = "<html><table>
             <header>
                <tr>
                  <th>#</th>
                  <th>Nombre y Apellido</th>
                  <th>Estado de los datos</th>
                  <th>Correo</th>
                  <th>Celular</th>
                  <th>Tipo documento</th>
                  <th>Numero de documento</th>
                  <th>Fecha de nacimiento</th>
                  <th>Edad</th>
                  <th>Genero</th>
                  <th>Categoria</th>
                  <th>Foto</th>
                  <th>EPS</th>
                  <th>RH</th>
                  <th>Equipo carnet</th>
                  <th>Telefono fijo</th>
                  <th>Profesion</th>
                  <th>Universidad</th>
                  <th>Nacionalidad</th>
                  <th>Acudiente</th>
                </tr>
            </header>";
        $cont = 1;
        foreach ($datauser as $du) {
            $estado = "INCOMPLETO";
            if ($this->isDataComplet($du)) {
                $estado = "COMPLETO";
            }
            $html .= "<tr>
                    <td>$cont</td>
                    <td>" . $du->name . " " . $du->lastname . "</td>
                    <td>" . $estado . "</td>
                    <td>" . $du->email . "</td>
                    <td>" . $du->cellular . "</td>
                    <td>" . $this->getStrTypeCarnet($du->typedoc, false) . "</td>
                    <td>" . $du->numdoc . "</td>
                    <td>" . $du->datebirth . "</td>
                    <td>" . $this->getAgeByDate($du->datebirth) . "</td>
                    <td>" . $this->getStrGenero($du->sex) . "</td>
                    <td>" . $du->category . "</td>";
            if (isset($du->path)) {
                $html .="<td>Tiene foto</td>";
            } else {
                $html .="<td>NO Tiene foto</td>";
            }
            $html .="<td>" . $du->eps . "</td>
                <td>" . $du->typeblood . "</td>";
            if (isset($du->teamcarnet)) {
                $html .="<td>" . $du->teamname . "</td>";
            } else {
                $html .="<td>No se ha definido.</td>";
            }
            $html .="<td>" . $du->phone . "</td>
                <td>" . $du->profession . "</td>
                <td>" . $du->university . "</td>
                <td>" . $du->nationality . "</td>
                <td>" . $du->guardian . "</td>";
            $html .="</tr>";

            $cont++;
        }
        $html .= "</html>";
        return $html;
    }

    private function isDataComplet($obj) {
        foreach ($obj as $nameitem => $value) {
            if (in_array($nameitem, $this->arreceptuar)) {
                continue;
            }
            if (is_null($value) || ($value == "")) {
                return false;
            }
        }
        return true;
    }

    public function getHtmlExportCarnet($teams, $idacordion, $codtournament) {
        $html = '';
        $cont = 0;
        $class_inter = "verde";
        $isinner = true;
        foreach ($teams as $team) {
            if ($isinner) {
                $class_inter = "verde";
                $isinner = false;
            } else {
                $class_inter = "azul";
                $isinner = true;
            }
            $html .= '<div class="panel panel-default ' . $class_inter . '">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#' . $idacordion . '" href="#collapse_' . $cont . '">
            <div class="panel-heading">
                <h4 class="panel-title" title="' . $team->name . '">' . ($cont + 1) . ') ' . $team->name . '
                    <span class="actions">
                        <button class="btn btn-primary printteam" href="' . SITE . '/carnets/index/exportbyteam/' . $codtournament . '/' . $team->codteam . '/print">Imprimir</button>                    
                        <button class="btn btn-primary exportjpg" href="' . SITE . '/carnets/index/exportbyteam/' . $codtournament . '/' . $team->codteam . '/jpg">Exportar a JPG</button>                    
                        <button class="btn btn-primary exportpng" href="' . SITE . '/carnets/index/exportbyteam/' . $codtournament . '/' . $team->codteam . '/png">Exportar a PNG</button>                    
                        <button class="btn btn-primary exportpdf" href="' . SITE . '/carnets/index/exportbyteam/' . $codtournament . '/' . $team->codteam . '/pdf">Exportar a PDF</button>
                    </span>
                </h4>
                <div class="clear"></div>
            </div>
        </a>
        <div id="collapse_' . $cont . '" class="panel-collapse collapse" style="height: auto;">
            <div class="panel-body">';
            $players = DAOFactory::getUserHasTeamDAO()->getPlayersByTeam($team->codteam);
            if (isset($players)) {
                foreach ($players as $player) {
                    $html .= '<div class="jugador">' . $player->name . " " . $player->lastname . '
                                <span class="actions">
                                    <a href="' . SITE . '/carnets/index/exportbyuser/' . $codtournament . '/' . $player->coduser . '/print" target="_blank">
                                        <button class="btn btn-primary">Imprimir</button> 
                                    </a>
                                    <a href="' . SITE . '/carnets/index/exportbyuser/' . $codtournament . '/' . $player->coduser . '/jpg" target="_blank">
                                        <button class="btn btn-primary">Exportar a JPG</button>                    
                                    </a>
                                    <a href="' . SITE . '/carnets/index/exportbyuser/' . $codtournament . '/' . $player->coduser . '/png" target="_blank">
                                        <button class="btn btn-primary">Exportar a PNG</button>                    
                                    </a>
                                    <a href="' . SITE . '/carnets/index/exportbyuser/' . $codtournament . '/' . $player->coduser . '/pdf" target="_blank">
                                    <button class="btn btn-primary">Exportar a PDF</button>
                                    </a>
                                </span>
                                <div class="clear"></div>
                            </div>';
                }
            } else {
                $html .= '<div class="jugador"><p>No hay jugadores...</p></div>';
            }
            $html .= '</div>
                    </div>
                </div>';
            $cont++;
        }
        return $html;
    }

}