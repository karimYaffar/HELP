<?php
class DireccionModel
{ 

    private $UserConnection;

    //definimos el contructor de la clase usermodel
    public function __construct()
    {
        //requiero la clase dbconnection 
        require_once('app/config/DBConnection.php');
        //instranciamos userconnection con dbconnection 
        $this->UserConnection = new DBConnection();
    }


    public function delete($id){
        //paso1 creamos la consulta
        $sql="Call Deletdireccion($id)";
        //paso 2 conectamos a la base de datos
        $connection =$this->UserConnection->getConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql);
        //paso 4 preparamos la respuesta
        if($reslt){
            $res=true;
        }else{
            $res=false;
        }
        //paso 5 cerramos la coneccion
        $this->UserConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }
}