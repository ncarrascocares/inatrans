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
            $responsable = isset($_POST['responsable']) ? $_POST['responsable']: false;
            $reporte_averia = isset($_POST['reporte_averia']) ? $_POST['reporte_averia']: false;
            $reporte_solucion = isset($_POST['reporte_solucion']) ? $_POST['reporte_solucion']: false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria']: NULL;
            $fecha_inicio = isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio']: false;
            $fecha_termino = isset($_POST['fecha_termino']) ? $_POST['fecha_termino']: NULL;
            $hh = isset($_POST['hh']) ? $_POST['hh']: NULL;
            $estado = isset($_POST['estado']) ? ucfirst($_POST['estado']): false;
            $tipo_averia = isset($_POST['tipo_averia']) ? $_POST['tipo_averia']: false;
          
            //Validando que las variables no sean falsas
            if ($id_interno && $simulador && $responsable && $reporte_averia && $fecha_inicio && $estado) {
            
                $objeto = new Reporte();
                $objeto->setId_interno($id_interno);
                $objeto->setSimulador_id($simulador);
                $objeto->setUsuario_id($responsable);
                $objeto->setAveria($reporte_averia);
                $objeto->setSolucion($reporte_solucion);
                $objeto->setCategoria($categoria);
                $objeto->setFecha_inicio($fecha_inicio);
                $objeto->setFecha_termino($fecha_termino);
                $objeto->sethh($hh);
                $objeto->setEstado_averia($estado);
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
