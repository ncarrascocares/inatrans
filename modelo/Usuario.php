<?php

include_once 'Conexion.php';

class Usuario{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function Logearse($correo, $pass){
        $sql = "SELECT * FROM usuario us 
        inner join tipo_usuario ti on us.usuario_tipo = ti.id_tipo_usuario
        where us.Correo_us=:correo and us.password_us=:pass;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':correo'=>$correo,':pass'=>$pass));
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }
    function obtener_datos($id){
        $sql = "SELECT * FROM usuario us 
        join tipo_usuario ti on us.usuario_tipo = ti.id_tipo_usuario
        join sucursal su on us.Sucursal_id = su.id_sucursal
        where us.id_usuario=:id;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }
    function editar($id_usuario, $sucursal_id, $cargo, $correo){
        $sql = "UPDATE usuario SET Sucursal_id = :sucursal_id, Cargo_us = :cargo, Correo_us = :correo
                WHERE id_usuario = :id_usuario";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario'=>$id_usuario,':sucursal_id'=>$sucursal_id,':cargo'=>$cargo,':correo'=>$correo));
    }
    function cambiar_contra($id_usuario,$nuevapass, $oldpass){
        $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario and password_us = :oldpass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario'=>$id_usuario, ':oldpass'=>$oldpass));
        $this->objetos = $query->fetchAll();
        if (!empty($this->objetos)) {
            $sql = "UPDATE usuario SET password_us = :nuevapass WHERE id_usuario = :id_usuario";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_usuario'=>$id_usuario, ':nuevapass'=>$nuevapass));
            echo "update";
        }else{
            echo "noupdate";
        }
    }

    function buscar(){
        if (!empty($_POST['consulta'])) {
            $consulta=$_POST['consulta'];
            $sql = "SELECT * FROM usuario us 
                    JOIN tipo_usuario ti on us.usuario_tipo = ti.id_tipo_usuario
                    JOIN sucursal su on us.Sucursal_id = su.id_sucursal
                    where us.status_id != 0 and us.nombre_us LIKE :consulta;";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchAll();
            return $this->objetos;
        }else{
            $sql = "SELECT * FROM usuario us 
                    JOIN tipo_usuario ti on us.usuario_tipo = ti.id_tipo_usuario
                    JOIN sucursal su on us.Sucursal_id = su.id_sucursal
                    where us.nombre_us NOT LIKE '' and us.status_us != 0 ORDER BY id_usuario LIMIT 25;";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchAll();
            return $this->objetos;
        }
    }

    function insertar_usuario($nombre_us, $apellido_us, $correo_us, $cargo_us, $sucursal_id, $password_us){
        //Validando que el usuario exista en la bd
        $sql = "SELECT id_usuario FROM usuario WHERE correo_us = :correo";
        $query = $this->acceso->prepare($sql);
        $query->execute(array('correo'=>$correo_us));
        $this->objetos = $query->fetchAll();
        if (!empty($this->objetos)) {
            echo "noadd";
        }else{
            $sql = "INSERT INTO usuario 
            (Nombre_us, Apellido_us, Correo_us, Cargo_us, Sucursal_id, password_us)
            VALUES (:nombre, :apellido, :correo, :cargo, :sucursal, :password);";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre_us, ':apellido'=>$apellido_us, ':correo'=>$correo_us, ':cargo'=>$cargo_us, ':sucursal'=>$sucursal_id, ':password'=>$password_us));
            echo "add";
        }
    }

    function ascender($pass_root, $id_user, $id_usuario){
        $sql = "SELECT id_usuario FROM usuario WHERE id_usuario = :id_usuario and password_us = :pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array('id_usuario'=>$id_usuario, ':pass'=>$pass_root));
        $this->objetos = $query->fetchAll();
        if (!empty($this->objetos)) {
            $sql = "UPDATE usuario SET usuario_tipo = 1 WHERE id_usuario = :id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_user));
            echo "ascendido";
        }else{
            echo "no-ascendido";
        }
    }

    function descender($pass_root, $id_user, $id_usuario){
        $sql = "SELECT id_usuario FROM usuario WHERE id_usuario = :id_usuario and password_us = :pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array('id_usuario'=>$id_usuario, ':pass'=>$pass_root));
        $this->objetos = $query->fetchAll();
        if (!empty($this->objetos)) {
            $sql = "UPDATE usuario SET usuario_tipo = 2 WHERE id_usuario = :id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_user));
            echo "descendido";
        }else{
            echo "no-descendido";
        }
    }

   function borrar_user($pass_root, $id_user, $id_usuario){
    $sql = "SELECT id_usuario FROM usuario WHERE id_usuario = :id_usuario and password_us = :pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array('id_usuario'=>$id_usuario, ':pass'=>$pass_root));
        $this->objetos = $query->fetchAll();
        if (!empty($this->objetos)) {
            $sql = "UPDATE usuario SET status_us = 0 WHERE id_usuario = :id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_user));
            echo "borrado";
        }else{
            echo "no-borrado";
        }
   }
}

?>