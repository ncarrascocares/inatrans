<?php

//use LDAP\Result;

class Reporte{

    private $id;
    private $id_interno;
    private $simulador_id;
    private $usuario_id;
    private $Averia;
    private $Solucion;
    private $Categoria;
    private $fecha_inicio;
    private $fecha_termino;
    private $hh;
    private $estado_averia;
    private $tipo_averia_id;
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
    function getSolucion(){
        return $this->Solucion;
    }
    function getCategoria(){
        return $this->Categoria;
    }
    function getFecha_inicio(){
        return $this->fecha_inicio;
    }
    function getFecha_termino(){
        return $this->fecha_termino;
    }
    function gethh(){
        return $this->hh;
    }
    function getEstado_averia(){
        return $this->estado_averia;
    }
    function getTipo_averia_id(){
        return $this->tipo_averia_id;
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
    function setSolucion($Solucion){
        $this->Solucion = $this->db->real_escape_string($Solucion);
    }
    function setCategoria($categoria){
        $this->Categoria = $this->db->real_escape_string($categoria);
    }
    function setFecha_inicio($fecha_inicio){
        $this->fecha_inicio = $this->db->real_escape_string($fecha_inicio);
    }
    function setFecha_termino($fecha_termino){
        $this->fecha_termino = $this->db->real_escape_string($fecha_termino);
    }
    function sethh($hh){
        $this->hh = (int)$this->db->real_escape_string($hh);
    }
    function setEstado_averia($estado_averia){
        $this->estado_averia = $this->db->real_escape_string($estado_averia);
    }
    function setTipo_averia_id($tipo_averia_id){
        $this->tipo_averia_id = $this->db->real_escape_string($tipo_averia_id);
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
        $sql = "INSERT INTO reporte VALUES (NULL, '{$this->getId_interno()}',{$this->getSimulador_id()},{$this->getUsuario_id()},'{$this->getAveria()}', '{$this->getSolucion()}','{$this->getCategoria()}','{$this->getFecha_inicio()}','{$this->getFecha_termino()}',{$this->gethh()},'{$this->getEstado_averia()}','{$this->getTipo_averia_id()}');";
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
                    Solucion            = '{$this->getSolucion()}',
                    Categoria_id         = '{$this->getCategoria()}',
                    Fecha_inicio        = '{$this->getFecha_inicio()}',
                    Fecha_termino       = '{$this->getFecha_termino()}',
                    hh                  = {$this->gethh()},
                    Estado_averia       = '{$this->getEstado_averia()}'
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
