<?php
require_once("app/Model/Producto.php");
/* require_once("app/model/UserModel.php"); */
//definimos la clase controlador por default que se invoca al inicio de la app
    class ControllerCompra{
        //el controlador tiene un atributo llmado vista 
        private $vista;
        private $modelo;
        // definimos el metodo index de nuestro controlador 
        public function index(){
            $this->modelo = new Modelo_Producto();
            $datos = $this->modelo->getAll();
            //inicializamos a vista con lo que vamos a mostrar en la plantilla 
            $vista="app/View/admin/Productos/IndexproView.php";
            //incluimos a la plantilla 
            include_once("app/View/admin/PlantillaAdminView.php");
        }
        
    // !Creamos el metodo para llamar a la vista de agregar productos
    public function CallFormcompra()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "app/View/admin/Productos/Modepro/Singuprodu.php";
            include_once("app/View/public/PlantillaPublicView.php");
        } else {
            $vista = "app/View/admin/Productos/Modepro/Singuprodu.php";
            include_once("app/View/public/PlantillaPublicView.php");
        }
    }




        public function Editcompra()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $producto = array(
                'nombre' => $_POST['nombre'],
                'descripcion' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'existencias' => $_POST['existencias'],
                'Avatar' => $_POST['avatar'],
                'ID_productos' => $_POST['id']
               
                
            );
            //comenzamos a procesar la imagen 
            if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                //obtenemos la informacion necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['avatar']['name'];
                $tipoArchivo = $_FILES['avatar']['type'];
                $tamanoArchivo = $_FILES['avatar']['size'];
                $rutaTemporal = $_FILES['avatar']['tmp_name'];
                //validamos que tipo de imagen puedo subir
                $extenciones = array('jpg', 'jpeg', 'png');
                $extencion = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                if (!in_array($extencion, $extenciones)) {
                    echo "Formato de archivo no valido";
                    exit;
                }
                //validamos el tamaño del archivo a cargar
                $tamanomaximo = 2 * 1024 * 1024;
                if ($tamanoArchivo > $tamanomaximo) {
                    echo "ya mejor sube un video o una lona";
                    exit;
                }
                //generamos el numbre del archivo
                $nombreArchivo = uniqid('Avatar_') . '.' . $extencion;
                $rutaDestino = "aapp/View/avatars/" . $nombreArchivo;
                //copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }
                $this->modelo = new UserModel();
                $anterior = $this->modelo->getById($_POST['id']);
                if (!empty($anterior['Avatar'])) {
                    unlink("app/Pagina/IMagen/" . $anterior['Avatar']);
                }

                //tengo que ver si se toco o no se toco el input_file
                $datos['Avatar'] = $nombreArchivo;
            } else {
                $datos['Avatar'] = $_POST['ava'];
            }
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo = new Modelo_Producto();
            $modelo->updateproducto($producto);
            //redireccionamos al index de usuarios
            header("Location:?C=ControllerProducto&M=index");
        }
    }

    //!creamos para agregar productos
    public function Addcompra()
    {
        //verificamos si el metodo de envio de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // ! Almacenamos los datos enviados por el formulario en un arreglo de solo los datos de usuario 
            $producto = array (
                
                'nombre' => $_POST['nombre'],
                'producto' => $_POST['descripcion'],
                'precio' => $_POST['precio'],
                'existencias' => $_POST['existencias']
                
               
            );
            
            //comenzamos a procesar la imagen 
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
                //obtenemos la informacion necesaria del archivo que estamos cargando
                $nombreArchivo = $_FILES['imagen']['name'];
                $tipoArchivo = $_FILES['imagen']['type'];
                $tamanoArchivo = $_FILES['imagen']['size'];
                $rutaTemporal = $_FILES['imagen']['tmp_name'];
                //validamos que tipo de imagen puedo subir
                $extenciones = array('jpg', 'jpeg', 'png');
                $extencion = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                if (!in_array($extencion, $extenciones)) {
                    echo "Formato de archivo no valido";
                    exit;
                }
                //validamos el tamaño del archivo a cargar
                $tamanomaximo = 2 * 1024 * 1024;
                if ($tamanoArchivo > $tamanomaximo) {
                    echo "ya mejor sube un video o una lona";
                    exit;
                }
                //generamos el numbre del archivo
                $nombreArchivo = uniqid('Producto_') . '.' . $extencion;
                $rutaDestino = "app/Pagina/IMagen/" . $nombreArchivo;
                //copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }
                $producto['Imagen'] = $nombreArchivo;
            }
           
            //comenzamos a procesar la imagen 
            //llamamos al metodo del modelo que agrega al usuario a la base de datos
            $modelo = new Modelo_Producto();
            $res = $modelo->insertprodu($producto);
            //podria poner una consicion en la que si el elemnto fue insertado correctamente
            //llamaria al index de usuarios y si no llamaria al formulario de agregar
            //redireccionamos al index de usuarios
            header("Location:?C=ControllerProducto&M=index");
        }
    }


   



    }

?>