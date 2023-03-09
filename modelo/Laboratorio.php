<?php

include_once 'Conexion.php';

class Laboratorio{
    

    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function listar_lab(){
        
    }
}


?>