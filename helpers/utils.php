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
        public static function Usuario(){
            require_once 'models/Usuario.php';
            $objeto = new Usuario();
            $usuario=$objeto->AllUsuario();
            return $user;
        }
        public static function Categoria(){
            require_once 'models/Categoria.php';
            $objeto = new Categoria();
            $categoria=$objeto->listarCategorias();
         
            return $categoria;
        }
        public static function Averia(){
            require_once 'models/Averia.php';
            $objeto = new Averia();
            $averia=$objeto->listarAverias();
         
            return $averia;
        }
    }
  


?>