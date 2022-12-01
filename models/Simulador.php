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
            $this->nombre;
        }
        function getSucursal_id(){
            $this->sucursal_id;
        }
        function getUsuario_id(){
            $this->usuario_id;
        }
        function getTipo(){
            $this->tipo;
        }
        function getDescripcion(){
            $this->descripcion;
        }
        function getStatus(){
            $this->status;
        }

        function setId($id){
            $this->id = $id;
        }
        function setNombre($nombre){
            $this->nombre = $nombre;
        }
        function setSucursal_id($sucursal_id){
            $this->sucursal_id = $sucursal_id;
        }
        function setUsuario_id($usuario_id){
            $this->usuario_id = $usuario_id;
        }
        function setTipo($tipo){
            $this->tipo = $tipo;
        }
        function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }
        function setStatus($status){
            $this->status = $status;
        }




    }
