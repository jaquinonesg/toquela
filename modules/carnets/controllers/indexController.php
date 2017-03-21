<?php

/**
 * Controlador Index
 *
 */
class IndexController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
    }

    public function index() {
                        //------ permisos admin
        if ($this->_sesion->user->codrole == 3) {
            $idRoleUser = $this->_sesion->user->codrole;
            $idUsuario = $this->_sesion->user->coduser;
            $privilegio = $this->validatePermissionsAdmin($idRoleUser, $idUsuario, 5);
        }
        //aquí coge alguno de los repetidos, y lo pone en el parametro que se necesita para validar
        if ($privilegio == 5) {
            $cod_role = $this->_sesion->user->codrole;
            $pasa = $this->validarRolesPrivilegios($cod_role, $privilegio, "Para acceder a esta seccion necesita tener permisos para administrar.", null);
        }

        if ($pasa == true || $this->_sesion->user->codrole == 2) {
            $this->_view->setItems("only", array('index.css', 'index.js'));
            $this->_view->renderizar();
        }else{
            $this->validarRolesPrivilegios(null, null, null, null);
        }
    }

    public function nuevo_carnet($cod_tournament = null) {
        if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            if (is_numeric($tournament->codtournament) && $this->_sesion->user->codrole == 2 || $this->_sesion->user->codrole == 3) {
                $carnet = DAOFactory::getCarnetDAO()->load($tournament->codtournament);
                $this->_view->assign('tournament', $tournament);
                $this->_view->assign('carnet', $carnet);
                $this->_view->setTitle("Nuevo Carnet");
                $this->_view->setItems("only", array('index.css', 'nuevo_carnet.css', 'nuevo_carnet.js'));
                $this->_view->renderizar("nuevo_carnet");
            }
        }
    }

    public function printcarnet() {
        $this->_view->setTitle("Imprimir Carnet");
        $this->_view->setLayout('empty');
        $this->_view->setItems("only", array('index.css', 'printcarnet.js'));
        $this->_view->renderizar("printcarnet");
    }

    public function preview($cod_tournament = null) {
        if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            if (is_numeric($tournament->codtournament) && $this->_sesion->user->codrole == 2 || $this->_sesion->user->codrole == 3) {
                $plantilla = DAOFactory::getCarnetDAO()->load($tournament->codtournament);
                $auxdata = json_decode(rawurldecode($plantilla->auxdata));
                $data = json_decode(rawurldecode($plantilla->data));
                $cods = json_decode(rawurldecode($plantilla->cods));
                if (is_object($auxdata) && is_numeric($auxdata->torneo) && is_array($data) && is_array($cods)) {
                    $plantilla->auxdata = $auxdata;
                    $plantilla->data = $data;
                    $plantilla->cods = $cods;
                    $datacarnet = DAOFactory::getCarnetDAO()->getDataCarnetForPreview($this->_sesion->user->coduser);
                    require_once dirname(__FILE__) . '/RenderCarnet.php';
                    $rendercarnet = new RenderCarnet();
                    $this->_view->setTitle("Vista previa");
                    $this->_view->setLayout('print');
                    $this->_view->assign('htmlcarnet', $rendercarnet->getHtmlDataCarnet($plantilla, $datacarnet));
                    $this->_view->assign('rendercarnet', $rendercarnet);
                    $this->_view->assign('tournament', $tournament);
                    $this->_view->assign('datacarnet', $datacarnet);
                    $this->_view->setItems("only", array('preview.css', 'preview.js'));
                    $this->_view->renderizar("preview");
                }
            }
        }
    }

    public function saveformatcarnet() {
        if ($this->_request->isAjax()) {
            $auxpost = (object) $_POST;
            $auxdata = json_decode(rawurldecode($auxpost->auxdata));
            $data = json_decode(rawurldecode($auxpost->data));
            $cods = json_decode(rawurldecode($auxpost->cods));
            if (is_object($auxdata) && is_numeric($auxdata->torneo) && is_array($data) && is_array($cods)) {
                $carnet = new Carnet();
                $carnet->codtournament = $auxdata->torneo;
                $carnet->nombre = $auxdata->nombre;
                $carnet->id = $auxdata->id;
                $carnet->auxdata = $auxpost->auxdata;
                $carnet->data = $auxpost->data;
                $carnet->cods = $auxpost->cods;
                $loadcarnet = DAOFactory::getCarnetDAO()->load($carnet->codtournament);
                if (is_null($loadcarnet)) {
                    $lastid = DAOFactory::getCarnetDAO()->insert($carnet);
                    if (is_numeric($lastid)) {
                        $this->endProcess("Operación realizada con éxito.", true);
                    }
                } else {
                    $affets = DAOFactory::getCarnetDAO()->update($carnet);
                    if (is_numeric($affets)) {
                        $this->endProcess("Operación realizada con éxito.", true);
                    } else {
                        $this->endProcess("No se realizaron cambios...");
                    }
                }
            }
        }
        $this->endProcess("No se pudo realizar la acción.");
    }

    public function getrenderplantilla() {
        if ($this->_request->isAjax()) {
            $auxpost = (object) $_POST;
            $auxdata = json_decode(rawurldecode($auxpost->auxdata));
            if (is_object($auxdata) && is_numeric($auxdata->torneo)) {
                require_once dirname(__FILE__) . '/RenderCarnet.php';
                $rendercarnet = new RenderCarnet();
                $format = $rendercarnet->getHtmlGeneratePlantillaCarnet($auxdata);
                $this->_view->_print(array('status' => true, 'message' => 'Operación realizada con exito.', 'html' => $format->html, 'numitems' => $format->numitems), true);
                return true;
            }
        }
        $this->endProcess("No se pudo realizar la acción.");
        return false;
    }

    public function loadlogocarnet() {
        $postobj = (object) $_POST;
        if (is_numeric($postobj->torneo) && isset($postobj->namelogo) && isset($_FILES['logo']) && ($_FILES['logo']['size'] > 0) && ($_FILES['logo']['error'] == 0)) {
            $codtournament = $postobj->torneo;
            $upfile = $this->upFile($_FILES['logo'], "logo_carnet", $codtournament, DOCUMENT_ROOT_SITE . "/public/files/carnets/logos/", null, 5242880);
            if ($upfile->retorno) {
                $carnet = new Carnet();
                $carnet->codtournament = $codtournament;
                $carnet->logofilename = $upfile->nombre;
                $carnet->logoname = $postobj->namelogo;
                $loadcarnet = DAOFactory::getCarnetDAO()->load($codtournament);
                if (is_null($loadcarnet)) {
                    $lastid = DAOFactory::getCarnetDAO()->insert($carnet);
                    if (is_numeric($lastid)) {
                        //$this->endProcess("Operación realizada con éxito.", true);
                    }
                } else {
                    $affets = DAOFactory::getCarnetDAO()->update($carnet);
                    if (is_numeric($affets)) {
                        //$this->endProcess("Operación realizada con éxito.", true);
                    }
                }
            }
        }
        $this->redireccionar("/carnets/index/nuevo_carnet/" . $codtournament);
    }

    private function upFile($data_file, $alias, $id_file, $phat_upload, $array_exts_validate = null, $max_bytes_validate = null) {
        $mr['mensaje'] = "";
        $mr['retorno'] = false;
        $mr['nombre'] = "";
        $mr['ruta'] = "";
        if (isset($data_file)) {
            if (is_null($array_exts_validate)) {
                $array_exts_validate = array("gif", "jpeg", "jpg", "png");
            }
            if (is_null($max_bytes_validate)) {
                $max_bytes_validate = 1572864;
            }
            if (substr_count($data_file["name"], ".") != 0) {
                $aux = explode(".", $data_file["name"]);
                $extension = end($aux);
                if (in_array($extension, $array_exts_validate)) {
                    if (($data_file ["size"] <= $max_bytes_validate)) {
                        if ($data_file ["error"] > 0) {
                            $mr['mensaje'] = "Surgió un error al subir el archivo: " . $data_file["error"];
                        } else {
                            if (file_exists($phat_upload . $data_file["name"])) {
                                $mr['mensaje'] = " El archivo con el nombre: " . $data_file ["name"] . " ya existe. Por favor cambie el nombre del archivo.";
                            } else {
                                $nombreImagen = $alias . $id_file . "." . $extension;
                                $mr['nombre'] = $nombreImagen;
                                $miRuta = $phat_upload . $nombreImagen;
                                $mr['ruta'] = $phat_upload . $nombreImagen;
                                if (move_uploaded_file($data_file["tmp_name"], $miRuta)) {
                                    $mr['mensaje'] = "Operación realizada con éxito.";
                                    $mr['retorno'] = true;
                                } else {
                                    $mr['mensaje'] = "Surgió un error al subir el archivo. Por favor inténtelo de nuevo.";
                                }
                            }
                        }
                    } else {
                        $mr['mensaje'] = "La imagen no puede superar un tamaño " . $max_bytes_validate . " (Bytes).";
                    }
                } else {
                    $printExtenciones = "(";
                        for ($a = 0; $a < count($array_exts_validate); $a++) {
                            $printExtenciones .= $array_exts_validate [$a] . ", ";
                        }
                        $printExtenciones .= ")";
$mr['mensaje'] = "El formato del archivo no es válido. Solo se permiten los siguientes formatos: " . $printExtenciones;
}
} else {
    $mr['mensaje'] = "El archivo no tiene una extensión asociada. Por lo tanto no se puede realizar la operación.";
}
} else {
    $mr['mensaje'] = "Surgió un error al enviar los datos por favor inténtelo de nuevo.";
}
return (object) $mr;
}

public function printreport($cod_tournament = null) {
    if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
        $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
        if (is_numeric($tournament->codtournament) && $this->_sesion->user->codrole == 2 || $this->_sesion->user->codrole == 3) {
            echo "Cargando reporte en Excel...";
            $datausers = DAOFactory::getTournamentDAO()->getDataUsersCarnets($tournament->codtournament);
            require_once dirname(__FILE__) . '/RenderCarnet.php';
            $rendercarnet = new RenderCarnet();
            $html = $rendercarnet->getHtmlReport($datausers);
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=reporte_carnets.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            echo $html;
        }
    }
}

public function export($cod_tournament = null) {
    if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
        $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
        if (is_numeric($tournament->codtournament) && $this->_sesion->user->codrole == 2 || $this->_sesion->user->codrole == 3) {
            require_once dirname(__FILE__) . '/RenderCarnet.php';
            $rendercarnet = new RenderCarnet();
            $teams = DAOFactory::getTournamentHasTeamDAO()->getTeamsByTournamentMin($tournament->codtournament);
            $htmlexport = $rendercarnet->getHtmlExportCarnet($teams, "accordion1", $tournament->codtournament);
            $this->_view->assign('tournament', $tournament);
            $this->_view->assign('htmlexport', $htmlexport);
            $this->_view->setTitle("Exportar carnet");
            $this->_view->setItems("only", array('index.css', "index.js"));
            $this->_view->renderizar("export");
        }
    }
}

public function exportbyuser($cod_tournament = null, $coduser = null, $type = "print") {
    if (!is_null($cod_tournament) && is_numeric($cod_tournament) && !is_null($coduser) && is_numeric($coduser)) {
        $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
        if (is_numeric($tournament->codtournament) && $this->_sesion->user->codrole == 2 || $this->_sesion->user->codrole == 3) {
            $plantilla = DAOFactory::getCarnetDAO()->load($tournament->codtournament);
            $auxdata = json_decode(rawurldecode($plantilla->auxdata));
            $data = json_decode(rawurldecode($plantilla->data));
            $cods = json_decode(rawurldecode($plantilla->cods));
            if (is_object($auxdata) && is_numeric($auxdata->torneo) && is_array($data) && is_array($cods)) {
                $plantilla->auxdata = $auxdata;
                $plantilla->data = $data;
                $plantilla->cods = $cods;
                $datacarnet = DAOFactory::getCarnetDAO()->getDataCarnetForPreview($coduser);
                require_once dirname(__FILE__) . '/RenderCarnet.php';
                $rendercarnet = new RenderCarnet();
                $this->_view->setTitle("Exportar");
                $this->_view->setLayout('print');
                switch ($type) {
                    case "print":
                    $this->_view->setTitle("Exportar como impreción");
                    $this->_view->assign('print', true);
                    $this->_view->assign('ispdf', false);
                    break;
                    case "pdf":
                    $this->_view->setTitle("Exportar como PDF");
                    $this->_view->assign('ispdf', true);
                    $this->_view->assign('print', false);
                    break;
                    case "jpg":
                    $this->_view->setTitle("Exportar como JPG");
                    $this->_view->assign('isjpg', true);
                    $this->_view->assign('ispdf', false);
                    $this->_view->assign('print', false);
                    break;
                    case "png":
                    $this->_view->setTitle("Exportar como PNG");
                    $this->_view->assign('isjpg', false);
                    $this->_view->assign('ispdf', false);
                    $this->_view->assign('print', false);
                    break;
                }
                $this->_view->assign('hayplantilla', true);
                $this->_view->assign('htmlcarnet', $rendercarnet->getHtmlDataCarnet($plantilla, $datacarnet));
                $this->_view->setItems("only", array('preview.css', 'html2canvas.js', 'jspdf.js', 'jspdf.plugin.addimage.js', 'jszip.js', 'exportbyuser.js'));
                $this->_view->renderizar("exportbyuser");
            } else {
                $this->_view->setLayout('print');
                $this->_view->assign('print', true);
                $this->_view->assign('ispdf', false);
                $this->_view->assign('hayplantilla', false);
                $this->_view->assign('htmlcarnet', "No se ha configurado una plantilla para el carnet.");
                $this->_view->setItems("only", array('preview.css', 'exportbyuser.js'));
                $this->_view->renderizar("exportbyuser");
            }
        }
    }
}

public function exportbyteam($cod_tournament = null, $codteam = null, $type = "print") {
    if (!is_null($cod_tournament) && is_numeric($cod_tournament) && !is_null($codteam) && is_numeric($codteam)) {
        $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
        if (is_numeric($tournament->codtournament) && $this->_sesion->user->codrole == 2 || $this->_sesion->user->codrole == 3) {
            $plantilla = DAOFactory::getCarnetDAO()->load($tournament->codtournament);
            $auxdata = json_decode(rawurldecode($plantilla->auxdata));
            $data = json_decode(rawurldecode($plantilla->data));
            $cods = json_decode(rawurldecode($plantilla->cods));
            if (is_object($auxdata) && is_numeric($auxdata->torneo) && is_array($data) && is_array($cods)) {
                $plantilla->auxdata = $auxdata;
                $plantilla->data = $data;
                $plantilla->cods = $cods;
                $datacarnets = DAOFactory::getCarnetDAO()->getDataCarnetForTornamentTeam($codteam, $tournament->codtournament);
                require_once dirname(__FILE__) . '/RenderCarnet.php';
                $rendercarnet = new RenderCarnet();
                $this->_view->setTitle("Exportar");
                $this->_view->setLayout('print');
                switch ($type) {
                    case "print":
                    $this->_view->setTitle("Exportar como impreción");
                    $this->_view->assign('print', true);
                    $this->_view->assign('ispdf', false);
                    break;
                    case "pdf":
                    $this->_view->setTitle("Exportar como PDF");
                    $this->_view->assign('ispdf', true);
                    $this->_view->assign('print', false);
                    break;
                    case "jpg":
                    $this->_view->setTitle("Exportar como JPG");
                    $this->_view->assign('isjpg', true);
                    $this->_view->assign('ispdf', false);
                    $this->_view->assign('print', false);
                    break;
                    case "png":
                    $this->_view->setTitle("Exportar como PNG");
                    $this->_view->assign('isjpg', false);
                    $this->_view->assign('ispdf', false);
                    $this->_view->assign('print', false);
                    break;
                }
                $this->_view->assign('rendercarnet', $rendercarnet);
                $this->_view->assign('datacarnets', $datacarnets);
                $this->_view->assign('plantilla', $plantilla);
                $this->_view->setItems("only", array('preview.css', 'html2canvas.js', 'jspdf.js', 'jspdf.plugin.addimage.js', 'jszip.js', 'exportbyuser.js'));
                $this->_view->renderizar("exportbyteam");
            } else {
                $this->_view->setLayout('print');
                $this->_view->assign('print', true);
                $this->_view->assign('ispdf', false);
                $this->_view->assign('hayplantilla', false);
                $this->_view->assign('htmlcarnet', "No se ha configurado una plantilla para el carnet.");
                $this->_view->setItems("only", array('preview.css', 'exportbyuser.js'));
                $this->_view->renderizar("exportbyteam");
            }
        }
    }
}

public function exportall($cod_tournament = null, $type = "print") {
    if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
        $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
        if (is_numeric($tournament->codtournament) && $this->_sesion->user->codrole == 2 || $this->_sesion->user->codrole == 3) {
            $plantilla = DAOFactory::getCarnetDAO()->load($tournament->codtournament);
            $auxdata = json_decode(rawurldecode($plantilla->auxdata));
            $data = json_decode(rawurldecode($plantilla->data));
            $cods = json_decode(rawurldecode($plantilla->cods));
            if (is_object($auxdata) && is_numeric($auxdata->torneo) && is_array($data) && is_array($cods)) {
                $plantilla->auxdata = $auxdata;
                $plantilla->data = $data;
                $plantilla->cods = $cods;
                $datacarnets = DAOFactory::getCarnetDAO()->getDataCarnetForTornament($tournament->codtournament);
                require_once dirname(__FILE__) . '/RenderCarnet.php';
                $rendercarnet = new RenderCarnet();
                $this->_view->setTitle("Exportar");
                $this->_view->setLayout('print');
                switch ($type) {
                    case "print":
                    $this->_view->setTitle("Exportar como impreción");
                    $this->_view->assign('print', true);
                    $this->_view->assign('ispdf', false);
                    break;
                    case "pdf":
                    $this->_view->setTitle("Exportar como PDF");
                    $this->_view->assign('ispdf', true);
                    $this->_view->assign('print', false);
                    break;
                    case "jpg":
                    $this->_view->setTitle("Exportar como JPG");
                    $this->_view->assign('isjpg', true);
                    $this->_view->assign('ispdf', false);
                    $this->_view->assign('print', false);
                    break;
                    case "png":
                    $this->_view->setTitle("Exportar como PNG");
                    $this->_view->assign('isjpg', false);
                    $this->_view->assign('ispdf', false);
                    $this->_view->assign('print', false);
                    break;
                }
                $this->_view->assign('rendercarnet', $rendercarnet);
                $this->_view->assign('datacarnets', $datacarnets);
                $this->_view->assign('plantilla', $plantilla);
                $this->_view->setItems("only", array('preview.css', 'html2canvas.js', 'jspdf.js', 'jspdf.plugin.addimage.js', 'jszip.js', 'exportbyuser.js'));
                $this->_view->renderizar("exportbyteam");
            } else {
                $this->_view->setLayout('print');
                $this->_view->assign('print', true);
                $this->_view->assign('ispdf', false);
                $this->_view->assign('hayplantilla', false);
                $this->_view->assign('htmlcarnet', "No se ha configurado una plantilla para el carnet.");
                $this->_view->setItems("only", array('preview.css', 'exportbyuser.js'));
                $this->_view->renderizar("exportbyteam");
            }
        }
    }
}

public function autocompleteequipo($codtournament = null) {
    $term = $this->get('term');
    if (!empty($term) && is_numeric($codtournament)) {
        $data_request = DAOFactory::getTeamDAO()->autocompleteTeamAndTournament($term, $codtournament);
        $this->_view->_print($data_request);
    }
}

public function getresultadoequipo() {
    $codteam = $this->post('equipo');
    $codtournament = $this->post('torneo');
    $html = "<p>Sin resultados...</p>";
    if (is_numeric($codteam) && is_numeric($codtournament)) {
        $team = DAOFactory::getTeamDAO()->load($codteam);
        if (isset($team)) {
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $this->_view->assign('codtournament', $codtournament);
            $this->_view->assign('team', $team);
            $html = $this->_view->renderizar("resultadoteam");
            $this->_view->_print(array('html' => $html));
        }
    }
}

public function autocompleteusuario($codtournament = null) {
    $term = $this->get('term');
    if (!empty($term) && is_numeric($codtournament)) {
        $data_request = DAOFactory::getUsersDAO()->autocompleteUserAndTournament($term, $codtournament);
        $this->_view->_print($data_request);
    }
}

public function getresultadousuario() {
    $coduser = $this->post('usuario');
    $codtournament = $this->post('torneo');
    $html = "<p>Sin resultados...</p>";
    if (is_numeric($coduser) && is_numeric($codtournament)) {
        $user = DAOFactory::getUsersDAO()->getInfoBasic($coduser);
        if (isset($user)) {
            $this->_view->setLayout('empty');
            $this->_view->setOutput(false);
            $this->_view->assign('codtournament', $codtournament);
            $this->_view->assign('user', $user);
            $html = $this->_view->renderizar("resultadouser");
            $this->_view->_print(array('html' => $html));
        }
    }
}

public function testescape() {
    $strescape = '%5B%7B%22htmlitems%22%3A%22%3Cdiv%20class%3D%5C%22item%5C%22%20index%3D%5C%220%5C%22%20cod%3D%5C%22100%5C%22%20id%3D%5C%22drag_0%5C%22%20sizegrid%3D%5C%222%5C%22%20title%3D%5C%22Documento%20identidad%5C%22%20auxcontend%3D%5C%22%5C%22%20draggable%3D%5C%22true%5C%22%20ondragstart%3D%5C%22carnet.dragstart%28event%29%5C%22%20ondragend%3D%5C%22carnet.dragend%28event%29%5C%22%20style%3D%5C%22width%3A%204.9cm%3B%20height%3A%200.65cm%3B%20text-overflow%3A%20ellipsis%3B%20white-space%3A%20nowrap%3B%20overflow%3A%20hidden%3B%5C%22%3E%5Cn%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Cp%3EDocumento%20identidad%20%3Cspan%20class%3D%5C%22text_size%5C%22%3E2%3C/span%3E%3C/p%3E%5Cn%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3C/div%3E%22%2C%22sizeitem%22%3A2%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22item_contend_0%22%2C%22coditem%22%3A%22100%22%2C%22save%22%3Atrue%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%2C%7B%22htmlitems%22%3A%22%22%2C%22sizeitem%22%3A0%2C%22gridlibres%22%3A0%2C%22idcontend%22%3A%22%22%2C%22coditem%22%3A%22%22%2C%22save%22%3Afalse%7D%5D';
    $newsata = json_decode(urldecode($strescape));
    echo "<pre>";
    @print_r($newsata);
    echo "</pre>";
    exit();
}

public function testname() {
    $obj = new stdClass();
    $obj->name = "coas";
    $obj->cod = 23;
    $obj->cosa = null;
    $arr = (array) $obj;

    foreach ($arr as $nameitem => $value) {
        echo $nameitem . ": " . $value . "<br>";
    }
}

public function testage() {
    $now = new DateTime();
    $birthday = new DateTime("1990-03-09");
    $age = $birthday->diff($now);
    $age->y;
    echo "<pre>";
    @print_r($age);
    echo "</pre>";
    exit();
}

}
