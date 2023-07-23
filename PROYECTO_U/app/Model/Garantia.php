<?php
class Modelo_Garantia
{
    // Declaracion de la variable para la conexion
    private $GarantiaConnection;

    // Constructor para inicializar la variable de conexion
    public function __construct()
    {   
        // Importacion del archivo conexion de php
        require_once("app/config/DBConnection.php");

        // Inicializacion de la variable de conexion
        $this->GarantiaConnection = new DBConnection();
    
    }   

    // Metodos para la insercion, eliminacion y actualizacion de datos, asi como metodos para obtener datos

    // Obtener todos los datos
    public function getAll()
    {
        // Creamos el codigo de la consulta
        $__query = "CALL GetAllgar()";
        
        // Obtenenmos la conexion de la clase padre
        $__connection = $this->GarantiaConnection->getconnection();

        // Ejecutamos la consulta donde obtendremos los resultados
        $__result = $__connection->query($__query);

        // Instanciamos una variable de tipo array
        $__garantias = array();

        // Obtenemos resultados para guardarlos en la variable
        while($__garantia = $__result->fetch_assoc())
            $__garantias[] = $__garantia;

        // Cerramos la conexion
        $this->GarantiaConnection->closeConecction();

        return $__garantias;

    }

    public function getById($id)
    {
        // Creamos el codigo de la consulta
        $__query = "Call Getbyidgar($id)";

        // Obtenemos la conexion de la clase padre
        $__connection = $this->GarantiaConnection->getconnection();

        // Ejecutamos la consulta
        $__result = $__connection->query($__query);

        // Verficamos los resultados
        if($__result && $__result->num_rows > 0)
            $__producto = $__result->fetch_assoc();
        else
            $__producto = false;
        
        // Cerramos la conexion
        $this->GarantiaConnection->closeConecction();

        // Retornamos el resultado
        return $__producto;
    }


    public function insertgarantia($dato)
    {
        //paso1 creamos la consulta 
        $sql_p = "
                CALL InsertGarantia
                ('" . $dato['producto'] . "',
                '" . $dato['user'] . "',
                '" . $dato['forma'] . "',
                '" . $dato['fecha'] . "',
                '" . $dato['razon'] . "')";
        //paso 2 conectamos a la base de datos
        $connection = $this->GarantiaConnection->getConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql_p);
        
        //paso 4 preparamos la respuesta
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        //paso 5 cerramos la coneccion
        $this->GarantiaConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }
   

    
    public function updategarantia($dato){
        //paso1 creamos la consulta
        
        $sql= "  CALL InsertGara
        ('" . $dato['producto'] . "',
        '" . $dato['user'] . "',
        '" . $dato['forma'] . "',
        '" . $dato['fecha'] . "',
        '" . $dato['razon'] . "')";
        
       
        //paso 2 conectamos a la base de datos
        $connection =$this->GarantiaConnection->getconnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        //paso 5 cerramos la coneccion
        $this->GarantiaConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }

    public function delete($id){
        //paso1 creamos la consulta
        $sql="Call Deleteproducto($id)";
        //paso 2 conectamos a la base de datos
        $connection =$this->GarantiaConnection->getConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        //paso 5 cerramos la coneccion
        $this->GarantiaConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }


 
}
?>