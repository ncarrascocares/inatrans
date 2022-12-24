<?php

require_once 'models/Calendario.php';
class CalendarioController{

    public function view(){

        require_once 'views/calendario/index.php';
    }

    public function registrar(){

        if (isset($_POST) && isset($_POST['btnRegistrar'])) {
            
                       
            $title = $_POST['txtTitulo'];
            $descripcion = $_POST['txtDescripcion'];
            $color = $_POST['txtColor'];
            $start = $_POST['txtFecha'];
            $end = isset($_POST['txtEnd']) ? $_POST['txtEnd']: NULL;


            if (empty($title) && empty($start) && empty($color) && empty( $descripcion)) {
                $mensaje = array('msg'=>'todos los campos son requeridos', 'estado'=> false, 'tipo'=>'warning');
                
            }else{
                $objeto = new Calendario();
                $objeto->setTitle($title);
                $objeto->setDescripcion($descripcion);
                $objeto->setColor($color);
                $objeto->setStart($start);
                $objeto->setEnd($end);
                $respuesta = $objeto->save();
                
                if ($respuesta == 1) {
                    $mensaje = array('msg'=>'Evento registrado', 'estado'=> true, 'tipo'=>'success');
                }else{
                    $mensaje = array('msg'=>'Error al registrar el evento', 'estado'=> false, 'tipo'=>'error');
                }

                header("Location: ".base_url."calendario/view");

            }

            header("Location: ".base_url."calendario/view");
        }

    }

    public function listar(){
        header('Content-type: applicaton/json');
        $objeto = new Calendario();
        $eventos = $objeto->listarEventos();
        echo json_encode($eventos);
        die();

    }

    public function editar(){
        if(isset($_POST)){
            $objeto = new Calendario();
            //var_dump($_POST);
            //die();

            $id = $_POST['id'];
            $title = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $start = $_POST['fecha_inicio'];

            $objeto->setId($id);
            $objeto->setTitle($title);
            $objeto->setDescripcion($descripcion);
            $objeto->setStart($start);

            $resultado = $objeto->editarEvento();
            if($resultado){
                $mensaje = array('msg' => 'Actualización ok', 'estado'=>true, 'tipo'=>'success');

            }else{
                $mensaje = array('msg' => 'error en la actualización', 'estado'=>false, 'tipo'=>'warning');
               
            }

            echo json_encode($mensaje);
            die();
        }
    }


}




?>