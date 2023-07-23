<?php
require_once("app/Model/UserModel.php");
//definimos la clase controlador por default que se invoca al inicio de la app
    class ControllerUsuario{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        private $modelo;
        // definimos el metodo index de nuestro controlador 
        public function index(){
            $this->modelo = new UserModel();
            $datos = $this->modelo->getAll();
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="app/View/admin/Users/IndexUserView.php";
            //incluimos a la plantilla 
            include_once("app/View/admin/PlantillaAdminView.php");
        }

    }
?>