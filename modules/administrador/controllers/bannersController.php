<?php

/**
 * Description of banner
 *
 * @author DESARROLLO2
 */
class BannersController extends Controller {

    public function __construct() {
        parent::__construct();
        $this->_view->setLayout('administrador');
    }

    public function index() {
        $this->_view->renderizar();
    }

    public function modify() {
        $this->getLibrary("upload" . DS . "class.upload");
        $img = false;

        $handle = new upload($_FILES['file_send']);
        if ($handle->uploaded) {
            $handle->file_new_name_body = $_FILES['file_send']['name'];

            $handle->image_resize = true;
            $handle->image_x = 465;
            $handle->image_ratio_y = true;
            $handle->process(APP_ROOT . "public" . DS . "img" . DS . "banners" . DS);
            if ($handle->processed) {
                $img = "public" . SDS . "img" . SDS . "banners" . SDS . $handle->file_dst_name;
                $handle->clean();
            }
        }
        if (!$img) {
            $banner = new Translator();
            $var = $this->post('target') . "_img";
            $img = $banner->$var;
        }
        $this->creararchivoini(
                array('txt' => $this->post('txt'),
                    'link' => $this->post('link'),
                    'img' => $img,
                    'target' => $this->post('target')
        ));
        $this->_view->_print(array('response' => "el contenido de {$this->post('target')} fue modificado", 'img' => $img));
    }

    private function creararchivoini($data) {
        $data = (object) $data;
        $txt = fopen(APP_ROOT . "contents" . DS . "{$data->target}_text.txt", "w+") or exit("Errores en la creación del contenido...");
        fputs($txt, $data->txt);
        fclose($txt);
        $file = fopen(APP_ROOT . "contents" . DS . "$data->target.ini", "w+") or exit("Errores en la creación del archivo de configuración...");
        fputs($file, "img='$data->img'");
        fputs($file, "\r\n");
        fputs($file, "link='$data->link'");
        fputs($file, "\r\n");
        fputs($file, "txt='{$data->target}_text.txt'");
        fclose($file);
    }

}

?>
