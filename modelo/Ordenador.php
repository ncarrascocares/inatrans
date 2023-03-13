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

    function insert_ordenador($marca, $modelo, $sis_ope, $av, $consola, $lab, $desc){
        $sql = "INSERT INTO ordenador (marca_ord, mod_ord, sis_ope, antivirus, Detalle, consola_id, laboratorio_id) VALUES (:marca, :modelo, :so, :av, :descri, :consola, :lab)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':marca'=>$marca,
                              ':modelo'=>$modelo,
                              ':so'=>$sis_ope,
                              ':av'=>$av,
                              ':consola'=>$consola,
                              ':lab'=>$lab,
                              ':descri'=>$desc));
        echo "insert_new_ordenador";
    }

}