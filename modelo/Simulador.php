<?php

include_once 'Conexion.php';

class Simulador{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function estado_simulador(){
        $sql = "SELECT * FROM simulador si
        JOIN sucursal su on si.Sucursal_id = su.id_sucursal
        JOIN status st on si.Status_id = st.id_status
        ORDER BY si.id_simulador;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }
}