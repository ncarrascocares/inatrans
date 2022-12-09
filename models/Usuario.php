<?php

    class Usuario{

        private $id;
        private $nombre;
        private $apellido;
        private $correo;
        private $sucursal_id;
        private $simulador_id;
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
        function getApellido(){
            $this->apellido;
        }
        function getCorreo(){
            $this->correo;
        }
        function getSucursal_id(){
            $this->sucursal_id;
        }
        function getSimulador_id(){
            $this->simulador_id;
        }
        function getStatus(){
            $this->status;
        }

        function setId($id){
            $this->id = (int)$this->db->real_escape_string($id);
        }
        function setNombre($nombre){
            $this->nombre = $this->db->real_escape_string($nombre);
        }
        function setApellido($apellido){
            $this->apellido = $this->db->real_escape_string($apellido);
        }
        function setCorreo($correo){
            $this->correo = $this->db->real_escape_string($correo);
        }
        function setSucursal_id($sucursal_id){
            $this->sucursal_id = (int)$this->db->real_escape_string($sucursal_id);
        }
        function setStatus($status){
            $this->status = $this->db->real_escape_string($status);
        }

        public function AllUsuario(){
            $sql = "SELECT * FROM usuario;";
            $result = $this->db->query($sql);
            $usuarios = $result;

            return $usuarios;
        }

    }
