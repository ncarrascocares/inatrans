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

if($_POST['funcion'] == 'guardar_reporte'){
    $id_usuario = $_POST['id_usuario'];
    $simulador_id = $_POST['simulador_id'];
    $instructor = ucfirst($_POST['instructor']);
    $averia_reporte = $_POST['averia_reporte'];
    $comentario_reporte = $_POST['comentario_reporte'];
    $categoria_id = $_POST['categoria_id'];
    $fecha_crea = $_POST['fecha_crea'];
    $tipo_averia_id = $_POST['tipo_averia_id'];

    $reporte->guardar_reportes($id_usuario,$simulador_id,$instructor,$averia_reporte,$comentario_reporte,$categoria_id,$fecha_crea,$tipo_averia_id);
     //die();
    
}