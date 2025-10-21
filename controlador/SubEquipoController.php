<?php

include_once '../modelo/SubEquipo.php';
session_start();

$sub = new SubEquipo();

switch ($_POST['funcion']) {
    case 'listar_mantencion':
        $json = array();
        $sub->listar();
        foreach ($this->sub->objetos as $objeto) {
            $json[] = array(
            'id_manten'=>$objeto->id_mantenimiento,
            'nom_manten'=>$objeto->nombre_mantenimiento,
            'desc_manten'=>$objeto->descripcion_mantenimiento
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
    case 'nuevo_sub':
        // name, sim, manten, detalle
        // Para este caso se debera realizar la logica para agregar una nueva mantencion
        // validar los datos antes de enviarlos al modelo
        $nombre = ucfirst(trim($_POST['name'])); // Quitando los espacios y poniendo la primera letra en mayuscula
        $id_sim = (int) trim($_POST['sim']); // parseando a entero el id del simulador
        $id_man = (int) trim($_POST['manten']);
        $detail = ucfirst(trim($_POST['detalle']));
        $sub->crear($nombre,$detail,$id_sim,$id_man); // aca deben ir los parametros necesarios para crear una mantencion}
        break;
}

?>