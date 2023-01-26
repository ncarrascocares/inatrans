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
        $sql = "SELECT re.id_reporte, re.Simulador_id, re.Averia_reporte, re.Comentario_reporte, re.Fecha_crea, concat(us.Nombre_us,' ',us.Apellido_us) as Responsable, ca.Nombre_categoria, av.Nombre_averia
        FROM reporte re 
        inner join usuario us on re.Usuario_id = us.id_usuario
        inner join categoria ca on re.Categoria_id = ca.id_categoria
        inner join averia av on re.Tipo_averia_id = av.id_averia
        WHERE re.Estatus_reporte != 0;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    function guardar_reportes($id_usuario,$simulador_id,$instructor,$averia_reporte,$comentario_reporte,$categoria_id,$fecha_crea,$tipo_averia_id){
        $sql = "INSERT INTO reporte (Simulador_id, Usuario_id, Instructor, Averia_reporte, Comentario_reporte, Categoria_id, Fecha_crea, Tipo_averia_id) 
                            VALUES (:simulador,:id_usuario, :instructor, :averia_reporte, :comentario,:categoria, :fecha, :tipo)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(  ':simulador' =>$simulador_id,
                                ':id_usuario'=>$id_usuario,
                                ':instructor'=>$instructor,
                                ':averia_reporte'=>$averia_reporte,
                                ':comentario'=>$comentario_reporte,
                                ':categoria'=>$categoria_id,
                                ':fecha'=>$fecha_crea,
                                ':tipo'=>$tipo_averia_id));
        echo "odt-insertada";
    
    }

    function listar_reportes_id($id_reporte){
        $sql = "SELECT * 
                FROM historial_reporte 
                WHERE reporte_id = :id_reporte;";

        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_reporte'=>$id_reporte));
        $this->objetos=$query->fetchAll();
        return $this->objetos;

    }
}