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

if($_POST['funcion'] == 'listar_reporte_por_id'){
    $json = array();
    $id_reporte = (int)$_POST['dato'];
    $reporte->listar_reportes_id($id_reporte);
    
    foreach ($reporte->objetos as $objeto) {
        $json[]=array(
            'id_historial_reporte'=>$objeto->id_historial_reporte,
            'usuario_id'=>$objeto->usuario_id,
            'reporte_id'=>$objeto->reporte_id,
            'fecha_crea_historial_reporte'=>$objeto->fecha_crea_historial_reporte,
            'comentario_historial_reporte'=>$objeto->comentario_historial_reporte,
            'responsable'=>$objeto->responsable,
            'estatus_reporte'=>$objeto->estatus_reporte
        );
       
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if($_POST['funcion'] == 'insertar_comentario'){
    $id_reporte = (int)$_POST['id_reporte'];
    $comentario = $_POST['new_comentario'];
    $id_usuario = (int)$_POST['id_usuario'];
   
    $reporte->insertar_comentario($id_reporte, $comentario, $id_usuario);
}

if ($_POST['funcion'] == 'borrar_reporte') {
    $id_reporte = (int)$_POST['id_reporte'];
    $id_usuario = (int)$_POST['id_usuario'];
    //Validar que venga un numero asociado a un reporte
    if ($id_reporte == '' && $id_usuario == '') {
        echo 'no-delete';
    }else{
        $reporte->borrar_reporte($id_reporte, $id_usuario);
    }
}