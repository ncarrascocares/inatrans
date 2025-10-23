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
        $sql = "select sub.nombre_sub,sub.detalle_sub,si.Nombre_simulador,ma.nombre_mantenimiento,ma.descripcion_mantenimiento from sub_equipo sub
                left join simulador si on sub.simulador_id = si.id_simulador
                left join mantenimiento ma on sub.mantenimiento_id = ma.id_mantenimiento
                where 1;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    // Función para crear un nuevo sub-equipo
    // En el caso de haber un sub equipo con el mismo nombre para el mismo simulador, no se debe agregar
    function crear($nombre,$detail,$id_sim,$id_man){
        $select = "SELECT id_sub_equipo  FROM sub_equipo WHERE nombre_sub=:nombre AND simulador_id=:id_sim";
        $query = $this->acceso->prepare($select);
        $query->execute(array(':nombre'=>$nombre, ':id_sim'=>$id_sim));
        $this->objetos = $query->fetchAll();
        // Este if valida si ya existe un sub equipo con el mismo nombre para el mismo simulador
        if(!empty($this->objetos)){
            echo 'noadd';
            return;
        }else{ // Si no existe, se procede a insertar el nuevo sub equipo
            $insert = "INSERT INTO sub_equipo (nombre_sub, detalle_sub,simulador_id,mantenimiento_id) VALUES (:nombre, :detalle, :id_sim, :id_man)";
            $query = $this->acceso->prepare($insert);
            $query->execute(array(':nombre'=>$nombre, ':detalle'=>$detail, ':id_sim'=>$id_sim, ':id_man'=>$id_man));
            echo "add";
        }
    }

}


?>