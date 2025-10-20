<?php

include_once 'Conexion.php';

class Mantenimiento{
    

    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function lista_mantencion(){
        $sql = "SELECT * FROM mantenimiento";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

}


?>