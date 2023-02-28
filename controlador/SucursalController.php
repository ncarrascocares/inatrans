<?php

include_once '../modelo/Sucursal.php';
session_start();

$sucursal = new Sucursal();

switch ($_POST['funcion']) {
    case 'buscar_sucursal':
        $json = array();
        $sucursal->buscar_sucursal();
        foreach ($sucursal->objetos as $objeto) {
            $json[] = array(
                'id_sucursal'=>$objeto->id_sucursal,
                'nombre_sucursal'=>$objeto->nombre_sucursal
            );
        }

        $jsonstring = json_encode($json);
        echo $jsonstring;
        
        break;
}