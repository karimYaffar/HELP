<?php
require_once("app/Model/Garantia.php");
/* require_once("app/model/UserModel.php"); */
//definimos la clase controlador por default que se invoca al inicio de la app
    class ControllerGarantia{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        private $modelo;
        // definimos el metodo index de nuestro controlador 
        public function index(){
            $this->modelo = new Modelo_Garantia();
            $garantia = $this->modelo->getAll();
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="app/View/admin/Garantia/IndexgarView.php";
            //incluimos a la plantilla 
            include_once("app/View/admin/PlantillaAdminView.php");
        }
        
    // !Creamos el metodo para llamar a la vista de agregar productos
    public function CallFormgar()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "app/View/admin/Garantia/AddgarView.php";
            include_once("app/View/public/PlantillaPublicView.php");
        } else {
            $vista = "app/View/admin/Productos/Modepro/Singuprodu.php";
            include_once("app/View/public/PlantillaPublicView.php");
        }
    }



        public function CallFormEditgar()
        {
            //verificamos que el metodo de envio de datos sea GET
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                //obtenemos el id del usuario a editar
                $id = $_GET['id'];
                //llamamos al metodo del modelo que obtiene los datos del usuario a editar
                $modelo = new Modelo_Garantia();
                $datos = $modelo->getById($id);
                //llamamos a la vista de editar usuario
                session_start();
                if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                    $vista = "app/View/admin/Garantia/EditgarView.php";
                    include_once("app/View/admin/PlantillaAdminView.php");
                } else {
                    $vista = "app/View/admin/IndexAdminView.php";
                    include_once("app/View/admin/Plantilla2AdminView.php");
                }
            }
        }

        public function Editgarantia()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $garantia = array(
                
                'producto' => $_POST['producto'],
                'user' => $_POST['username'],
                'forma' => $_POST['forma'],
                'fecha' => $_POST['fecha'],
                'razon' => $_POST['razon']
               
                
            );
           
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo = new Modelo_Garantia();
            $modelo->updategarantia($garantia);
            //redireccionamos al index de usuarios
            header("Location:?C=ControllerGarantia&M=index");
        }
    }

    //!creamos para agregar productos
    public function Addgarantia()
    {
        //verificamos si el metodo de envio de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // ! Almacenamos los datos enviados por el formulario en un arreglo de solo los datos de usuario 
            $garantia = array (
                
                'producto' => $_POST['producto'],
                'user' => $_POST['username'],
                'forma' => $_POST['forma'],
                'fecha' => $_POST['fecha'],
                'razon' => $_POST['razon']
    
            );
            //comenzamos a procesar la imagen 
            //llamamos al metodo del modelo que agrega al usuario a la base de datos
            $modelo = new Modelo_Garantia();
            $res = $modelo->insertgarantia($garantia);
            //podria poner una consicion en la que si el elemnto fue insertado correctamente
            //llamaria al index de usuarios y si no llamaria al formulario de agregar
            //redireccionamos al index de usuarios
            header("Location:?C=ControllerGarantia&M=index");
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
            $this->modelo = new Modelo_Producto();
            $usuario = $this->modelo->getById($id); 
            $modelo = new Modelo_Producto();
            $modelo->delete($id);
            //eliminamos el registro
            unlink("app/Pagina/IMagen" . $usuario['Avatar']);
            //redireccionamos al index de usuarios
            header("Location:?C=ControllerProducto&M=index");
        }
        }



    }

?>