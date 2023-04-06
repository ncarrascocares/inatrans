<?php

include_once '../modelo/Reporte.php';
session_start();

$reporte = new Reporte();

switch ($_POST['funcion']) {
    case 'listar_horas_funcionamiento':
        $json = array();
        $reporte->horas_funcionamiento_simulador();
       
        foreach($reporte->objetos as $r){
            $json[] = array(
                'nombre_simulador'=>$r->nombre_simulador,
                'horas_servicios'=>$r->horas_servicios,
                'total_reportes'=>$r->total_reportes,
                'horas_paradas'=>$r->horas_paradas
            );
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
    
    default:
        # code...
        break;
}