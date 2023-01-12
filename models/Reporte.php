<?php

//use LDAP\Result;

class Reporte{

    private $id;
    private $id_interno;
    private $simulador_id;
    private $usuario_id;
    private $Averia;
    private $Comentario;
    private $Categoria_id;
    private $Fecha_crea;
    private $Estatus;
    private $Tipo_averia_id;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    //Metodos accesadores get y set
    function getId(){
        return $this->id;
    }
    function getId_interno(){
        return $this->id_interno;
    }
    function getSimulador_id(){
        return $this->simulador_id;
    }
    function getUsuario_id(){
        return $this->usuario_id;
    }
    function getAveria(){
        return $this->Averia;
    }
    function getComentario(){
        return $this->Comentario;
    }
    function getCategoria_id(){
        return $this->Categoria_id;
    }
    function getFecha_crea(){
        return $this->Fecha_crea;
    }
    function getEstatus(){
        return $this->Estatus;
    }
    function getTipo_averia_id(){
        return $this->Tipo_averia_id;
    }


    function setId($id){
        $this->id = (int)$this->db->real_escape_string($id);
    }
    function setId_interno($id_interno){
        $this->id_interno = $this->db->real_escape_string($id_interno);
    }
    function setSimulador_id($simulador_id){
        $this->simulador_id = (int)$this->db->real_escape_string($simulador_id);
    }
    function setUsuario_id($usuario_id){
        $this->usuario_id = (int)$this->db->real_escape_string($usuario_id);
    }
    function setAveria($Averia){
        $this->Averia = $this->db->real_escape_string($Averia);
    }
    function setComentario($Comentario){
        $this->Comentario = $this->db->real_escape_string($Comentario);
    }
    function setCategoria_id($categoria_id){
        $this->Categoria_id = $this->db->real_escape_string($categoria_id);
    }
    function setFecha_crea($fecha_crea){
        $this->Fecha_crea = $this->db->real_escape_string($fecha_crea);
    }
    function setEstatus($estatus){
        $this->Estatus = $this->db->real_escape_string($estatus);
    }
    function setTipo_averia_id($tipo_averia_id){
        $this->Tipo_averia_id = $this->db->real_escape_string($tipo_averia_id);
    }


    //Metodo para realizar consulta y obtener toda la info de la tabla reporte
    public function getAll(){
        $sql = "SELECT reporte.*, simulador.Nombre as 'Simulador', CONCAT(usuario.Nombre,' ',usuario.Apellido) AS 'Tecnico' FROM reporte
        INNER JOIN simulador on reporte.Simulador_id = simulador.id
        INNER JOIN usuario on reporte.Usuario_id = usuario.id;";
        $reporte = $this->db->query($sql);
        return $reporte;

    }

    public function getAllReporte(){
        $sql = "SELECT * FROM reporte ORDER BY id DESC LIMIT 1";
        $resul = $this->db->query($sql);
        $reporte = $resul->fetch_object();
        return $reporte;
    }

    public function save(){
        $sql = "INSERT INTO reporte VALUES (NULL, '{$this->getId_interno()}',{$this->getSimulador_id()},{$this->getUsuario_id()},'{$this->getAveria()}', '{$this->getComentario()}','{$this->getCategoria_id()}','{$this->getFecha_crea()}',1,'{$this->getTipo_averia_id()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }

        return $save;
    }

    public function getOne(){
        $sql = "SELECT reporte.*, simulador.Nombre as 'Simulador', CONCAT(usuario.Nombre,' ',usuario.Apellido) AS 'Tecnico' FROM reporte
        INNER JOIN simulador on reporte.Simulador_id = simulador.id 
        INNER JOIN usuario on reporte.Usuario_id = usuario.id 
        WHERE reporte.id = {$this->getId()};";

       $reporte = $this->db->query($sql);
       return $reporte->fetch_object();
    }

    public function edit(){
        $result = false;
        $sql = "UPDATE reporte 
                SET id_interno          = '{$this->getId_interno()}',
                    Simulador_id        = {$this->getSimulador_id()},
                    Usuario_id          = {$this->getUsuario_id()},
                    Averia              = '{$this->getAveria()}',
                    Comentario          = '{$this->getComentario()}',
                    Categoria_id        = '{$this->getCategoria_id()}',
                    Fecha_crea          = '{$this->getFecha_crea()}',
                    Estatus             = 1,
                    Tipo_averia_id      = '{$this->getTipo_averia_id()}'
                WHERE id = {$this->getId()};";

                //echo $sql;
                //die();
        $update = $this->db->query($sql);
        if($update){
            $result = true;
        }

        return $result;
    }
    
}
