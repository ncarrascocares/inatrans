<?php

include_once '../modelo/Mantencion.php';
session_start();

$man = new Mantenimiento();

switch ($_POST['funcion']) {
    case 'listar_mantencion':
        $json = array();
        $man->lista_mantencion();
        foreach ($man->objetos as $objeto) {
            $json[] = array(
            'id_manten'=>$objeto->id_mantenimiento,
            'nom_manten'=>$objeto->nombre_mantenimiento,
            'desc_manten'=>$objeto->descripcion_mantenimiento
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
    
}

?>