<?php

include_once 'Conexion.php';

class Consola{
    var $objetos;
    var $acceso;

    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db->pdo;
    }

    function total_consola(){
        $sql = "SELECT la.id_lab, la.nom_lab,don.fec_ven,DATEDIFF(don.fec_ven,curdate()) as 'dias_vigencia',don.identificador,co.id_consola, co.serial_consola
                FROM ordenador ord
                INNER JOIN laboratorio la on ord.laboratorio_id = la.id_lab
                INNER JOIN consola co ON ord.consola_id = co.id_consola
                INNER JOIN dongle don ON co.dongle_id = don.id_dongle
                GROUP BY don.id_dongle;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    function listar_consola(){
        $sql = "SELECT con.id_consola, con.serial_consola, con.serial_pedalera, lab.nom_lab, con.Detalle, don.id_dongle, don.identificador, don.fec_ven, DATEDIFF(don.fec_ven,curdate()) as 'dias_vigencia' FROM consola con 
                INNER JOIN laboratorio lab on con.Ubicacion = lab.id_lab
                INNER JOIN dongle don on con.dongle_id = don.id_dongle;";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    function new_consola($serie_equipo, $serie_pedalera, $ubicacion, $dongle, $detalle_consola){
        $sql = "SELECT * FROM consola WHERE serial_consola = :serie";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':serie'=>$serie_equipo));
        $this->objetos=$query->fetchAll();
        if(!empty($this->objetos)){
            echo "consola-existe";
        }else{
            $sql = "SELECT con.*, don.id_dongle, don.identificador FROM consola con 
            inner join dongle don on con.dongle_id = don.id_dongle
            where don.id_dongle = :dongle;";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':dongle'=>$dongle));
            $this->objetos=$query->fetchAll();
            if(!empty($this->objetos)){
                echo "psico-asociado";
            }else{
                $sql = "INSERT INTO consola (serial_consola, serial_pedalera, Ubicacion, Detalle, dongle_id) 
                        VALUES (:serial_consola, :serial_pedalera, :ubicacion, :detalle, :dongle_id)";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(
                    ':serial_consola'=>$serie_equipo, 
                    ':serial_pedalera'=>$serie_pedalera, 
                    ':ubicacion'=>$ubicacion,
                    ':detalle'=>$detalle_consola,
                    ':dongle_id'=>$dongle
                ));
                echo "consola-add";
            }
        }
    }

    function seleccionar_consola_id($id_consola){
        $sql = "SELECT con.*, don.id_dongle, don.identificador FROM consola con 
                inner join dongle don on con.dongle_id = don.id_dongle
                where con.id_consola = :id_consola;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_consola'=>$id_consola));
        $this->objetos=$query->fetchAll();
        return($this->objetos);

    }

    function update_consola($id_consola, $serial_consola, $serial_pedalera, $ubicacion, $dongle, $detalle){
        $a = array();
        $b = false;
        $resultado = array();
        $sql = "SELECT * FROM consola WHERE id_consola = :id_consola;";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id_consola'=>$id_consola));
        $this->objetos = $query->fetchObject();
        $resultado = $this->objetos;
        //Validando que el nombre ingresado sea distinto al que hay en la bd
        if($resultado->serial_consola == $serial_consola && $resultado->serial_pedalera == $serial_pedalera && $resultado->ubicacion == $ubicacion && $resultado->detalle == $detalle && $resultado->dongle_id == $dongle){
           $a;
        }else{
            if ($resultado->serial_consola != $serial_consola) {
                $sql = "SELECT * FROM consola WHERE serial_consola = :serial_consola;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':serial_consola'=>$serial_consola));
                $this->objetos=$query->fetchAll();
                if (!empty($this->objetos)) {
                    $sql = "UPDATE consola SET serial_consola=:serial_consola WHERE id_consola = :id_consola;";
                    $query = $this->acceso->prepare($sql);
                    $query->execute(array(':id_consola'=>$id_consola,
                                          ':serial_consola'=>$serial_consola));
                    array_push($a,'consola_update');
                }else{
                    array_push($a,'consola_no_update');
                }       
            }else{
                array_push($a,'consola_no_update');
            }

            if ($resultado->serial_pedalera != $serial_pedalera) {
                $sql = "SELECT * FROM consola WHERE serial_pedalera = :serial_pedalera;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':serial_pedalera'=>$serial_pedalera));
                $this->objetos=$query->fetchAll();
                if (!empty($this->objetos)) {
                    $sql = "UPDATE consola SET serial_pedalera=:serial_pedalera WHERE id_consola = :id_consola;";
                    $query = $this->acceso->prepare($sql);
                    $query->execute(array(':id_consola'=>$id_consola,
                                          ':serial_pedalera'=>$serial_pedalera));
                    array_push($a,'pedalera_update');
                }else{
                    array_push($a,'pedalera_no_update');
                }      
            }else{
                array_push($a,'pedalera_no_update');
            }
            if ($resultado->ubicacion != $ubicacion) {
                    $sql = "UPDATE consola SET ubicacion=:ubicacion WHERE id_consola = :id_consola;";
                    $query = $this->acceso->prepare($sql);
                    $query->execute(array(':id_consola'=>$id_consola,
                                          ':ubicacion'=>$ubicacion));
                    array_push($a,'ubicacion_update');
            }else{
                array_push($a,'ubicacion_no_update');
            }
            if ($resultado->detalle != $detalle) {
                    $sql = "UPDATE consola SET detalle=:detalle WHERE id_consola = :id_consola;";
                    $query = $this->acceso->prepare($sql);
                    $query->execute(array(':id_consola'=>$id_consola,
                                          ':detalle'=>$detalle));
                    array_push($a,'detalle_update');
            }else{
                array_push($a,'detalle_no_update');
            }
            if ($resultado->dongle_id != $dongle) {
                $sql = "SELECT * FROM consola WHERE dongle_id = :dongle;";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':dongle'=>$dongle));
                $this->objetos=$query->fetchAll();
                if (empty($this->objetos)) {
                    $sql = "UPDATE consola SET dongle_id=:dongle WHERE id_consola = :id_consola;";
                    $query = $this->acceso->prepare($sql);
                    $query->execute(array(':id_consola'=>$id_consola,
                                          ':dongle'=>$dongle));
                    array_push($a,'dongle_update');
                }else{
                    array_push($a,'dongle_no_update');
                }      
            }else{
                array_push($a,'dongle_no_update');
            }
           
        }

        return $a;

    }
}