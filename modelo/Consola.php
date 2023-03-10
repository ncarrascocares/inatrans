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
        $sql = "SELECT * FROM consola";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }
}