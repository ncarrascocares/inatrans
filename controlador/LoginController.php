<?php

include_once '../modelo/Usuario.php';
session_start();
$correo = $_POST['txtEmail'];
$pass = $_POST['txtPassword'];

$usuario = new Usuario();


if (!empty($_SESSION['usuario_tipo'])) {
    switch ($_SESSION['usuario_tipo']) {
        case 1:
            header('Location: ../vista/catalogo.php');
            break;
        case 2:
            header('Location: ../vista/catalogo.php');
            break;
        case 3:
            header('Location: ../vista/catalogo.php');
            break;
        case 4:
            header('Location: ../vista/catalogo.php');
            break;
    }// Fin del switch
}else{

    $usuario->Logearse($correo, $pass);

    //print_r($usuario);
    //die();
    //Validando que la variable usuario->objetos no este vacía
if (!empty($usuario->objetos)) {
    
    foreach ($usuario->objetos as $objeto) {
        
        //Creando las variables de sesion
        $_SESSION['usuario_nombre'] = $objeto->nombre_us .' '. $objeto->apellido_us;

        //Esta variable guaradara el tipo de usuario: 1: administrador, 2: mantenedor, 3: usuario
        $_SESSION['usuario_tipo'] = $objeto->usuario_tipo;
        $_SESSION['correo'] = $objeto->correo_us;
        $_SESSION['id'] = $objeto->id_usuario;

    }

    // Segun el tipo de usuario, el switch nos re dirijira a la pagina correspondiente
    switch ($_SESSION['usuario_tipo']) {
        case 1:
            header('Location: ../vista/catalogo.php');
            break;
        case 2:
            header('Location: ../vista/catalogo.php');
            break;
        case 3:
            header('Location: ../vista/catalogo.php');
            break;
        case 4:
            header('Location: ../vista/catalogo.php');
            break;
    }// Fin del switch
}else{
    header('Location: ../vista/index.php');
}
}
