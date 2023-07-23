<?php
class Modelo_Pedidos
{
    // Declaracion de la variable para la conexion
    private $pedidosConnection;

    // Constructor para inicializar la variable de conexion
    public function __construct()
    {   
        // Importacion del archivo conexion de php
        require_once("app/config/DBConnection.php");

        // Inicializacion de la variable de conexion
        $this->pedidosConnection = new DBConnection();
    
    }   

    // Metodos para la insercion, eliminacion y actualizacion de datos, asi como metodos para obtener datos

    // Obtener todos los datos
    public function getAll()
    {
        // Creamos el codigo de la consulta
        $__query = "Call Get_allpedido()" ;
        
        // Obtenenmos la conexion de la clase padre
        $__connection = $this->pedidosConnection->getconnection();

        // Ejecutamos la consulta donde obtendremos los resultados
        $__result = $__connection->query($__query);

        // Instanciamos una variable de tipo array
        $__productos = array();

        // Obtenemos resultados para guardarlos en la variable
        while($__producto = $__result->fetch_assoc())
            $__productos[] = $__producto;

        // Cerramos la conexion
        $this->pedidosConnection->closeConecction();

        return $__productos;

    }

    public function getById($id)
    {
        // Creamos el codigo de la consulta
        $__query = "Call get_idpedidos($id)";

        // Obtenemos la conexion de la clase padre
        $__connection = $this->pedidosConnection->getconnection();

        // Ejecutamos la consulta
        $__result = $__connection->query($__query);

        // Verficamos los resultados
        if($__result && $__result->num_rows > 0)
            $__pedido = $__result->fetch_assoc();
        else
            $__pedido = false;
        
        // Cerramos la conexion
        $this->pedidosConnection->closeConecction();

        // Retornamos el resultado
        return $__pedido;
    }


  
   

    
    public function updatepedidos($pedidos){
        //paso1 creamos la consulta
        $sql="Call Actualizarpedido(
       
        '".$pedidos['fecha']."', 
        '".$pedidos['estado']."',
        '".$pedidos['total']."',
        '".$pedidos['ID_pedidos']."'
        )";
        //paso 2 conectamos a la base de datos
        $connection =$this->pedidosConnection->getconnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        //paso 5 cerramos la coneccion
        $this->pedidosConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }

    public function delete($id){
        //paso1 creamos la consulta
        $sql="Call Deletpedido($id)";
        //paso 2 conectamos a la base de datos
        $connection =$this->pedidosConnection->getConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        //paso 5 cerramos la coneccion
        $this->pedidosConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }


 
}
?>