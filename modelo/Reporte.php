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
        /**Corroborar los datos para que nos arroje las fechas correspondientes
         * en estos momentos el where no esta siendo dinamico y tiene valores
         * introducidos manualmente
         */
        $sql = "SELECT si.Nombre_simulador,
                si.servicio_id,
                ser.nombre_servicio ,
                re.id_reporte, 
                re.Fecha_crea, 
                re.Fecha_cierre,
                DATEDIFF(re.Fecha_cierre,re.Fecha_crea) as 'dias',
                CASE  
                WHEN DATEDIFF(re.Fecha_cierre,re.Fecha_crea) > 0 then (DATEDIFF(re.Fecha_cierre,re.Fecha_crea)*12)
                WHEN DATEDIFF(re.Fecha_cierre,re.Fecha_crea) <= 0 then TIMEDIFF(re.Fecha_cierre,re.Fecha_crea)
                END AS 'Horas de trabajo',
                CASE
                WHEN HOUR(TIMEDIFF(re.Fecha_cierre,re.Fecha_crea)) <=0 THEN 1
                ELSE
                HOUR(TIMEDIFF(re.Fecha_cierre,re.Fecha_crea))
                END AS 'test'
                FROM simulador si
                INNER JOIN reporte re on si.id_simulador = re.Simulador_id
                INNER JOIN servicios ser on si.servicio_id = ser.id_servicio
                WHERE re.Estatus_reporte = 1 AND re.id_reporte = 18  
                GROUP BY si.Nombre_simulador,si.Nombre_simulador, si.servicio_id,ser.nombre_servicio ,re.id_reporte, re.Fecha_crea, re.Fecha_cierre;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

}