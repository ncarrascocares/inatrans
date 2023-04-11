<?php

include_once 'Conexion.php';

class Servicio{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    //Crear sfuncion para listar los servicios existentes en la tabla de la bd
    function listar_servicios(){
        $sql = "SELECT * FROM servicios";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        return $this->objetos=$query->fetchAll();
    }


}
