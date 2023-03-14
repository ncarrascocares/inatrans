<?php

include_once 'Conexion.php';

class Consola{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function total_consola(){
        $sql = "SELECT la.id_lab, la.nom_lab,don.fec_ven,DATEDIFF(don.fec_ven,curdate()) as 'dias_vigencia',don.identificador,co.id_consola, co.serial_consola
                FROM ordenador ord
                INNER JOIN laboratorio la on ord.laboratorio_id = la.id_lab
                INNER JOIN consola co ON ord.consola_id = co.id_consola
                INNER JOIN dongle don ON co.dongle_id = don.id_dongle
                GROUP BY don.id_dongle;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    function listar_consola(){
        $sql = "SELECT con.id_consola, con.serial_consola, con.serial_pedalera, lab.nom_lab, con.Detalle, don.id_dongle, don.identificador, don.fec_ven, DATEDIFF(don.fec_ven,curdate()) as 'dias_vigencia' FROM consola con 
                INNER JOIN laboratorio lab on con.Ubicacion = lab.id_lab
                INNER JOIN dongle don on con.dongle_id = don.id_dongle;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    function new_consola($serie_equipo, $serie_pedalera, $ubicacion, $dongle, $detalle_consola){
        $sql = "SELECT * FROM consola WHERE serial_consola = :serie";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':serie'=>$serie_equipo));
        $this->objetos=$query->fetchAll();
        if(!empty($this->objetos)){
            echo "consola-existe";
        }else{
            $sql = "SELECT con.*, don.id_dongle, don.identificador FROM consola con 
            inner join dongle don on con.dongle_id = don.id_dongle
            where don.id_dongle = :dongle;";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':dongle'=>$dongle));
            $this->objetos=$query->fetchAll();
            if(!empty($this->objetos)){
                echo "psico-asociado";
            }else{
                $sql = "INSERT INTO consola (serial_consola, serial_pedalera, Ubicacion, Detalle, dongle_id) 
                        VALUES (:serial_consola, :serial_pedalera, :ubicacion, :detalle, :dongle_id)";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(
                    ':serial_consola'=>$serie_equipo, 
                    ':serial_pedalera'=>$serie_pedalera, 
                    ':ubicacion'=>$ubicacion,
                    ':detalle'=>$detalle_consola,
                    ':dongle_id'=>$dongle
                ));
                echo "consola-add";
            }
        }
    }
}