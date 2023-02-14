<?php

include_once '../modelo/Simulador.php';
include_once '../modelo/Odt.php';
session_start();

$simulador = new Simulador();
$reporte = new Odt();


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
            'total'=>$objeto->total,
            'pre'=>$objeto->preventivo,
            'corr'=>$objeto->correctivo,
            'otro'=>$objeto->otro
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
}

switch ($_POST['funcion']) {
    case 'total_reporte':
        $reporte->listar_all_reporte();
        break;
    
    case 'total_reporte_cerradas':
        $opcion = $_POST['dato'];
        $reporte->listar_all_reporte_cerradas($opcion);
        break;
    case 'total_reporte_abiertas':
        $opcion = $_POST['dato'];
        $reporte->listar_all_reporte_abiertas($opcion);
        break;
    case 'listar_simuladores':
        $json = array();
        $simulador->listar_simuladores();
        foreach ($simulador->objetos as $objeto) {
            $json[] = array(
                'id_simulador'=>$objeto->id_simulador,
                'nombre_simulador'=>$objeto->nombre_simulador,
                'sucursal_id'=>$objeto->sucursal_id,
                'tipo_simulador'=>$objeto->tipo_simulador,
                'descripcion_simulador'=>$objeto->descripcion_simulador,
                'status_id'=>$objeto->status_id
            );
        }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        break;
    case 'cambio_estado':
        $sim = (int)$_POST['sim'];
        $est = (int)$_POST['est'];
        $simulador->cambio_estado($sim, $est);
        break;
}


?>