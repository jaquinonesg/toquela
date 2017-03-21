<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UtilNovedades
 *
 * @author Jorge Luis Romero Castañeda (jorgeromen27@gmail.com)
 */
class UtilNovedades {

    public function getResumen($text, $limit = 200) {
        $tamano = strlen($text);
        if ($tamano <= $limit) {
            return $text;
        }
        return substr($text, 0, strrpos(substr($text, 0, $limit), " ")) . "...";
    }

}

?>
