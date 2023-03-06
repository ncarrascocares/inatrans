<?php

//Inlcuir el modelo
include_once '../modelo/Ordenador.php';
session_start();
//Instanciar un objeto del modelo
$ordenador = new Ordenador();

switch ($_POST['funcion']) {
    case 'total_ordenador':
        $json = array();
            $ordenador->total_ordenador();
            foreach ($ordenador->objetos as $objeto) {
                $json[] = array(
                    'id_lab'=>$objeto->id_lab,
                    'nom_lab'=>$objeto->nom_lab,
                    'ordenadores'=>$objeto->ordenadores
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        break;
}



?>