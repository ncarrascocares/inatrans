<?php

class Categoria{

    private $id;
    private $Nombre_categoria;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }
    function getNombre_categoria(){
        return $this->Nombre_categoria;
    }

    function setId($id){
        $this->id = (int)$this->db->real_escape_string($id);
    }
    function setNombre_categoria($Nombre_categoria){
        $this->Nombre_categoria = $this->Nombre_categoria->real_escape_string($Nombre_categoria);
    }

    public function listarCategorias(){
        $sql = "SELECT * FROM categoria;";
        $data = $this->db->query($sql);
        $categoria = $data;
        return $categoria;
    }

}
