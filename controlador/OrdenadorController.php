<?php

//Inlcuir el modelo
include_once '../modelo/Ordenador.php';
session_start();
//Instanciar un objeto del modelo
$ordenador = new Ordenador();

switch ($_POST['funcion']) {
    case 'total_ordenador':
        $json = array();
            $ordenador->total_ordenador();
            foreach ($ordenador->objetos as $objeto) {
                $json[] = array(
                    'id_lab'=>$objeto->id_lab,
                    'nom_lab'=>$objeto->nom_lab,
                    'ordenadores'=>$objeto->ordenadores
                );
            }
            $jsonstring = json_encode($json);
            echo $jsonstring;
        break;
    case 'nuevo_ordenador':
        $marca = $_POST['marca_ordenador'];
        $modelo = $_POST['modelo_ordenador'];
        $sis_ope = $_POST['sis_operativo'];
        if(isset($_POST['antivirus'])){
            if($_POST['antivirus'] == '0'){
                $av = 0;
            }else{
                $av = 1;
            }
        };
        $consola = (int)$_POST['consola_psico'];
        $lab = (int)$_POST['id_lab'];
        $desc = $_POST['desc_ordenador'];

        $ordenador->insert_ordenador($marca, $modelo, $sis_ope, $av, $consola, $lab, $desc);
        break;
    case 'lista_ordenador':
        $json = array();
        $ordenador->lista_ordenador();
        foreach ($ordenador->objetos as $objeto) {
            $json[] = array(
                'identificador'=>'INA-LAB-'.$objeto->id_ord,
                'id_ord'=>$objeto->id_ord,
                'marca_ord'=>$objeto->marca_ord,
                'mod_ord'=>$objeto->mod_ord,
                'sis_ope'=>$objeto->sis_ope,
                'antivirus'=>$objeto->antivirus,
                'detalle'=>$objeto->detalle,
                'consola_id'=>$objeto->consola_id,
                'laboratorio_id'=>$objeto->laboratorio_id,
                'serial_consola'=>$objeto->serial_consola
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
    case 'selectOrdenador':
        $id_ordenador = (int)$_POST['dato'];
        $ordenador->selectOrdenador($id_ordenador);
        foreach ($ordenador->objetos as $objeto) {
            $json[] = array(
                'id_ord'=>$objeto->id_ord,
                'marca_ord'=>$objeto->marca_ord,
                'mod_ord'=>$objeto->mod_ord,
                'sis_ope'=>$objeto->sis_ope,
                'antivirus'=>$objeto->antivirus,
                'detalle'=>$objeto->detalle,
                'consola_id'=>$objeto->consola_id,
                'laboratorio_id'=>$objeto->laboratorio_id,
                'serial_consola'=>$objeto->serial_consola
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
        break;
}



?>