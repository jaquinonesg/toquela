<?php

class IndexController extends Controller {


    public function __construct() {
        parent::__construct();
        $this->initVarUser();
    }

    public function index($error = null) {
        $num_noticias = DAOFactory::getNoticiasDAO()->getCountAllPublics();
        if($num_noticias <= 0){
            //$this->_view->assign('noticias',false);
            $this->redireccionar('/registro/');
        }else{
            $this->_view->assign('noticias',true);
            $noticias = DAOFactory::getNoticiasDAO()->getPublics();

            /**Arreglo fecha*/
            foreach ($noticias as $val) {
                $DateArray = explode(' ',$val->date);
                $fecha = explode('-',$DateArray[0]);
                $val->date =  $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0];
            }
            /**fin fecha*/
            
            /**recortar el resumen a 200 letras*/
            for ($i=0; $i < count($noticias); $i++) { 
                $noticias[$i]->resumen = substr($noticias[$i]->resumen,0,200) . '...';
            }
            
            $noticias_slide = array($noticias[0]);
            array_shift($noticias);
            while( $noticias[0]->prioridadhome == 1){
                array_push($noticias_slide,$noticias[0]);
                array_shift($noticias);
            }
            /**recortar el resumen a 200 letras*/
            for ($i=0; $i < count($noticias); $i++) { 
                $noticias[$i]->resumen = substr($noticias[$i]->resumen,0,200) . '...';
            }
            $this->_view->assign("noticia_principal", $noticias_slide);
            $this->_view->assign("mas_noticias",$noticias);
        }
        $this->_view->renderizar();
    }

    public function getNoticia($id){
    	$notice = DAOFactory::getNoticiasDAO()->getPublics();
        print_r($notice);
        echo $n;
        echo is_array($n)?'true':'false';

    }
    
}

