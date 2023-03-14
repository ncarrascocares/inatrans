<?php

include_once '../modelo/Conexion.php';

class Dongle{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }
    
    function listar_dongle(){
        $sql = "SELECT * FROM dongle";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    function new_dongle($num_serial,$fecha_ven){
        $sql = "SELECT * FROM dongle WHERE identificador = :num_serial;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':num_serial'=>$num_serial));
        $this->objetos=$query->fetchAll();
        if(!empty($this->objetos)){
            echo 'dongle-existe';
        }else{
            $sql = "INSERT INTO dongle(identificador, fec_ven) VALUES (:num_serial,:fec_ven)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':num_serial'=>$num_serial,'fec_ven'=>$fecha_ven));
            echo 'dongle-add';
        }
    }
}



?>