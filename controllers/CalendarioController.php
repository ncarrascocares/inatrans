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
            $color = '#fff111';
            $start = $_POST['txtFecha'];


            if ($title =="" &&  $descripcion == "") {
                $mensaje = array('msg'=>'todos los campos son requeridos', 'estado'=> false, 'tipo'=>'warning');
                
            }else{
                $objeto = new Calendario();
                $objeto->setTitle($title);
                $objeto->setDescripcion($descripcion);
                $objeto->setColor($color);
                $objeto->setStart($start);
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
                $mensaje = array('msg' => 'Actualizaci??n ok', 'estado'=>true, 'tipo'=>'success');

            }else{
                $mensaje = array('msg' => 'error en la actualizaci??n', 'estado'=>false, 'tipo'=>'warning');
               
            }

            echo json_encode($mensaje);
            die();
        }
    }


}




?>