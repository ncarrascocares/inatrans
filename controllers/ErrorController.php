<?php

    class ErrorController{
        
        public function index(){

            //Trabajar para que nos re dirija a una pagina 404 de la maqueta
            require_once 'views/error/404.php';
        }
    }

?>