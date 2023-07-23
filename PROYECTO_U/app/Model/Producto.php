<?php
class Modelo_Producto
{
    // Declaracion de la variable para la conexion
    private $productoConnection;

    // Constructor para inicializar la variable de conexion
    public function __construct()
    {   
        // Importacion del archivo conexion de php
        require_once("app/config/DBConnection.php");

        // Inicializacion de la variable de conexion
        $this->productoConnection = new DBConnection();
    
    }   

    // Metodos para la insercion, eliminacion y actualizacion de datos, asi como metodos para obtener datos

    // Obtener todos los datos
    public function getAll()
    {
        // Creamos el codigo de la consulta
        $__query = "Call Getallproducto()";
        
        // Obtenenmos la conexion de la clase padre
        $__connection = $this->productoConnection->getconnection();

        // Ejecutamos la consulta donde obtendremos los resultados
        $__result = $__connection->query($__query);

        // Instanciamos una variable de tipo array
        $__productos = array();

        // Obtenemos resultados para guardarlos en la variable
        while($__producto = $__result->fetch_assoc())
            $__productos[] = $__producto;

        // Cerramos la conexion
        $this->productoConnection->closeConecction();

        return $__productos;

    }

    public function getById($id)
    {
        // Creamos el codigo de la consulta
        $__query = "Call Getproducto($id)";

        // Obtenemos la conexion de la clase padre
        $__connection = $this->productoConnection->getconnection();

        // Ejecutamos la consulta
        $__result = $__connection->query($__query);

        // Verficamos los resultados
        if($__result && $__result->num_rows > 0)
            $__producto = $__result->fetch_assoc();
        else
            $__producto = false;
        
        // Cerramos la conexion
        $this->productoConnection->closeConecction();

        // Retornamos el resultado
        return $__producto;
    }


    public function insertprodu($dato)
    {
        //paso1 creamos la consulta 
        $sql_p = "
                CALL Insertproducto
                ('" . $dato['nombre'] . "',
                '" . $dato['producto'] . "',
                '" . $dato['precio'] . "',
                '" . $dato['existencias'] . "',
                '" . $dato['Imagen'] . "')";
        //paso 2 conectamos a la base de datos
        $connection = $this->productoConnection->getConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql_p);
        
        //paso 4 preparamos la respuesta
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        //paso 5 cerramos la coneccion
        $this->productoConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }
   

    
    public function updateproducto($productos){
        //paso1 creamos la consulta
        
        $sql="Call Actualizarproducto (
        '".$productos["nombre"]."',
        '".$productos['descripcion']."', 
        '".$productos['precio']."',
        '".$productos['existencias']."',
        '".$productos['IMG']."',
        '".$productos['ID_productos']."'
        )";
        
       
        //paso 2 conectamos a la base de datos
        $connection =$this->productoConnection->getconnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        //paso 5 cerramos la coneccion
        $this->productoConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }

    public function delete($id){
        //paso1 creamos la consulta
        $sql="Call Deleteproducto($id)";
        //paso 2 conectamos a la base de datos
        $connection =$this->productoConnection->getConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        //paso 5 cerramos la coneccion
        $this->productoConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }


 
}
?>