<?php
//Fichero con funcionalidades re utilizables
    class Utils{
        public static function showSimulador(){
            require_once 'models/Simulador.php';
            $objeto = new Simulador();
            $simulador=$objeto->infoAllSimulador();
            return $simulador->fetch_object();
        }

        public static function showUsuario(){
            require_once 'models/Usuario.php';
            $objeto = new Usuario();
            $usuario=$objeto->AllUsuario();
            return $usuario->fetch_object();
        }
    }
  


?>