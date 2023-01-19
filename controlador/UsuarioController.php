<?php

include_once '../modelo/Usuario.php';
session_start();
$id_usuario = $_SESSION['id'];

//Variable global(instancia de la clase Usuario)
$usuario = new Usuario();

if ($_POST['funcion'] == 'buscar_usuario') {
    $json = array();
    $usuario->obtener_datos($_POST['dato']);
    foreach ($usuario->objetos as $objeto) {
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellido'=>$objeto->apellido_us,
            'correo_us'=>$objeto->correo_us,
            'cargo_us'=>$objeto->cargo_us, 
            'sucursal_id'=>$objeto->sucursal_id,
            'password_us'=>$objeto->password_us,
            'status_us'=>$objeto->status_us,
            'usuario_tipo'=>$objeto->usuario_tipo,
            'id_tipo_usuario'=>$objeto->id_tipo_usuario,
            'nombre_tipo_usuario'=>$objeto->nombre_tipo_usuario,
            'id_sucursal'=>$objeto->id_sucursal,
            'nombre_sucursal'=>$objeto->nombre_sucursal 
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'capturar_datos') {
    $json = array();
    $id_usuario = $_POST['id_usuario'];

    $usuario->obtener_datos($id_usuario);
    foreach ($usuario->objetos as $objeto) {
        $json[]=array(
            'correo_us'=>$objeto->correo_us,
            'cargo_us'=>$objeto->cargo_us, 
            'sucursal_id'=>$objeto->sucursal_id,
            'password_us'=>$objeto->password_us,
            'status_us'=>$objeto->status_us,
            'usuario_tipo'=>$objeto->usuario_tipo,
            'id_tipo_usuario'=>$objeto->id_tipo_usuario,
            'nombre_tipo_usuario'=>$objeto->nombre_tipo_usuario,
            'id_sucursal'=>$objeto->id_sucursal,
            'nombre_sucursal'=>$objeto->nombre_sucursal 
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'editar-usuario') {
    $sucursal_id = '';
    $id_usuario = $_POST['id_usuario'];
    $sucursal = ucfirst($_POST['sucursal']);
    $cargo = $_POST['cargo'];
    $correo = $_POST['correo'];


    switch ($sucursal) {
        case 'Antofagasta':
            $sucursal_id = 1;
            break;
        case 'Iquique':
            $sucursal_id = 2;
            break;
        case 'Santiago':
            $sucursal_id = 3;
            break;
    }

    $usuario->editar($id_usuario, $sucursal_id, $cargo, $correo);
    echo 'user-editado';

}

if($_POST['funcion'] == 'cambiar-contra'){
    $id_usuario = $_POST['id_usuario']; 
    $newcontra = $_POST['newpass'];
    $oldpass = $_POST['oldpass'];
    $usuario->cambiar_contra($id_usuario,$newcontra,$oldpass);
}

if ($_POST['funcion'] == 'buscar_usuario_gestion') {
    $json = array();
    $usuario->buscar();
    foreach ($usuario->objetos as $objeto) {
        $json[]=array(
            'id'=>$objeto->id_usuario,
            'nombre'=>$objeto->nombre_us,
            'apellido'=>$objeto->apellido_us,
            'correo_us'=>$objeto->correo_us,
            'cargo_us'=>$objeto->cargo_us, 
            'sucursal_id'=>$objeto->sucursal_id,
            'password_us'=>$objeto->password_us,
            'status_us'=>$objeto->status_us,
            'usuario_tipo'=>$objeto->usuario_tipo,
            'id_tipo_usuario'=>$objeto->id_tipo_usuario,
            'nombre_tipo_usuario'=>$objeto->nombre_tipo_usuario,
            'id_sucursal'=>$objeto->id_sucursal,
            'nombre_sucursal'=>$objeto->nombre_sucursal 
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;
}

if ($_POST['funcion'] == 'crear_usuario') {
    
    $nombre_us = ucfirst($_POST['nombre_us']);
    $apellido_us = ucfirst($_POST['apellido_us']);
    $correo_us = $_POST['correo_us'];
    $cargo_us = ucfirst($_POST['cargo_us']);
    $sucursal_id = (int)$_POST['sucursal_id'];
    $password_us = $_POST['password_us'];
      
    $usuario->insertar_usuario($nombre_us, $apellido_us, $correo_us, $cargo_us, $sucursal_id, $password_us);

}

if ($_POST['funcion'] == 'ascender') {
    
    $pass_root = $_POST['pass_root'];
    $id_ascendido = $_POST['id_user'];
      
    $usuario->ascender($pass_root, $id_ascendido, $id_usuario);

}

if ($_POST['funcion'] == 'descender') {
    
    $pass_root = $_POST['pass_root'];
    $id_descendido = $_POST['id_user'];
      
    $usuario->descender($pass_root, $id_descendido, $id_usuario);

}

if ($_POST['funcion'] == 'borrar_user') {
    
    $pass_root = $_POST['pass_root'];
    $id_descendido = $_POST['id_user'];
      
    $usuario->borrar_user($pass_root, $id_descendido, $id_usuario);

}

?>