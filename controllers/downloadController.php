<?php

class DownloadController extends Controller {

    private static $PATH;
    private $_attachment;

    public function __construct() {
        parent::__construct();
        $this->validacionSession();
        DownloadController::$PATH = APP_ROOT . 'public/files/attachments/phases/';
    }

    public function index() {
        $this->redireccionar();
    }

    private function download($path) {
        if (is_file($path)) {
            $size = filesize($path);
            if (function_exists('mime_content_type')) {
                $type = mime_content_type($path);
            } else if (function_exists('finfo_file')) {
                $info = finfo_open(FILEINFO_MIME);
                $type = finfo_file($info, $path);
                finfo_close($info);
            }
            if ($type == '') {
                $type = "application/force-download";
            }
            header("Content-Type: $type");
            header("Content-Disposition: attachment; filename={$this->_attachment->name_file}");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $size);
            readfile($path);
            return;
        }
    }

}