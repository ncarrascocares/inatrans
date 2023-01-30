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
        $sql = "SELECT *, concat(us.nombre_us,' ',us.apellido_us) as 'responsable' 
                FROM historial_reporte hi
                JOIN usuario us on usuario_id = id_usuario
                JOIN reporte re on hi.reporte_id = re.id_reporte
                WHERE reporte_id = :id_reporte;";

        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_reporte'=>$id_reporte));
        $this->objetos=$query->fetchAll();
        return $this->objetos;

    }

    function insertar_comentario($id_reporte, $comentario, $id_usuario){
        $sql = "INSERT INTO historial_reporte (usuario_id, reporte_id, comentario_historial_reporte)
                VALUES (:id_usuario, :id_reporte, :comentario);";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_usuario'=>$id_usuario, ':id_reporte'=>$id_reporte,':comentario'=>$comentario));
        
        echo "new_insert";
    }

    function borrar_reporte($id_reporte, $id_usuario){
        date_default_timezone_set(timezoneId: "America/Santiago");
        $fecha = date('Y-m-d H:i:s');
        $comentario = 'Cierre de ODT';

        //echo $fecha;
        //die();
        $sql = "SELECT id_reporte FROM reporte WHERE usuario_id = :usuario_id AND id_reporte = :id_reporte AND estatus_reporte = 1;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':usuario_id'=>$id_usuario, ':id_reporte'=>$id_reporte));
        $this->objetos=$query->fetchAll();
        //var_dump($this->objetos);
        //die();
        if (empty($this->objetos)) {
            echo 'no-delete';
        }else{
            $sql = "UPDATE reporte SET estatus_reporte = 0 WHERE id_reporte = :id_reporte AND usuario_id = :usuario_id;";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_reporte'=>$id_reporte, ':usuario_id'=>$id_usuario));

            $sql_insert = "INSERT INTO historial_reporte (usuario_id, reporte_id, fecha_crea_historial_reporte, comentario_historial_reporte)
                    VALUES (:usuario_id, :reporte_id,:fecha ,:comentario);";
            $query_insert = $this->acceso->prepare($sql_insert);
            $query_insert->execute(array(':usuario_id'=>$id_usuario, ':reporte_id'=>$id_reporte, ':fecha'=>$fecha, ':comentario'=>$comentario ));


            echo 'yes-delete';
        }
        
    }
}