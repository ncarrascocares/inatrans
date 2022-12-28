<?php

//use LDAP\Result;

class Reporte{

    private $id;
    private $id_interno;
    private $simulador_id;
    private $usuario_id;
    private $reporte_averia;
    private $reporte_solucion;
    private $observacion;
    private $fecha_inicio;
    private $fecha_termino;
    private $hh;
    private $estado_averia;
    private $uso_repuesto;
    private $inventario_id;
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
    function getReporte_averia(){
        return $this->reporte_averia;
    }
    function getReporte_solucion(){
        return $this->reporte_solucion;
    }
    function getObservacion(){
        return $this->observacion;
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
    function getUso_repuesto(){
        return $this->uso_repuesto;
    }
    function getInventario_id(){
        return $this->inventario_id;
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
    function setReporte_averia($reporte_averia){
        $this->reporte_averia = $this->db->real_escape_string($reporte_averia);
    }
    function setReporte_solucion($reporte_solucion){
        $this->reporte_solucion = $this->db->real_escape_string($reporte_solucion);
    }
    function setObservacion($observacion){
        $this->observacion = $this->db->real_escape_string($observacion);
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
    function setUso_repuesto($uso_repuesto){
        $this->uso_repuesto = $this->db->real_escape_string($uso_repuesto);
    }
    function setInventario_id($inventario_id){
        $this->inventario_id = (int)$this->db->real_escape_string($inventario_id);
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
        $sql = "INSERT INTO reporte VALUES (NULL, '{$this->getId_interno()}',{$this->getSimulador_id()},{$this->getUsuario_id()},'{$this->getReporte_averia()}', '{$this->getReporte_solucion()}','{$this->getObservacion()}','{$this->getFecha_inicio()}','{$this->getFecha_termino()}',{$this->gethh()},'{$this->getEstado_averia()}','{$this->getUso_repuesto()}',{$this->getInventario_id()});";
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
                    Reporte_averia      = '{$this->getReporte_averia()}',
                    Reporte_solucion    = '{$this->getReporte_solucion()}',
                    Observacion         = '{$this->getObservacion()}',
                    Fecha_inicio        = '{$this->getFecha_inicio()}',
                    Fecha_termino       = '{$this->getFecha_termino()}',
                    hh                  = {$this->gethh()},
                    Estado_averia       = '{$this->getEstado_averia()}',
                    Uso_repuesto        = '{$this->getUso_repuesto()}',
                    Inventario_id       = {$this->getInventario_id()}
                WHERE id = {$this->getId()};";

                // echo $sql;
                // die();
        $update = $this->db->query($sql);
        if($update){
            $result = true;
        }

        return $result;
    }
    
}
