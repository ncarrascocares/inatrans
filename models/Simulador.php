<?php

    class Simulador{

        private $id;
        private $nombre;
        private $sucursal_id;
        private $usuario_id;
        private $tipo;
        private $descripcion;
        private $status;
        private $db;

        public function __construct()
        {
            $this->db = Database::connect();
        }

        //Metodos accesadores get y set
        function getId(){
            return $this->id;
        }
        function getNombre(){
            return $this->nombre;
        }
        function getSucursal_id(){
            return $this->sucursal_id;
        }
        function getTipo(){
            return $this->tipo;
        }
        function getDescripcion(){
            return $this->descripcion;
        }
        function getStatus(){
            return $this->status;
        }

        function setId($id){
            $this->id = (int)$this->db->real_escape_string($id);
        }
        function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }
        function setSucursal_id($sucursal_id){
            $this->sucursal_id = (int)$this->db->real_escape_string($sucursal_id);
        }
        function setTipo($tipo){
            $this->tipo = $this->db->real_escape_string($tipo);
        }
        function setDescripcion($descripcion){
            $this->descripcion = $this->db->real_escape_string($descripcion);
        }
        function setStatus($status){
            $this->status = $this->db->real_escape_string($status);
        }

        public function infoAllSimulador(){
            $sql = "SELECT * FROM simulador;";
            $result = $this->db->query($sql);
            $simulador = $result;

            return $simulador;
        }

        public function reportForSimulador(){
            $sql = "SELECT reporte.*, simulador.Nombre as 'Simulador', CONCAT(usuario.Nombre,' ',usuario.Apellido) AS 'Tecnico' FROM reporte
            INNER JOIN simulador on reporte.Simulador_id = simulador.id
            INNER JOIN usuario on reporte.Usuario_id = usuario.id
            WHERE reporte.Simulador_id = {$this->getId()};";
            $result = $this->db->query($sql);
            $simulador = $result;
            return $simulador;
        }



    }
