<?php
require_once("app/model/UserModel.php");
require_once("app/Model/DireccionModel.php");
/* require_once("app/Model/direccion.php"); */
class UserController
{
    private $vista;
    private $modelo;

    public function Index()
    {
        //en el index vamos a mostrar una tabla con todos los usuarios
        $modelo = new UserModel();
        $datos = $modelo->getAll();
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "app/View/admin/users/IndexUserView.php";
            include_once("app/View/admin/PlantillaAdminView.php");
        } else {
            $vista = "app/View/public/indexPublicView.php";
            include_once("app/View/public/PlantillaPublicView.php");
        }
    }

    //creamos el metodo para llamar a la vista de agregar usuario
    public function CallFormAdd()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "app/View/public/Singup.php";
            include_once("app/View/public/PlantillaPublicView.php");
        } else {
            $vista = "app/View/public/Singup.php";
            include_once("app/View/public/PlantillaPublicView.php");
        }
    }

    public function CallFormAddadmin()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "app/View/public/Singup.php";
            include_once("app/View/admin/PlantillaAdminView.php");
        } else {
            $vista = "app/View/public/Singup.php";
            include_once("app/View/public/PlantillaPublicView.php");
        }
    }




    public function CallFormLogin()
    {
        session_start();
        if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
            $vista = "app/View/public/Login.php";
            include_once("app/View/public/PlantillaPublicView.php");
        } else {
            $vista = "app/View/public/Login.php";
            include_once("app/View/public/PlantillaPublicView.php");
        }
    }
    //creamos el metodo para agregar un usuario
    public function Add()
    {

        //verificamos si el metodo de envio de datos es POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // ! Almacenamos los datos enviados por el formulario en un arreglo de solo los datos de usuario 

            $model = new UserModel();
            $User = $model->GetById($_POST['username']);

            if ($User['ID_usuario'] == $_POST['username']) {
                session_start();
                $_SESSION['error'] = 'Este Usuario ya esta registrado';
                header("Location:?C=UserController&M=callFormAdd");
            } else {
                $usuario = array(

                    'Nombre' => $_POST['nombre'],
                    'ApPaterno' => $_POST['apaterno'],
                    'ApMaterno' => $_POST['amaterno'],
                    'Usuario' => $_POST['username'],
                    'Email' => $_POST['email'],
                    'Numero' => $_POST['numero'],
                    'Password' => $_POST['password'],
                    'direccion' => null,
                    'Avatar' => $_POST['ava']


                );
                // ! vamos a generar 
                $direccion = array(
                    'Fk_direccion' => null,
                    'Colonia' => $_POST['Colonia'],
                    'Calle' => $_POST['Calle'],
                    'Municipio' => $_POST['Municipio'],
                    'Localidad' => $_POST['Localidad'],
                    'Referencia' => $_POST['Referencia']
                );

                //comenzamos a procesar la imagen 
                if (isset($_FILES['ava']) && $_FILES['ava']['error'] === UPLOAD_ERR_OK) {
                    //obtenemos la informacion necesaria del archivo que estamos cargando
                    $nombreArchivo = $_FILES['ava']['name'];
                    $tipoArchivo = $_FILES['ava']['type'];
                    $tamanoArchivo = $_FILES['ava']['size'];
                    $rutaTemporal = $_FILES['ava']['tmp_name'];
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
                    $rutaDestino = "app/View/avatars/" . $nombreArchivo;
                    //copiamos el archivo a nuestro servidor
                    if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                        echo "Error al cargar el archivo";
                        exit;
                    }
                    $usuario['Avatar'] = $nombreArchivo;
                }

                //llamamos al metodo del modelo que agrega al usuario a la base de datos
                $modelo = new UserModel();
                $res = $modelo->insert($usuario, $direccion);
                //podria poner una consicion en la que si el elemnto fue insertado correctamente
                //llamaria al index de usuarios y si no llamaria al formulario de agregar
                //redireccionamos al index de usuarios
                session_start();
                unset($_SESSION['error']);
                if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                    header("Location:?C=UserController&M=Index");

                } else {
                    header("Location:?C=UserController&M=CallFormLogin");
                }
            }
        }

    }


    //Creamos el metodo para llamar a la vista de editar usuario
    public function CallFormEdit()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a editar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que obtiene los datos del usuario a editar
            $modelo = new UserModel();
            $datos = $modelo->getById($id);
            //llamamos a la vista de editar usuario
            session_start();
            if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                $vista = "app/View/admin/Users/EditUserView.php";
                include_once("app/View/admin/PlantillaAdminView.php");
            } else {
                $vista = "app/View/admin/IndexAdminView.php";
                include_once("app/View/admin/Plantilla2AdminView.php");
            }
        }
    }
    public function CallFormEditD()
    {
        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a editar
            $id = $_GET['id'];
            //llamamos al metodo del modelo que obtiene los datos del usuario a editar
            $modelo = new UserModel();
            $datos = $modelo->getByIdDi($id);
            //llamamos a la vista de editar usuario
            session_start();
            if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                $vista = "app/View/admin/Users/EditUserDView.php";
                include_once("app/View/admin/PlantillaAdminView.php");
            } else {
                $vista = "app/View/admin/IndexAdminView.php";
                include_once("app/View/admin/Plantilla2AdminView.php");
            }
        }
    }


    //creamos el metodo para editar un usuario
    public function Edit()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos = array(
                'ID_usuario' => $_POST['user'],
                //agregamos el id del usuario a editar
                'Nombre' => $_POST['nombre'],
                'Apaterno' => $_POST['apaterno'],
                'Amaterno' => $_POST['amaterno'],
                'Password' => $_POST['password'],
                'Telefono' => $_POST['telefono'],
                'Correo' => $_POST['correo'],
                'Permisos' => $_POST['permisos'],
                'Avatar' => $_POST['ava']

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
                $rutaDestino = "app/View/avatars/" . $nombreArchivo;
                //copiamos el archivo a nuestro servidor
                if (!move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    echo "Error al cargar el archivo";
                    exit;
                }
                $this->modelo = new UserModel();
                $anterior = $this->modelo->getById($_POST['user']);
                if (!empty($anterior['Imagen_U'])) {
                    unlink("app/View/avatars/" . $anterior['Imagen_U']);
                }

                //tengo que ver si se toco o no se toco el input_file
                $datos['Avatar'] = $nombreArchivo;
            } else {
                // Conservar la imagen existente si no se envió una nueva imagen
                $datos['Avatar'] = $_POST['ava'];
            }
            //llamamos al metodo del modelo que actualiza los datos del usuario
            $modelo = new UserModel();
            $modelo->update($datos);
            //redireccionamos al index de usuarios
            header("Location:?C=UserController&M=index");
        }
    }
    public function EditD()
    {
        //verificamos que el metodo de envio de datos sea POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //almacenamos los datos enviados por el formulario en un arreglo
            $datos = array(
                
                //agregamos el id del usuario a editar
                'calle' => $_POST['Calle'],
                'colonia' => $_POST['Colonia'],
                'municipio' => $_POST['Municipio'],
                'localidad' => $_POST['Localidad'],
                'referencia' => $_POST['Referencia'],
                'ID' => $_POST['id']
                

            );
            //llamamos al metodo del modelo que actualiza los datos del usuario
         $modelo = new UserModel();
         $modelo->updateD($datos);
         //redireccionamos al index de usuarios
         header("Location:?C=UserController&M=index");

        }
        
    }


    //Creamos el metodo para eliminar un usuario de la base de datos, este metodo se llamara una vez que 
    //se haya confirmado la eliminacion del usuario en la vista de index mediante un confirm de javascript
    public function Delete()
    {

        //verificamos que el metodo de envio de datos sea GET
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //obtenemos el id del usuario a eliminar
            $id = $_GET['id'];

            //llamamos al metodo del modelo que elimina al usuario de la base de datos
            //creo un segundo modelo para rescatar el registro con el nombre
            $this->modelo = new UserModel();
            $usuario = $this->modelo->getById($id);
            //eliminamos el registro
            unlink("app/View/avatars/" . $usuario['Imagen_U']);
            $direccionUsuario = $usuario['Fk_direccion'];
            $modeloDireccion = new DireccionModel();
            $modeloDireccion->delete($direccionUsuario);
            $modelo = new UserModel();
            $modelo->delete($id);

            //redireccionamos al index de usuarios
            header("Location:?C=UserController&M=index");
        }

    }

    public function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->modelo = new UserModel();
            $usuario = $this->modelo->getCredentials($_POST['user'], $_POST['pass']);

            if ($usuario == false) {
                // El usuario no existe o las credenciales son incorrectas
                header("Location:?C=UserController&M=CallFormAdd");


            } else {
                // El usuario existe, verificar el valor de Permisos
                if ($usuario['Permisos'] == 1) {
                    // Usuario con permisos 1 (usuarios públicos)
                    session_start();
                    $_SESSION['logedin'] = true;
                    $_SESSION['nombre'] = $usuario['Nombre'] . ' ' . $usuario['Apaterno'] . ' ' . $usuario['Amaterno'];
                    $vista = "app/View/public/indexPublicView.php"; // Cambia a la vista de usuarios públicos si es necesario
                    include_once("app/View/public/PlantillaPublicView.php");
                } else {
                    // Usuario con permisos 0 (parte administrativa)
                    session_start();
                    $_SESSION['logedin'] = true;
                    $_SESSION['nombre'] = $usuario['Nombre'] . ' ' . $usuario['Apaterno'] . ' ' . $usuario['Amaterno'];
                    $vista = "app/View/admin/indexAdminView.php";
                    include_once("app/View/admin/PlantillaAdminView.php");
                }

                /*  include_once("app/View/admin/PlantillaAdminView.php"); */
            }
        }
    }


    public function cerrar()
    {
        session_start();
        unset($_SESSION['logedin']);

        header("Location: http://localhost/PHP/PROYECTO_U/");


    }

}