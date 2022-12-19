<?php

require_once 'models/Calendario.php';
class CalendarioController{

    public function view(){

        require_once 'views/calendario/index.php';
    }

    public function registrar(){

        if (isset($_POST)) {
            
            $title = $_POST['title'];
            $start = $_POST['start'];
            $color = $_POST['color'];

            if (empty($title) && empty($start) && empty($color)) {
                $mensaje = array('msg'=>'todos los campos son requeridos', 'estado'=> false, 'tipo'=>'warning');
                
            }else{
                $objeto = new Calendario();
                $objeto->setTitle($title);
                $objeto->setStart($start);
                $objeto->setColor($color);

                $respuesta = $objeto->save();
                
                if ($respuesta == 1) {
                    $mensaje = array('msg'=>'Evento registrado', 'estado'=> true, 'tipo'=>'success');
                }else{
                    $mensaje = array('msg'=>'Error al registrar el evento', 'estado'=> false, 'tipo'=>'error');
                }

                $array = json_encode($mensaje);
                echo json_encode($array, JSON_UNESCAPED_UNICODE);
                die();
            }
        }

        /****************************** */
            //$mensaje = array('msg'=>'Error al registrar', 'estado'=> false, 'tipo'=>'error');
            //$array = json_encode($mensaje);
            //echo json_encode($array, JSON_UNESCAPED_UNICODE);

    }

    public function listar(){
        header('Content-type: applicaton/json');
        $objeto = new Calendario();
        $eventos = $objeto->listarEventos();

        $cal = $eventos;
        //print_r($eventos);
        //die();
        //print_r($eventos);
        //echo json_encode($eventos);
        require_once 'views/calendario/calendario.php';
        //die();

    }
}




?>