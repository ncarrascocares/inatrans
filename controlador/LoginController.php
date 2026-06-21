<?php

include_once '../modelo/Usuario.php';
session_start();
$correo = $_POST['txtEmail'] ?? '';
$pass = $_POST['txtPassword'] ?? '';

// CSRF check for login (always enforced)
$token = $_POST['csrf_token'] ?? ($_SERVER['HTTP_X_CSRF_TOKEN'] ?? '');
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($token) || !hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
    header('Location: /inatrans/index.php');
    exit;
}

$usuario = new Usuario();


if (!empty($_SESSION['usuario_tipo'])) {
    switch ($_SESSION['usuario_tipo']) {
        case 1:
            header('Location: /inatrans/vista/catalogo.php');
            break;
        case 2:
            header('Location: /inatrans/vista/catalogo.php');
            break;
        case 3:
            header('Location: /inatrans/vista/catalogo.php');
            break;
        case 4:
            header('Location: /inatrans/vista/catalogo.php');
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

        // Regenerar id de sesión tras login
        session_regenerate_id(true);

    }

    // Segun el tipo de usuario, el switch nos re dirijira a la pagina correspondiente
    switch ($_SESSION['usuario_tipo']) {
        case 1:
            header('Location: /inatrans/vista/catalogo.php');
            break;
        case 2:
            header('Location: /inatrans/vista/catalogo.php');
            break;
        case 3:
            header('Location: /inatrans/vista/catalogo.php');
            break;
        case 4:
            header('Location: /inatrans/vista/catalogo.php');
            break;
    }// Fin del switch
}else{
    header('Location: /inatrans/index.php');
}
}
