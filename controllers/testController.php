<?php

class TestController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $hola = DAOFactory::getUsersDAO()->queryByEmail($value);
        if (count($hola) > 0) {
            
        }
        /* //$this->_view->renderizar();
          $db = Database::getDatabase();
          $db->query = "select * from usuario";
          $arr = $db->get_results_from_query();
          die("<pre style='color: dimgray;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
          print_r($arr, true) .
          "</pre>"); */

        /* $user = DAOFactory::getUsersDAO()->load(5);
          $city = DAOFactory::getCountryDAO()->load(1);
          die("<pre style='color: dimgray;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
          print_r($user, true) .
          print_r('<br>', true) .
          print_r($city, true) .
          "</pre>");
          /* $tran = new Translator();
          die("<pre style='color: dimgray;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
          print_r($tran->novedad_txt, true) .
          "</pre>");
          $tran->novedades_img; */
    }

    public function url() {
        $url = "https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-prn1/s720x720/544734_10150809514384077_996873718_n.jpg";
        $var = filter_var($url, FILTER_VALIDATE_URL);
        var_dump($var);
        echo "hola leo";
        echo '<img src="https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-prn1/s720x720/544734_10150809514384077_996873718_n.jpg" alt="Smiley face" height="42" width="42">';
    }

    public function update($cod_user, $phone) {
        $user2 = DAOFactory::getUsersDAO()->load($cod_user);


        echo ("<pre style='color: dimgray;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
        print_r($user2, true) .
        "</pre>");
        $user = new Users;
        $user->phone = $phone . " OR '";
        $user->coduser = $cod_user;
        $result = DAOFactory::getUsersDAO()->update($user);
        var_dump($result);
    }

    public function getimage() {
        echo $path = APP_ROOT . "public" . DS . "img" . DS . "users" . DS . "hernana" . DS . "photos";
        @mkdir($path, 777, true);
        $tmp = file_get_contents('https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-frc3/971676_10151593856702745_923135693_n.jpg');
        $file = fopen($path . DS . time() . ".jpg", "w") or exit("Errores en la Creación del Archivo ...");
        fputs($file, $tmp);
        fclose($file);
    }

    public function tfenc() {
        echo utf8_encode('é');
    }

    public function torneos() {
        $players = array('A', 'B', 'C');
        $matchs = array();

        foreach ($players as $k) {
            foreach ($players as $j) {
                if ($k == $j) {
                    continue;
                }
                $z = array($k, $j);
                sort($z);
                if (!in_array($z, $matchs)) {
                    $matchs[] = $z;
                }
            }
        }
        echo "<pre>";
        print_r($matchs);
        echo "</pre>";
    }

    public function login() {
        $obj = DAOFactory::getUsersDAO()->load(1);
        $this->_sesion->user = $obj;
    }

    public function logindestroy() {
        $this->_sesion->__destroy();
    }

    public function testsha() {
        echo sha1("123");
    }

    public function utf() {
        $value = "Intuición";
        print utf8_encode($value);
    }

    public function insertar() {
        for ($i = 1; $i < 20; $i++) {
            $dto = new Team();
            $dto->codlocality = 10;
            $dto->name = "Equipo " . $i;
            $dto->description = "Descripción equipo " . $i;
            $dto->type = 'MALE';
            DAOFactory::getTeamDAO()->insert($dto);
        }
    }

    public function getUsuarios() {
        $user = $this->_sesion->user;
        $cod_user = $user->coduser;
        $usuarios = DAOFactory::getFollowersDAO()->getAmigos($this->_sesion->user->coduser);

        $this->_view->assign('usuarios', $usuarios);
        die("<pre style='color: dimgray;background: black;padding: 50px 30px;font-family: Consolas;font-size: 8pt;word-wrap: break-word;'>" .
                print_r($usuarios, true) .
                "</pre>");
    }

    public function testnovedaes() {
        require_once APP_ROOT . '/controllers/class/UtilNovedades.php';
        $utilnovedades = new UtilNovedades();
        $text = "Lorem ipsum pro te harum pertinax constituam, nec munere labores eloquentiam an. Ut odio feugait interesset mei, vix deserunt periculis ne. Qui id magna decore.";
        $resumen = $utilnovedades->getResumen($text);
        echo "<pre>";
        @print_r($resumen);
        echo "</pre>";
        exit();
    }

    public function ulrpost() {
        $this->opsErrorRedirection("maldito Error");
        echo "<pre>";
        @print_r($this);
        echo "</pre>";
        exit();
    }

    public function jornadas() {
        $jornada_rand = rand(1, 5);


        echo "<pre>";
        @print_r($jornada_rand);
        echo "</pre>";
        exit();
        $arr_jornadas[1] = array(0, 1, 2, 3);
        $arr_jornadas[2] = array(4, 2, 6, 7);
        $arr_jornadas[3] = array(3, 5, 0, 6);
        $arr_jornadas[4] = array();
        echo "<br>jornada libre: " . $this->encontrarJornada($arr_jornadas, 6, 1);
    }

    private function encontrarJornada($arr_jornadas, $cod1, $cod2) {
        foreach ($arr_jornadas as $key => $codigos) {
            foreach ($codigos as $cod) {

                continue;
                echo "<pre>";
                @print_r("cod: " . $cod);
                echo "</pre>";
            }
            echo "<pre>";
            @print_r($key);
            echo "</pre>";
        }
        return null;
    }

    public function arrayrand() {
        $input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
        $rand_keys = array_rand($input);
        echo "<pre>";
        @print_r($rand_keys);
        echo "</pre>";
    }

    public function strarr() {
        $str = "jorge romero castañeda";

        $arr = explode(" ", $str);

        echo "<pre>";
        @print_r($arr);
        echo "</pre>";

        exit();
    }

    public function urlobj() {
        
        $obj_get = $this->get();
        
        $filter = new stdClass();

        $filter->fase = "1";
        $filter->grupo = "2";
        $filter->jornada = "";
        $filter->fechaA = "";
        $filter->fechaB = "";
        $filter->strfilter = "alqueria otra cosa";
        $filter->typefilter = "3";
        
        echo "<pre>";
        @print_r($filter);
        echo "</pre>";
        
        $result = http_build_query($filter);
        
        $result = 'http://localhost/toquela/test/?'. $result;
        
        echo "<pre>";
        @print_r($result);
        echo "</pre>";
        
        $obj = parse_url($result);
        
        echo "<pre>";
        @print_r($obj);
        echo "</pre>";
        
        echo "<pre>";
        @print_r((object) $obj_get);
        echo "</pre>";
        
        exit();
    }
    
    
}
