<?php

    class Usuario{

        private $id;
        private $nombre;
        private $apellido;
        private $correo;
        private $password;
        private $status;
        private $tipo_user;
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
        function getApellido(){
            return $this->apellido;
        }
        function getCorreo(){
            return $this->correo;
        }
        function getPassword(){
            return $this->password;
        }
        function getStatus(){
            return $this->status;
        }
        function Tipo_user(){
            return $this->tipo_user;
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
        function setPassword($password){
            $this->password = $this->db->real_escape_string($password);
        }
        function setStatus($status){
            $this->status = $this->db->real_escape_string($status);
        }
        function setTipo_user($tipo_user){
            $this->tipo_user = $this->db->real_escape_string($tipo_user);
        }

        public function AllUsuario(){
            $sql = "SELECT us.id, us.Nombre, us.Apellido, us.Correo, us.password, ti.nombre FROM usuario as us
                    INNER JOIN tipo_usuario as ti on us.usuario_tipo = ti.id
                    WHERE us.Correo = '{$this->getCorreo()}' and us.password = '{$this->getPassword()}';";
 
            $result = $this->db->query($sql);
            $usuarios = $result->fetch_object();
            //  var_dump($usuarios);
            //  die();
            return $usuarios;
        }
        public function Usuarios(){
            $sql = "SELECT * FROM usuario;";
            $result = $this->db->query($sql);
            $usuarios = $result->fetch_object();
            // var_dump($usuarios);
            // die();
            return $usuarios;
        }

    }
