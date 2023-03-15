<?php

include_once '../modelo/Laboratorio.php';
session_start();

$lab = new Laboratorio();

switch ($_POST['funcion']) {
    case 'listar_lab':
        $json = array();
        $lab->listar_lab();
        foreach ($lab->objetos as $objeto) {
            $json[] = array(
                'id_lab'=>$objeto->id_lab,
                'nom_lab'=>$objeto->nom_lab,
                'est_lab'=>$objeto->est_lab
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
}

?>