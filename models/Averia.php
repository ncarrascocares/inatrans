<?php

class Averia{

    private $id;
    private $Nombre_averia;
    private $db;


    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getNombre_averia(){
        return $this->Nombre_averia;
    }

    function setId($id){
        $this->id = (int)$this->db->real_escape_string($id);
    }
    function setNombre_categoria($Nombre_averia){
        $this->Nombre_averia = $this->Nombre_averia->real_escape_string($Nombre_averia);
    }

    public function listarAverias(){
        $sql = "SELECT * FROM averia;";
        $data = $this->db->query($sql);
        $averia = $data;
        return $averia;
    }


}




?>