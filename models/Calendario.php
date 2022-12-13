<?php

    class Calendario{

        private $id;
        private $title;
        private $start;
        private $color;
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
        function getStart(){
            return $this->start;
        }
        function getColor(){
            return $this->color;
        }

        //Metodos seteadores
        function setId($id){
            $this->id = (int)$this->db->real_escape_string($id);
        }
        function setTitle($title){
            $this->title = (int)$this->db->real_escape_string($title);
        }
        function setStart($start){
            $this->start = (int)$this->db->real_escape_string($start);
        }
        function setColor($color){
            $this->color = (int)$this->db->real_escape_string($color);
        }

        public function save(){
            $sql = "INSERT INTO eventos VALUES (NULL, '{$this->getTitle()}', '{$this->getStart()}', '{$this->getColor()}');";
            $save = $this->db->query($sql);

            $result = false;
        if($save){
            $result = true;
        }

        return $save;
        }

    }
