<?php

    class Calendario{

        private $id;
        private $title;
        private $descripcion;
        private $color;
        private $start;
        private $end;
        private $db;

        public function __construct()
        {
            $this->db = Database::connect();
        }

        function getId(){
            return $this->id;
        }
        function getTitle(){
            return $this->title;
        }
        function getDescripcion(){
            return $this->descripcion;
        }
        function getColor(){
            return $this->color;
        }
        function getStart(){
            return $this->start;
        }
        function getEnd(){
            return $this->end;
        }
      

        //Metodos seteadores
        function setId($id){
            $this->id = (int)$this->db->real_escape_string($id);
        }
        function setTitle($title){
            $this->title = $this->db->real_escape_string($title);
        }
        function setDescripcion($descripcion){
            $this->descripcion = $this->db->real_escape_string($descripcion);
        }
        function setColor($color){
            $this->color = $this->db->real_escape_string($color);
        }
        function setStart($start){
            $this->start = $this->db->real_escape_string($start);
        }
        function setEnd($end){
            $this->end = $this->db->real_escape_string($end);
        }
      

        public function save(){
            $sql = "INSERT INTO eventos VALUES (NULL, '{$this->getTitle()}', '{$this->getDescripcion()}', '{$this->getColor()}', '{$this->getStart()}');";
            $save = $this->db->query($sql);

            $result = false;
        if($save){
            $result = true;
        }

        return $result;
        }

        public function listarEventos(){
            $sql = "SELECT * FROM eventos;";
            $data = $this->db->query($sql);
            
            return $data;
        }

        public function editarEvento(){
            $resultado = false;
            $sql = "UPDATE eventos SET title='{$this->getTitle()}', 
                                       descripcion='{$this->getDescripcion()}',
                                       color='{$this->getColor()}',
                                       start='{$this->getStart()}',
                                       end='{$this->getEnd()}' 
                    WHERE id='{$this->getId()}';";
            $update = $this->db->query($sql);
            if($update){
                $resultado = true;
            }
            return $resultado;
        }

    }
