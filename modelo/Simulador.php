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
        $sql = "SELECT *,
		COUNT(CASE WHEN re.Clasificacion = 'Correctivo' THEN re.Clasificacion END) AS 'Correctivo',
        COUNT(CASE WHEN re.Clasificacion = 'Preventivo' THEN re.Clasificacion END) AS 'Preventivo',
        count(re.id_reporte) as 'total'
        FROM simulador si
        JOIN sucursal su on si.Sucursal_id = su.id_sucursal
        JOIN status st on si.Status_id = st.id_status
        JOIN reporte re on si.id_simulador = re.Simulador_id
        GROUP BY si.id_simulador, si.Nombre_simulador
        ORDER BY si.id_simulador;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }
}