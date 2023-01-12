<?php
require_once 'models/Reporte.php';

class ReporteController{

    public function view(){
        $objeto = new Reporte();
        $reportes = $objeto->getAll();

        require_once 'views/reporte/listado_reportes.php';
    }
    public function crear(){
        require_once 'views/reporte/crear.php';
    }
    public function save(){
        if (isset($_POST)) {
            
         
            //Recibiendo las variables desde el formulario
            $id_interno = isset($_POST['id_interno']) ? $_POST['id_interno']: false;
            $simulador = isset($_POST['simulador']) ? $_POST['simulador']: false;
            $usuario_id = isset($_POST['usuario_id']) ? $_POST['usuario_id']: false;
            $averia = isset($_POST['averia']) ? $_POST['averia']: false;
            $comentario = isset($_POST['comentario']) ? $_POST['comentario']: false;
            $categoria_id = isset($_POST['categoria_id']) ? $_POST['categoria_id']: NULL;
            $fecha_crea = isset($_POST['fecha_crea']) ? $_POST['fecha_crea']: false;
            $tipo_averia = isset($_POST['tipo_averia']) ? $_POST['tipo_averia']: false;
          
            //Validando que las variables no sean falsas
            if ($id_interno && $simulador && $usuario_id && $averia && $fecha_crea) {
            
                $objeto = new Reporte();
                $objeto->setId_interno($id_interno);
                $objeto->setSimulador_id($simulador);
                $objeto->setUsuario_id($usuario_id);
                $objeto->setAveria($averia);
                $objeto->setComentario($comentario);
                $objeto->setCategoria_id($categoria_id);
                $objeto->setFecha_crea($fecha_crea);
                $objeto->setTipo_averia_id($tipo_averia);

                

                if (isset($_GET['id']) && $_GET['id'] != "") {
                    $id = $_GET['id'];
                    $objeto->setId($id);
                    $saveUpdate = $objeto->edit();
                }else{
                    
                    $save = $objeto->save();
                }             
                
                header("Location: ".base_url."reporte/view");
            }           
        }
      
    }

    public function edit(){
        if (isset($_GET)) {
            $objeto = new Reporte();
            $edit = true;
            $id = (int)$_GET['id'];
            $objeto->setId($id);
            $rep = $objeto->getOne();
            require_once 'views/reporte/crear.php';
        }else{
            require_once 'views/reporte/listado_reportes.php';
        }
    }
    

}

?>
