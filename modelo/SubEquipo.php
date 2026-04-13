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

    function listar($id_simulador = ''){
        $sql = "SELECT se.id_sub_equipo, se.nombre_sub, se.detalle_sub, s.nombre_simulador, m.nombre_mantenimiento, m.descripcion_mantenimiento
                FROM sub_equipo se
                JOIN simulador s ON se.simulador_id = s.id_simulador
                JOIN mantenimiento m ON se.mantenimiento_id = m.id_mantenimiento";

        // Solo agrega el WHERE si viene un simulador seleccionado
        if (!empty($id_simulador)) {
            $sql .= " WHERE se.simulador_id = :id_simulador";
        }

        $query = $this->acceso->prepare($sql);

        if (!empty($id_simulador)) {
            $query->execute(array(':id_simulador' => $id_simulador));
        } else {
            $query->execute();
        }

        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function listar_pag($pagina){
        switch ($pagina) {
            case 1:
                $inicio = 0;
                $cantidad = 5;
                break;
            case 2:
                $inicio = 5;
                $cantidad = 5;
                break;
            case 3:
                $inicio = 10;
                $cantidad = 5;
                break;
            case 4:
                $inicio = 15;
                $cantidad = 5;
                break;
            default:
                $inicio = 0;
                $cantidad = 5;
                break;
        }
        $sql="SELECT se.id_sub_equipo, se.nombre_sub, se.detalle_sub, s.nombre_simulador, m.nombre_mantenimiento, m.descripcion_mantenimiento
        FROM sub_equipo se
        JOIN simulador s ON se.simulador_id = s.id_simulador
        JOIN mantenimiento m ON se.mantenimiento_id = m.id_mantenimiento
        LIMIT :inicio, :cantidad";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':inicio'=>$inicio, ':cantidad'=>$cantidad));
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

    function listar_sub($id_simulador = '') {
        if (!empty($id_simulador)) {
            // Con filtro por simulador
            $select = "SELECT s.nombre_sub, s.detalle_sub, sim.nombre_simulador AS sim, 
                            m.nom_manten AS mante, s.descripcion AS descrip, s.id_sub_equipo AS id
                    FROM sub_equipo s
                    JOIN simulador sim ON s.simulador_id = sim.id_simulador
                    JOIN mantenimiento m ON s.mantenimiento_id = m.id_manten
                    WHERE s.simulador_id = :id_simulador";

            $query = $this->acceso->prepare($select);
            $query->execute(array(':id_simulador' => $id_simulador));
        } else {
            // Sin filtro, trae todos
            $select = "SELECT s.nombre_sub, s.detalle_sub, sim.nombre_simulador AS sim, 
                            m.nom_manten AS mante, s.descripcion AS descrip, s.id_sub_equipo AS id
                    FROM sub_equipo s
                    JOIN simulador sim ON s.simulador_id = sim.id_simulador
                    JOIN mantenimiento m ON s.mantenimiento_id = m.id_manten";

            $query = $this->acceso->prepare($select);
            $query->execute();
        }

        $this->objetos = $query->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($this->objetos);
    }

}


?>