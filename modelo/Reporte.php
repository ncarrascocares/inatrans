<?php

include_once 'Conexion.php';

class Reporte{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function horas_funcionamiento_simulador(){
        $sql = "SELECT si.Nombre_simulador,
        ser.horas_servicios,
        count(re.id_reporte) AS 'total_reportes',
        CASE
        WHEN sum(HOUR(TIMEDIFF(re.Fecha_cierre,re.Fecha_crea))) <=0 THEN 1
        ELSE
        sum(HOUR(TIMEDIFF(re.Fecha_cierre,re.Fecha_crea)))
        END AS 'horas_paradas'
        FROM simulador si
        INNER JOIN reporte re ON si.id_simulador = re.Simulador_id
        INNER JOIN servicios ser ON si.servicio_id = ser.id_servicio
        WHERE re.Estatus_reporte = 1 AND re.Fecha_crea BETWEEN '2023-03-01' AND '2023-03-31'
        GROUP BY si.Nombre_simulador,ser.horas_servicios;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

}