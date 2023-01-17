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
                    where us.nombre_us LIKE :consulta;";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':consulta'=>"%$consulta%"));
            $this->objetos=$query->fetchAll();
            return $this->objetos;
        }else{
            $sql = "SELECT * FROM usuario us 
                    JOIN tipo_usuario ti on us.usuario_tipo = ti.id_tipo_usuario
                    JOIN sucursal su on us.Sucursal_id = su.id_sucursal
                    where us.nombre_us NOT LIKE '' ORDER BY id_usuario LIMIT 25;";
            $query = $this->acceso->prepare($sql);
            $query->execute();
            $this->objetos=$query->fetchAll();
            return $this->objetos;
        }
    }
}

?>