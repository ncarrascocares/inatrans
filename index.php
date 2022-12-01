<?php

ob_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/constantes.php';
require_once 'helpers/utils.php';

#Carga de la cabecera
require_once 'views/layout/header.php';
#Carga de la barra lateral
require_once 'views/layout/aside.php';

function show_error()
{
    //Instanaciando un objeto de la clase ErrorController
    $error = new ErrorController();
    //Imbocando al metodo index del clase
    $error->index();
}

if (isset($_GET['controller'])) {
    $nombre_controller = $_GET['controller'].'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controller = controler_default;
} else {
    show_error();
    exit();
}

if (class_exists($nombre_controller)) {
    $controlador = new $nombre_controller();

    if (isset($_GET['action']) && isset($_GET['id']) && method_exists($controlador, $_GET['action'])) {
         // var_dump($controlador);
        // var_dump($_GET['action']);
        // die();
        $action = $_GET['action'];
        $id = (int)$_GET['id'];
        $controlador->$action($id);
        

    } elseif ((isset($_GET['action']) && method_exists($controlador, $_GET['action']))) {
        $action = $_GET['action'];
        $controlador->$action();
        

    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $default = action_default;
        $controlador->$default();
        
    } else {
    
        show_error();
    }
}else {
    
    show_error();
}

#Carga del pie de página
require_once 'views/layout/footer.php';

ob_end_flush();