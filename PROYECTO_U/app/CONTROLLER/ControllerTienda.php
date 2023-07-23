<?php
require_once("app/Model/Producto.php");
//definimos la clase controlador por default que se invoca al inicio de la app
    class ControllerTienda{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        private $modelo;
        // definimos el metodo index de nuestro controlador 
        public function index(){
            $this->modelo = new Modelo_Producto();
            $datos = $this->modelo->getAll();
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="app/View/public/Tienda.php";
            //incluimos a la plantilla 
            include_once("app/View/public/PlantillaPublicView.php");
        }

    }
?>