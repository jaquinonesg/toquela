<?php

/**
 * Description of participantesController
 *
 * @author Jhon
 */
class NoticiasController extends Controller {

    /**
     *
     * @var Users 
     */
    private $_user;

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
        $this->_user = $this->_sesion->user;
    }
    public function index($cod_tournament = null) {
        if (!is_null($cod_tournament) && is_numeric($cod_tournament)) {
            $tournament = DAOFactory::getTournamentDAO()->load($cod_tournament);
            if (is_numeric($tournament->codtournament)) {
                $this->_view->assign('tournament', $tournament);
                if($this->_user->codrole == 2)
                    $noticias = DAOFactory::getNoticiasDAO()->getbyTournament($cod_tournament);
                else
                    $noticias = DAOFactory::getNoticiasDAO()->getbyTournament($cod_tournament,$this->_user->coduser);

                $usuarios_temp = DAOFactory::getUsersDAO()->getUsersAll();
                $usuarios = array();
                foreach ($usuarios_temp as $usuario) {
                    $usuarios[$usuario->coduser] = $usuario->name .' '. $usuario->lastname;
                }
                if(!is_null($noticias))
                    foreach ($noticias as $val) {
                        $DateArray = explode(' ',$val->date);
                        $fecha = explode('-',$DateArray[0]);
                        $val->date = date('d/m/y' ,mktime(0,0,0, (int)$fecha[2] , (int)$fecha[1], (int)$fecha[0])) . "\n";
                        //$val->date = strtr( $val->date , $dias_semana );
                    }
                $this->_view->assign('noticias', $noticias);
                $this->_view->assign('usuarios',$usuarios);
                $this->_view->setItems("only", array('participantes.css') );/**No se por que pero se nesecita*/
                //print_r($usuarios);
            
                $this->_view->renderizar();
            }
        }else{
            $this->redireccionar('/ops/error/248');
        }
    }
    public function borrarNoticia($id = null){
        if(!is_null($id) and is_numeric($id)){
            $temp = DAOFactory::getNoticiasDAO()->getbyID($id);
            if( is_null($temp) or $temp == "")
                $answer = array('resp'=>'fail');
            else{
                $answer = array('resp'=>'success');
                DAOFactory::getNoticiasDAO()->borrarNoticia($id);
            }
        }else{
            $answer = array('resp'=>'fail');
        }
        print json_encode( $answer);
    }
    public function setNoticia($torneo){

        $name_img = 'torneo_' . $torneo . '_user_' . $this->_user->coduser ;
        $path_temp = 'public' . DS . 'noticias' . DS . $name_img ;
        $extenciones = array('.jpeg','.jpg','.gif','.png');
        foreach ($extenciones as $ext) {
            if(file_exists(APP_ROOT . $path_temp . $ext))
                $path_temp .= $ext;
        }
        $destino  =  'public/noticias/' . rand() .rand() . DS ;
        $name_des = rand() .'.jpeg';

        $usuario = $this->_sesion->user->coduser;
        $titulo = $this->post('titulo');
        $resumen = $this->post('resumen'); 
        $contenido = $this->post('contenido');
        $type = $this->post('type');

        if(file_exists(APP_ROOT . $path_temp)){
            if(!file_exists(APP_ROOT . $destino)){
                mkdir(APP_ROOT . $destino);
            }
            rename(APP_ROOT . $path_temp,APP_ROOT . $destino . $name_des);
            $loc_img = '/' . $destino . '/' . $name_des;
        }else{
            $loc_img = '/public/noticias/default.jpeg';
        }

        $contenido = str_replace("\n","<br>",$contenido);
        /**quita el ; de los caracteres raros ej: ' " */
        $titulo = str_replace("&#59","",$titulo);
        $contenido = str_replace("&#59","",$contenido);
        $resumen = str_replace("&#59","",$resumen);
        
        DAOFactory::getNoticiasDAO()->setNewNoticia($usuario, $titulo, $resumen, $contenido, $torneo, $type,$loc_img);
        //$id = DAOFactory::getNoticiasDAO()->setNewNoticia($usuario, $titulo, $resumen, $contenido, $torneo, $type);
    }
    /*Funcion para cortar imagenes cuando se habilita en el js croopic*/
    public function saveimg(){

        $imagePath = APP_ROOT . 'public'. DS . 'noticias' . DS ;

        $allowedExts = array("jpeg", "jpg", "JPEG", "JPG",);
        $temp = explode(".", $_FILES["img"]["name"]);
        $extension = end($temp);
        
        //Check write Access to Directory

        if(!is_writable($imagePath)){
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t upload File; no write Access'
            );
            print json_encode($response);
            return;
        }
        
        if ( in_array($extension, $allowedExts))
          {
          if ($_FILES["img"]["error"] > 0)
            {
                 $response = array(
                    "status" => 'error',
                    "message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
                );          
            }
          else
            {
                
              $filename = $_FILES["img"]["tmp_name"];
              list($width, $height) = getimagesize( $filename );

              move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);

              $response = array(
                "status" => 'success',
                "url" => $imagePath.$_FILES["img"]["name"],
                "width" => $width,
                "height" => $height
              );
              
            }
          }
        else
          {
           $response = array(
                "status" => 'error',
                "message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
            );
          }
          
          print json_encode($response);
    }
    /*Funcion para cortar imagenes cuando se habilita en el js croopic*/
    public function cutImg($torneo){
        /**
         * el tamaño de la imagen cortada se controla 
         * desde el css de la pagina que envia el corte
         */

        $imgUrl = $_POST['imgUrl'];
        // original sizes
        $imgInitW = $_POST['imgInitW'];
        $imgInitH = $_POST['imgInitH'];
        // resized sizes
        $imgW = $_POST['imgW'];
        $imgH = $_POST['imgH'];
        // offsets
        $imgY1 = $_POST['imgY1'];
        $imgX1 = $_POST['imgX1'];
        // crop box
        $cropW = $_POST['cropW'];
        $cropH = $_POST['cropH'];
        // rotation angle
        $angle = $_POST['rotation'];

        $jpeg_quality = 100;

        $img_url = 'public' . DS . 'noticias' . DS . 'torneo_' . $torneo . '_user_' . $this->_user->coduser;

        $internal_filename = APP_ROOT . DS . $img_url;
        $external_url = SITE .  DS . $img_url;

        // uncomment line below to save the cropped image in the same location as the original image.
        //$internal_filename = dirname($imgUrl). "/croppedImg_".rand();

        $what = getimagesize($imgUrl);

        $fallo = false;
        switch(strtolower($what['mime']))
        {
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($imgUrl);
                $source_image = imagecreatefromjpeg($imgUrl);
                error_log("jpg");
                $type = '.jpeg';
                break;
            default: 
                $fallo = true;
        }


        //Check write Access to Directory

        if(!is_writable(dirname($internal_filename)) or $fallo){
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t write cropped File'
            );  
        }else{

            // resize the original image to size of editor
            $resizedImage = imagecreatetruecolor($imgW, $imgH);
            imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
            // rotate the rezized image
            $rotated_image = imagerotate($resizedImage, -$angle, 0);
            // find new width & height of rotated image
            $rotated_width = imagesx($rotated_image);
            $rotated_height = imagesy($rotated_image);
            // diff between rotated & original sizes
            $dx = $rotated_width - $imgW;
            $dy = $rotated_height - $imgH;
            // crop rotated image to fit into original rezized rectangle
            $cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
            imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
            imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
            // crop image into selected area
            $final_image = imagecreatetruecolor($cropW, $cropH);
            imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
            imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
            // finally output png image
            //imagepng($final_image, $internal_filename.$type, $png_quality);
            imagejpeg($final_image, $internal_filename.$type, $jpeg_quality);
            $response = Array(
                "status" => 'success',
                "url" => $external_url.$type
            );
        }
        print json_encode($response);
    }

    private function limpiar_carpeta_noticias($archivo = null){
        $extenciones = array('.jpeg','.jpg','.gif','.png');
        $ruta = APP_ROOT . 'public/noticias/';
        foreach ($extenciones as $ext) {
            if(file_exists($ruta . $archivo . $ext))
                if(!unlink($ruta . $archivo . $ext))
                    throw new Exception('Ocurrio un error al eliminar el fichero');
        }
    }
    public function subirImg($torneo = null){
        if(!is_null($torneo) and is_numeric($torneo)){
            $respuesta = null;
            $vector = explode('.', $_FILES['imagen']['name'] );
            $extencion = end($vector); // extraer la extencion del archivo
            $this->limpiar_carpeta_noticias('torneo_' . $torneo . '_user_' . $this->_user->coduser);
            $nombre_img = 'torneo_' . $torneo . '_user_' . $this->_user->coduser . '.'.$extencion; //nuevo nombre de referencia de la imagen
            $destino = "public/noticias/";
            $destino = $destino . $nombre_img;
            if(move_uploaded_file($_FILES['imagen']['tmp_name'], APP_ROOT . $destino)){ 
                $respuesta = array( 'estado' => 'correcto',
                                    'url_img'=> '/' . $destino,
                                    'nombre_orig' => $_FILES['imagen']['name']);
            }else{
                $respuesta = array( 'estado' => 'error',
                                    'msg'    => "Ha ocurrido un error, trate de nuevo!");
            }
            echo json_encode($respuesta);
        }else{
            $this->redireccionar("/ops/error/404");
        }
    }
}