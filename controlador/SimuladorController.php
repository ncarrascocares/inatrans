<?php

include_once '../modelo/Simulador.php';
session_start();

$simulador = new Simulador();


if($_POST['funcion'] == 'estado_simulador'){
    $json = array();
    $simulador->estado_simulador();
    foreach ($simulador->objetos as $objeto) {
        $json[] = array(
            'id_simulador'=>$objeto->id_simulador,
            'nombre_simulador'=>$objeto->nombre_simulador,
            'sucursal_id'=>$objeto->sucursal_id,
            'tipo_simulador'=>$objeto->tipo_simulador,
            'descripcion_simulador'=>$objeto->descripcion_simulador,
            'status_id'=>$objeto->status_id,
            'id_sucursal'=>$objeto->id_sucursal,
            'nombre_sucursal'=>$objeto->nombre_sucursal,
            'id_status'=>$objeto->id_status,
            'nombre_status'=>$objeto->nombre_status,
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
}



?>