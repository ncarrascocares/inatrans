<?php

include_once '../modelo/Consola.php';

$consola = new Consola();

switch ($_POST['funcion']) {
    case 'total_consola':
        $json = array();
            $consola->total_consola();
            foreach ($consola->objetos as $objeto) {
                $json[] = array(
                    'id_lab'=>$objeto->id_lab,
                    'nom_lab'=>$objeto->nom_lab,
                    'fec_ven'=>$objeto->fec_ven,
                    'dias_vigencia'=>$objeto->dias_vigencia,
                    'identificador'=>$objeto->identificador,
                    'id_consola'=>$objeto->id_consola,
                    'serial_consola'=>$objeto->serial_consola

                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        break;
    case 'listar_consola':
        $json = array();
        $consola->listar_consola();
        foreach ($consola->objetos as $objeto) {
            $json[] = array(
                'id_consola'=>$objeto->id_consola,
                'serial_consola'=>$objeto->serial_consola,
                'serial_pedalera'=>$objeto->serial_pedalera,
                'nom_lab'=>$objeto->nom_lab,
                'detalle'=>$objeto->detalle,
                'id_dongle'=>$objeto->id_dongle,
                'identificador'=>$objeto->identificador,
                'fec_ven'=>$objeto->fec_ven,
                'dias_vigencia'=>$objeto->dias_vigencia,
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
    case 'new_consola':
        $serie_equipo = strtoupper($_POST['serie_equipo']);
        $serie_pedalera = strtoupper($_POST['serie_pedalera']); 
        $ubicacion = (int)$_POST['ubicacion']; 
        $dongle = (int)$_POST['dongle']; 
        $detalle_consola = $_POST['detalle_consola'];

        $consola->new_consola($serie_equipo, $serie_pedalera, $ubicacion, $dongle, $detalle_consola);

        break;
    case 'select_consola_id':
        $json = array();
        $id_consola = (int)$_POST['dato'];
        $consola->seleccionar_consola_id($id_consola);
        foreach ($consola->objetos as $objeto) {
            $json[] = array(
                'id_consola'=>$objeto->id_consola,
                'serial_consola'=>$objeto->serial_consola,
                'serial_pedalera'=>$objeto->serial_pedalera,
                'ubicacion'=>$objeto->ubicacion,
                'detalle'=>$objeto->detalle,
                'dongle_id'=>$objeto->dongle_id,
                'id_dongle'=>$objeto->id_dongle,
                'identificador'=>$objeto->identificador
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
    case 'update_consola':
        $json = array();
        $id_consola = (int)$_POST['id_consola'];
        $serial_consola = strtoupper($_POST['serial_consola']);
        $serial_pedalera = strtoupper($_POST['serial_pedalera']);
        $ubicacion = (int)$_POST['ubicacion'];
        $dongle = (int)$_POST['dongle'];
        $detalle = $_POST['detalle'];

         //Validando los campos recibidos
         if($id_consola == '' || $serial_consola == '' || $serial_pedalera == '' || $ubicacion == '' || $dongle == '' || $detalle == ''){           
            echo "Faltan_datos";
        }else{
            $resul = $consola->update_consola($id_consola, $serial_consola, $serial_pedalera, $ubicacion, $dongle, $detalle);
           print_r($resul);
           die();
           if (sizeof($resul) == 0) {
             echo 'mismos-datos';
           }else{
            $json[] = $resul;

            $jsonstring = json_encode($json);
            echo $jsonstring;
           }
        }
        break;
}



?>