<?php
require_once 'models/Simulador.php';
    class SimuladorController{

        public function index(){
            $objeto = new Simulador();
            $simuladores = $objeto->infoAllSimulador();
            require_once 'views/simulador/estado_simulador.php';
        }

        public function informacion(){
            if (isset($_GET)) {
                $id = (int)$_GET['id'];

                //Pasando el id al metodo del modelo
                $objeto = new Simulador();
                $objeto->setId($id);
                $objeto->reportForSimulador();

                $simulador = $objeto->reportForSimulador();
                $sim = $simulador;

                // var_dump($sim);
                // die();

                require_once 'views/simulador/informacion.php';
            }
            
        }

    }


?>