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
}



?>