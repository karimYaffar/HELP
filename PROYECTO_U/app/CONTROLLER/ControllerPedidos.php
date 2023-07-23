<?php
require_once("app/Model/Pedido.php");
/* require_once("app/model/UserModel.php"); */
//definimos la clase controlador por default que se invoca al inicio de la app
    class ControllerPedidos{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        private $modelo;
        // definimos el metodo index de nuestro controlador 
        public function index(){
            $this->modelo = new Modelo_Pedidos();
            $pedidos = $this->modelo->getAll();
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="app/View/admin/Pedidos/IndexpediView.php";
            //incluimos a la plantilla 
            include_once("app/View/admin/PlantillaAdminView.php");
        }
        
 /*    // !Creamos el metodo para llamar a la vista de agregar productos
    public function CallFormpro()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "app/View/admin/Productos/Modepro/Singuprodu.php";
            include_once("app/View/public/PlantillaPublicView.php");
        } else {
            $vista = "app/View/admin/Productos/Modepro/Singuprodu.php";
            include_once("app/View/public/PlantillaPublicView.php");
        }
    } */



        public function CallFormEditpedi()
        {
            //verificamos que el metodo de envio de datos sea GET
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                //obtenemos el id del usuario a editar
                $id = $_GET['id'];
                //llamamos al metodo del modelo que obtiene los datos del usuario a editar
                $modelo = new Modelo_Pedidos();
                $datos = $modelo->getById($id);
                //llamamos a la vista de editar usuario
                session_start();
                if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                    $vista = "app/View/admin/Pedidos/EditpediView.php";
                    include_once("app/View/admin/PlantillaAdminView.php");
                } else {
                    $vista = "app/View/admin/IndexAdminView.php";
                    include_once("app/View/admin/Plantilla2AdminView.php");
                }
            }
        }

        public function Editpedido()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $pedidos = array(
                'nombre' => $_POST['nombre'],
                'fecha' => $_POST['fecha'],
                'estado' => $_POST['estado'],
                'total' => $_POST['total'],
                'ID_pedidos' => $_POST['id']
               
                
            );
           
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo = new Modelo_Pedidos();
            $modelo->updatepedidos($pedidos);
            //redireccionamos al index de usuarios
            header("Location:?C=ControllerPedidos&M=index");
        }
    }

  


    public function Delete()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a eliminar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que elimina al usuario de la base de datos
            //creo un segundo modelo para rescatar el registro con el nombre
            $this->modelo = new Modelo_Pedidos();
            $datos = $this->modelo->getById($id); 
            $modelo = new Modelo_Pedidos();
            $modelo->delete($id);
            //redireccionamos al index de usuarios
            header("Location:?C=ControllerPedidos&M=index");
        }
        }
    }

?>