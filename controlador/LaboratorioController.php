<?php

include_once '../modelo/Laboratorio.php';
session_start();

$lab = new Laboratorio();
switch ($_POST['funcion']) {
    case 'listar_lab':
        # code...
        break;
    
    default:
        # code...
        break;
}

?>