<?php
require_once 'models/Usuario.php';
    class UsuarioController {

        public function index(){
            
        }

        public function logearse(){

            if (isset($_POST)) {
                
                if (empty($_POST['txtEmail']) && empty($_POST['txtPassword'])) {
                    header("Location:".base_url."login.php"); 
                }else{
                    $objeto = new Usuario();
                    $correo = $_POST['txtEmail'];
                    $password = $_POST['txtPassword'];
                    $objeto->setCorreo($correo);
                    $objeto->setPassword($password);
                    $resul = $objeto->AllUsuario();
                    
                    var_dump($resul);
                    die();
                    
                    //header("Location:".base_url."index.php");
                    
                }
            }


           
        }
    }