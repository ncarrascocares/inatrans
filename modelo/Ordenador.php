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
        $a = array();
        $b = false;
        $resultado = array();
        $sql = "SELECT * FROM ordenador WHERE id_ord = :id_ord;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_ord'=>$id_ordenador));
        $this->objetos=$query->fetchObject();
        $resultado = $this->objetos;
        //print_r($resultado);
        //     (
        //     [id_ord] => 4
        //     [marca_ord] => DELL
        //     [mod_ord] => DELL 1414
        //     [sis_ope] => WIN 11
        //     [antivirus] => 1
        //     [detalle] => Ordenador para cursos e-learningGGGG
        //     [consola_id] => 0
        //     [laboratorio_id] => 1

        //Validar que todos los datos sean los mismos, en el caso de haber un dato distinto se realizara la modificación respectiva
        if($resultado->marca_ord == $marca && $resultado->mod_ord == $modelo && $resultado->sis_ope == $sis_ope && $resultado->antivirus == $av && $resultado->detalle == $detalle && $resultado->laboratorio_id == $labo && $resultado->consola_id == $consola_psico){
           $a;
        }else{
            if ($resultado->marca_ord != $marca) {
                $sql = "UPDATE ordenador SET marca_ord=:marca WHERE id_ord = :id_ord;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id_ord'=>$id_ordenador,
                                      ':marca'=>$marca));
                array_push($a,'marca_update');
            }else{
                array_push($a,'marca_no_update');
            }
            if ($resultado->mod_ord != $modelo) {
                $sql = "UPDATE ordenador SET mod_ord=:modelo WHERE id_ord = :id_ord;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id_ord'=>$id_ordenador,
                                      ':modelo'=>$modelo));
                array_push($a,'modelo_update');
            }else{
                array_push($a,'modelo_no_update');
            }
            if ($resultado->sis_ope != $sis_ope) {
                $sql = "UPDATE ordenador SET sis_ope=:sis_ope WHERE id_ord = :id_ord;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id_ord'=>$id_ordenador,
                                      ':sis_ope'=>$sis_ope));
                array_push($a,'so_update');
            }else{
                array_push($a,'so_no_update');
            }
            if ($resultado->antivirus != $av) {
                $sql = "UPDATE ordenador SET antivirus=:antivirus WHERE id_ord = :id_ord;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id_ord'=>$id_ordenador,
                                      ':antivirus'=>$av));
                array_push($a,'antivirus_update');
            }else{
                array_push($a,'antivirus_no_update');
            }
            if ($resultado->detalle != $detalle) {
                $sql = "UPDATE ordenador SET detalle=:detalle WHERE id_ord = :id_ord;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id_ord'=>$id_ordenador,
                                      ':detalle'=>$detalle));
                array_push($a,'detalle_update');
            }else{
                array_push($a,'detalle_no_update');
            }
            if ($resultado->laboratorio_id != $labo) {
                $sql = "UPDATE ordenador SET laboratorio_id=:labo WHERE id_ord = :id_ord;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id_ord'=>$id_ordenador,
                                      ':labo'=>$labo));
                array_push($a,'laboratorio_update');
            }else{
                array_push($a,'laboratorio_no_update');
            }
            if ($resultado->consola_id != $consola_psico) {
                $sql = "SELECT * FROM ordenador WHERE consola_id = :consola_id AND consola_id != 0;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':consola_id'=>$consola_psico));
                $this->objetos=$query->fetchAll();
                if (!empty($this->objetos)) {
                    array_push($a,'consola_asignada');
                }else {
                    $sql = "UPDATE ordenador SET consola_id=:consola WHERE id_ord = :id_ord;";
                    $query = $this->acceso->prepare($sql);
                    $query->execute(array(':id_ord'=>$id_ordenador,
                                          ':consola'=>$consola_psico));
                    array_push($a,'consola_update');
                }
            }else{
                array_push($a,'consola_no_update');
            }

        }
        return $a;
    }

}