<?php

interface IModel {

    /**
     * Obtiene todos los registros de un modelo.
     */
    public function findAll();

    /**
     * Elimina todos los registros de un modelo.
     */
    public function clean();

    /**
     * 
     * @param int $page Página
     * @param int $limit Limite
     */
    public function getByPage($page, $limit);

    /**
     * Obtiene la cantidad de registros de una tabla.
     */
    public function getCountAll();
}