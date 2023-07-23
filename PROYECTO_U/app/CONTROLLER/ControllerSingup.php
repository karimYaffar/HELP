<?php
//definimos la clase controlador por default que se invoca al inicio de la app
    class ControllerSingup{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        
        // definimos el metodo index de nuestro controlador 
        public function index(){
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="app/View/public/Singup.php";
            //incluimos a la plantilla 
            include_once("app/View/public/PlantillaPublicView.php");
        }

    }
?>