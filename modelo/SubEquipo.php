<?php

include_once 'Conexion.php';

class SubEquipo{
    

    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function listar(){
        $sql = "SELECT * FROM sub_equipo where 1";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    // Función para crear un nuevo sub-equipo
    function crear($nombre,$detail,$id_sim,$id_man){
        $sql = "INSERT INTO sub_equipo (nombre_sub, detalle_sub,simulador_id,mantenimiento_id) VALUES (:nombre, :detalle, :id_sim, :id_man)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':nombre'=>$nombre, ':detalle'=>$detail, ':id_sim'=>$id_sim, ':id_man'=>$id_man));
        echo "add";
    }

}


?>