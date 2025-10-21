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
    case 'new_mantencion':

        // Para este caso se debera realizar la logica para agregar una nueva mantencion
        // validar los datos antes de enviarlos al modelo
        $nombre = ucfirst(trim($_POST['nombre'])); // Quitando los espacios y poniendo la primera letra en mayuscula
        $nombre = ucfirst(trim($_POST['descripcion'])); // Quitando los espacios y poniendo la primera letra en mayuscula
        $man->crear_mantencion($_POST['nombre'], $_POST['descripcion']); // aca deben ir los parametros necesarios para crear una mantencion
        break;
}

?>