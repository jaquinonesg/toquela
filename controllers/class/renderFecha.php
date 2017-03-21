<?php

//Darle formato a la fecha 
 class renderFecha {
    
 static public function FormatearFecha($fecha)
    {
        return date("Y-m-d g:i:s A",strtotime($fecha)); 
    }
  
}