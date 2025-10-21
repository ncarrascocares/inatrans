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
        $sql = "SELECT * FROM mantenimiento where 1";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    // Función para crear una nueva mantención
    function crear_mantencion($nombre,$descripcion){
        $sql = "INSERT INTO mantenimiento (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre, ':descripcion'=>$descripcion));
    }

}


?>