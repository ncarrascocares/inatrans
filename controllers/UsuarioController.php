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

                    if ($correo == $resul->Correo && $password == $resul->password) {
                        session_start();
                        $_SESSION['id'] = $resul->id;
                        $_SESSION['nombre'] = $resul->Nombre;
                        $_SESSION['apellido'] = $resul->Apellido;
                        $_SESSION['tipo_user'] = $resul->nombre;

                      
                        header("Location:".base_url."index.php");
                    }else{
                        header("Location:".base_url."login.php");
                        echo "no son las mismas";
                    }
                    die();
                }
            }           
        }
    }