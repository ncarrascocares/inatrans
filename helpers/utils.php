<?php
//Fichero con funcionalidades re utilizables
    class Utils{
        public static function showSimulador(){
            require_once 'models/Simulador.php';
            $objeto = new Simulador();
            $simulador=$objeto->infoAllSimulador();
            return $simulador;
        }

        public static function showUsuario(){
            require_once 'models/Usuario.php';
            $objeto = new Usuario();
            $usuario=$objeto->AllUsuario();
            return $usuario;
        }
        public static function idInterno(){
            require_once 'models/Reporte.php';
            $objeto = new Reporte();
            $repor=$objeto->getAllReporte();
            return $repor;
        }
    }
  


?>