<?php

include_once '../modelo/Dongle.php';
session_start();

$dongle = new Dongle();

switch ($_POST['funcion']) {
    case 'listar_dongle':
        $json = array();
        $dongle->listar_dongle();
        foreach ($dongle->objetos as $objeto) {
            $json[] = array(
            'id_dongle'=>$objeto->id_dongle,
            'identificador'=>$objeto->identificador,
            'fec_ven'=>$objeto->fec_ven
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
    case 'new_dongle':
        $num_serial = strtoupper($_POST['num_serial']);
        $fecha_ven = $_POST['fecha_ven'];
        $dongle->new_dongle($num_serial,$fecha_ven);
        break;
}

?>