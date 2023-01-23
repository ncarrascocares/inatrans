<?php

include_once 'Conexion.php';

class Odt{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function listar_reportes(){
        $sql = "SELECT re.id_interno, re.Simulador_id, re.Averia_reporte, re.Comentario_reporte, re.Fecha_crea, concat(us.Nombre_us,' ',us.Apellido_us) as Responsable, ca.Nombre_categoria, av.Nombre_averia
        FROM reporte re 
        inner join usuario us on re.Usuario_id = us.id_usuario
        inner join categoria ca on re.Categoria_id = ca.id_categoria
        inner join averia av on re.Tipo_averia_id = av.id_averia
        WHERE RE.Estatus_reporte != 0;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }
}