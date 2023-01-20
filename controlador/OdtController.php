<?php

include_once '../modelo/Odt.php';
session_start();
$id_usuario = $_SESSION['id'];

//Variable global(instancia de la clase Odt)
$reporte = new Odt();

if($_POST['funcion'] == 'listar_reportes'){
    $json = array();
    $reporte->listar_reportes();
    foreach ($reporte->objetos as $objeto) {
        $json['data'][]=$objeto;
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
}