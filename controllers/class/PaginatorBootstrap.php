<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaginatorJorge
 *
 * @author Jorge Luis Romero Castañeda (jorgeromen27@gmail.com)
 */
class PaginatorBootstrap {

    public $clase_alias;
    public $total_elementos = 0;
    public $num_elementos_por_pagina = 0;
    public $pagina_seleccionada = 1;
    public $num_paginas = 0;
    public $inicio_limit = 0;
    public $fin_limit = 0;
    private $isajax = false;
    private $process = false;

    /**
     * Este paginador construye las variables necesarias y el html necesario para un paginador basado en links o ajax
     * @param String $clase_alias = es una clase adicional que se le agrega al paginador para darle una identificación unica, no puede haber paginadores con la misma clase.
     * @param int $total_elementos = número total de elementos a paginar.
     * @param int $num_elementos_por_pagina = cuantos elementos se quieren ver por pagina.
     * @param int $pagina_seleccionada = la pagina mostrada o seleccionada, por defecto siempre esta la primera (1).
     * @return Object PaginatorBootstrap = 
      (
      [total_elementos] => total de elementos
      [num_elementos_por_pagina] => número de elementos por pagina
      [pagina_seleccionada] => la pagina seleccionada actualemente
      [num_paginas] => número de paginas generadas
      [inicio_limit] => inicio del limite para realizar la consulta.
      [fin_limit] => fin del limite para realizar la consulta.
      )
     */
    function __construct($clase_alias, $total_elementos, $num_elementos_por_pagina, $pagina_seleccionada = 1) {
        if (isset($clase_alias) && is_numeric($total_elementos) && is_numeric($num_elementos_por_pagina) && is_numeric($pagina_seleccionada)) {
            $this->clase_alias = $clase_alias;
            $this->total_elementos = $total_elementos;
            $this->num_elementos_por_pagina = $num_elementos_por_pagina;
            $this->pagina_seleccionada = $pagina_seleccionada;
            $this->loadConfigPaginator();
        }
    }

    /**
     * Carga la configuracion del paginador
     */
    private function loadConfigPaginator() {
        if (($this->total_elementos <= 0) || ($this->num_elementos_por_pagina <= 0) || ($this->pagina_seleccionada <= 0)) {
            return;
        }
        $this->num_paginas = (int) ceil($this->total_elementos / $this->num_elementos_por_pagina);
        if ($this->num_paginas <= 0) {
            $this->num_paginas = 1;
        }
        if ($this->pagina_seleccionada > $this->num_paginas) {
            return;
        }
        $multiplo = (int) ($this->num_elementos_por_pagina * $this->pagina_seleccionada);
        $inicio_limit = ($multiplo - $this->num_elementos_por_pagina);
        if ($inicio_limit < 0) {
            $inicio_limit = 0;
        }
        $this->inicio_limit = $inicio_limit;
        $this->fin_limit = $this->num_elementos_por_pagina;
        $this->process = true;
    }

    /**
     * Retorna la estructura del paginador en HTML.
     * @param boolean $isajax = true, false (Si es false devuelve el HTML con links con el formato de url que se le pase a este mismo método, de lo contrario devuelve el formato html sin links plano, para porder ser utilizado por AJAX)
     * @param int $tamamo = 1, 2 o 3
     * @param String $format_url = es el formato del link que va tener la pagina, ejemplo: "/milink/miscosas/" por defecto agrega al final el numero de la pagina.
     * @return string = html
     */
    public function getHtmlPaginator($isajax = false, $tamamo = 2, $format_url = "") {
        if ($this->process) {
            $this->isajax = $isajax;
            $html = '';
            $classtamano = "";
            $num_paginas_visibles = 5;
            switch ($tamamo) {
                case 1:
                    $classtamano = "pagination pagination-sm";
                    break;
                case 2:
                    $classtamano = "pagination";
                    break;
                case 3:
                    $classtamano = "pagination pagination-lg";
                    break;
                default :
                    $classtamano = "pagination";
                    break;
            }

            $html = '<div class="_paginator_bootstrap ' . $this->clase_alias . '" style="text-align: center;" total_elementos="' . $this->total_elementos . '" num_elementos_por_pagina="' . $this->num_elementos_por_pagina . '" pagina_seleccionada="' . $this->pagina_seleccionada . '" num_paginas="' . $this->num_paginas . '" inicio_limit="' . $this->inicio_limit . '" fin_limit="' . $this->fin_limit . '" isajax="' . ($this->isajax ? 'true' : 'false') . '">'
                    . '<ul class="' . $classtamano . '">'
                    . '<li id="_btn_back" style="cursor: pointer;"><a class="transition-opacity arrow-button">&laquo;</a></li>';

            $htmlcontrols = '<br><div class="controls_paginator">'
                    . '<p>Total resultados: ' . $this->total_elementos . ' &nbsp;&nbsp;&raquo;&nbsp;&nbsp; Total páginas: ' . $this->num_paginas
                    . '&nbsp;&nbsp;&nbsp;<input type="text" class="form-control numeric" id="_txt_ir_pag" value="' . $this->pagina_seleccionada . '" style="display: inline-block;margin-right: 4px;width: 80px;">'
                    . '<button type="button" class="btn btn-default" id="_btn_ir_pag" style="margin-right: 4px;">Ir&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></p></div>';

            $desde = 1;
            $hasta = 1;
            if ($this->num_paginas > 1) {
                $medio = ceil($num_paginas_visibles / 2);
                $inicio_corrimiento = $medio;
                $final_corrimiento = ($this->num_paginas - ($medio - 1));
                $desde = $this->pagina_seleccionada;
                if ($num_paginas_visibles > $this->num_paginas) {
                    $hasta = $this->num_paginas;
                } else {
                    $hasta = $num_paginas_visibles;
                }
                if ($this->pagina_seleccionada > $inicio_corrimiento) {
                    if ($this->pagina_seleccionada >= $final_corrimiento) {
                        $desde = ($this->num_paginas - ($num_paginas_visibles - 1));
                        $hasta = $this->num_paginas;
                    } else {
                        $desde = ($this->pagina_seleccionada - ($medio - 1));
                        $hasta = ($this->pagina_seleccionada + ($medio - 1));
                    }
                } else {
                    $desde = 1;
                }
            }
            for ($p = $desde; $p <= $hasta; $p++) {
                if ($p == $this->pagina_seleccionada) {
                    $html .= '<li class="active _pag" pag="' . $p . '" style="cursor: pointer;"><a class="transition-opacity pager-button">' . $p . '</a></li>';
                } else {
                    if ($this->isajax) {
                        $html .= '<li class="_pag" pag="' . $p . '" style="cursor: pointer;"><a class="transition-opacity pager-button">' . $p . '</a></li>';
                    } else {
                        $html .= '<li class="_pag" pag="' . $p . '" style="cursor: pointer;"><a class="transition-opacity pager-button" href="' . $format_url . $p . '">' . $p . '</a></li>';
                    }
                }
            }
            $html .= '<li id="_btn_next" style="cursor: pointer;"><a class="transition-opacity arrow-button">&raquo;</a></li></ul>' . $htmlcontrols . '</div>';
            return $html;
        }
        return "<p>No se obtuvieron resultados.</p>";
    }

}
