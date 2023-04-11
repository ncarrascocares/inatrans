<?php

include_once '../modelo/Servicio.php';

session_start();

$service = new Servicio();

switch ($_POST['funcion']) {
    case 'listar_servicios':
        $json = array();
        $service->listar_servicios();
        foreach ($service->objetos as $objeto) {
            $json[] = array(
                'id_servicio'=>$objeto->id_servicio,
                'nombre_servicio'=>$objeto->nombre_servicio,
                'horas_servicio'=>$objeto->horas_servicios,
                'inicio_servicio'=>$objeto->inicio_servicio,
                'fin_servicio'=>$objeto->fin_servicio
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
    
    default:
        # code...
        break;
}