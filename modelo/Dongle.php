<?php

include_once '../modelo/Conexion.php';

class Dongle{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    
}



?>