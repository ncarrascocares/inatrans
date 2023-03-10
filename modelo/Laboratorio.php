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
        $sql = "SELECT * FROM laboratorio";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }
}


?>