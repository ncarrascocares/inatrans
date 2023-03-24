<?php

include_once 'Conexion.php';

class Ordenador{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function total_ordenador(){
        $sql = "SELECT la.id_lab, la.nom_lab,count(id_ord) as 'ordenadores'
                FROM ordenador ord
                INNER JOIN laboratorio la on ord.laboratorio_id = la.id_lab 
                GROUP BY laboratorio_id;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    function insert_ordenador($marca, $modelo, $sis_ope, $av, $consola, $lab, $desc){
        $sql = "INSERT INTO ordenador (marca_ord, mod_ord, sis_ope, antivirus, Detalle, consola_id, laboratorio_id) VALUES (:marca, :modelo, :so, :av, :descri, :consola, :lab)";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':marca'=>$marca,
                              ':modelo'=>$modelo,
                              ':so'=>$sis_ope,
                              ':av'=>$av,
                              ':consola'=>$consola,
                              ':lab'=>$lab,
                              ':descri'=>$desc));
        echo "insert_new_ordenador";
    }

    function lista_ordenador(){
        $sql = "SELECT ord.*, con.serial_consola
                FROM ordenador ord
                LEFT join consola con on ord.consola_id = con.id_consola
                GROUP BY con.serial_consola, ord.id_ord;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }
    function selectOrdenador($id_ordenador){
        $sql = "SELECT ord.*, con.serial_consola
                FROM ordenador ord
                LEFT join consola con on ord.consola_id = con.id_consola
                WHERE ord.id_ord = :id_ord;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_ord'=>$id_ordenador));
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }
    function update_ordenador($id_ordenador,$marca,$modelo,$sis_ope,$av,$consola_psico,$labo,$detalle){
        $sql = "SELECT * FROM ordenador WHERE id_ord = :id_ord, consola_id = :con_id;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_ord'=>$id_ordenador,':con_id'=>$consola_psico));
        $this->objetos=$query->fetchAll();

        if($consola_psico == 0){
            $sql = "UPDATE ordenador SET marca_ord=:marca,mod_ord=:modelo,sis_ope=:sistema,antivirus=:av,Detalle=:deta,consola_id=:con_id,laboratorio_id=:lab WHERE id_ord = :id_ord;";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_ord'=>$id_ordenador,
                                  ':marca'=>$marca,
                                  ':modelo'=>$modelo,
                                  ':sistema'=>$sis_ope,
                                  ':av'=>$av,
                                  ':deta'=>$detalle,
                                  ':con_id'=>$consola_psico,
                                  ':lab'=>$labo));
            echo 'update-ok';
        }

        if($this->objetos['id_ord'] == $consola_psico){
            $sql = "UPDATE ordenador SET marca_ord=:marca,mod_ord=:modelo,sis_ope=:sistema,antivirus=:av,Detalle=:deta,consola_id=:con_id,laboratorio_id=:lab WHERE id_ord = :id_ord;";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_ord'=>$id_ordenador,
                                  ':marca'=>$marca,
                                  ':modelo'=>$modelo,
                                  ':sistema'=>$sis_ope,
                                  ':av'=>$av,
                                  ':deta'=>$detalle,
                                  ':con_id'=>$consola_psico,
                                  ':lab'=>$labo));
            echo 'update-ok';
            if (!empty($this->objetos)) {
                echo 'consola-ocupada';
            }else{
                $sql = "UPDATE ordenador SET marca_ord=:marca,mod_ord=:modelo,sis_ope=:sistema,antivirus=:av,Detalle=:deta,consola_id=:con_id,laboratorio_id=:lab WHERE id_ord = :id_ord;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id_ord'=>$id_ordenador,
                                  ':marca'=>$marca,
                                  ':modelo'=>$modelo,
                                  ':sistema'=>$sis_ope,
                                  ':av'=>$av,
                                  ':deta'=>$detalle,
                                  ':con_id'=>$consola_psico,
                                  ':lab'=>$labo));
                echo 'update-ok';
            }
        }
    }

}