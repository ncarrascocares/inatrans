<?php

include_once 'Conexion.php';

class Simulador{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function cambio_estado($sim, $est){
        $sql = "SELECT id_simulador, status_id FROM simulador WHERE id_simulador = :sim AND status_id != :est;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':sim'=>$sim, ':est'=>$est));
        $this->objetos = $query->fetchAll();
      
        if(!empty($this->objetos)){
            $sql = "UPDATE simulador SET status_id = :est WHERE id_simulador = :sim;";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':sim'=>$sim, ':est'=>$est));
            echo 'yes-update-estado';
        }else{
            echo 'no-update-estado';
        }  
    }

    function listar_simuladores(){
        $sql = "SELECT * FROM simulador";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        return $this->objetos=$query->fetchAll();
    }

    function estado_simulador(){
        $sql = "SELECT *,
		COUNT(CASE WHEN re.Clasificacion = 'Correctivo' THEN re.Clasificacion END) AS 'Correctivo',
        COUNT(CASE WHEN re.Clasificacion = 'Preventivo' THEN re.Clasificacion END) AS 'Preventivo',
        COUNT(CASE WHEN re.Clasificacion = 'Otro' THEN re.Clasificacion END) AS 'Otro',
        count(re.id_reporte) as 'total'
        FROM simulador si
        JOIN sucursal su on si.Sucursal_id = su.id_sucursal
        JOIN status st on si.Status_id = st.id_status
        JOIN reporte re on si.id_simulador = re.Simulador_id
        WHERE si.nombre_simulador like '%Simulador%'
        GROUP BY si.id_simulador, si.Nombre_simulador
        ORDER BY si.id_simulador;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    function estado_laboratorio(){
        $sql = "SELECT * FROM laboratorio;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function crear_equipo($name_equipo, $name_sucursal, $desc_equipo, $tipo_equipo, $servicio){
        $sql = "INSERT INTO simulador (Nombre_simulador, Sucursal_id, Tipo_simulador, Descripcion_simulador, Status_id, servicio_id)
                VALUES ( :name_equipo, :sucursal, :tipo, :descripcion, 1, :servicio);";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':name_equipo'=>$name_equipo,
                              ':sucursal'=>$name_sucursal,
                              ':tipo'=>$tipo_equipo,
                              ':descripcion'=>$desc_equipo,
                              ':servicio'=>$servicio));
        echo 'insertado';
        
    }
}