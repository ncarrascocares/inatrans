<?php

require_once 'models/Calendario.php';
class CalendarioController{

    public function view(){

        require_once 'views/calendario/index.php';
    }

    public function registrar(){

        if (isset($_POST)) {
            
            $title = $_POST['title'];
            $start = $_POST['start'];
            $color = $_POST['color'];

            if (!empty($title) && !empty($start) && !empty($color)) {
                
                $objeto = new Calendario();
                $objeto->setTitle($title);
                $objeto->setStart($start);
                $objeto->setColor($color);

                $objeto->save();
            }

            header("Location: ".base_url."calendario/view");
        }
        
    }
}




?>