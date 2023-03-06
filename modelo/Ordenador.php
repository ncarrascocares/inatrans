<?php

include_once 'Conexion.php';

class Ordenador{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function total_ordenador(){
        $sql = "SELECT la.id_lab, la.nom_lab,count(id_ord) as 'ordenadores'
                FROM ordenador ord
                INNER JOIN laboratorio la on ord.laboratorio_id = la.id_lab 
                GROUP BY laboratorio_id;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

}