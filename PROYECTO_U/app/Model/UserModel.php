<?php
class UserModel
{
    //creamos un atributo para manipular los datos en la bd
    private $UserConnection;

    //definimos el contructor de la clase usermodel
    public function __construct()
    {
        //requiero la clase dbconnection 
        require_once('app/config/DBConnection.php');
        //instranciamos userconnection con dbconnection 
        $this->UserConnection = new DBConnection();
    }

    //a partir de esto vienen los metodos logicos de la app

    //metodo para obtener todos los usuarios
    public function getAll(){
        //paso 1 creo la consulta
        $sql="Call GetAllUsuario()";
        //paso 2 llamo a la conneccion 
        $connection =$this->UserConnection->getconnection();
        //paso 3 ejecuto la consulta
        $result=$connection->query($sql);
        //paso 4 verifico y acomodo datos 
        //paso 4.1 creo un arreglo para almacenar los usuarios de la bd 
        $users=array();
        //tengo que recorrer $result para ir extrayendo los renglones (registros de usuarios)
        //ocupare un while y la instruccion fetch_assoc
        while($user=$result->fetch_assoc()){
            $users[]=$user;
        }
        //paso 5 cierro la coneccion 
        $this->UserConnection->closeConecction();
        //paso 6 arrojo resultados
        return $users;
    }

    //getById metodo que extrae un usuario por su id
      //getById metodo que extrae un usuario por su id
      public function getById($id){
        //creamos consulta
        $sql="Call Getbyidusuario('$id')";
        
        //obtenemos la coneccion 
        $connection=$this->UserConnection->getConnection();
        //ejecutamos la consulta
        $reslt=$connection->query($sql);
        //verificamos que traiga datos y los sacamos a una variable
        if($reslt && $reslt->num_rows > 0){
            $user=$reslt->fetch_assoc();
        }else{
            $user=false;
        }
        //cerramos la coneccion
        $this->UserConnection->closeConecction();
        //arrojamos resultados
        return $user;
    }

    

    public function getByIdDi($id){
        //creamos consulta
        $sql_d="Call Getiddireccion($id)";
        
        //obtenemos la coneccion 
        $connection=$this->UserConnection->getConnection();
        //ejecutamos la consulta
        $reslt=$connection->query($sql_d);
        //verificamos que traiga datos y los sacamos a una variable
        if($reslt && $reslt->num_rows > 0){
            $user=$reslt->fetch_assoc();
        }else{
            $user=false;
        }
        //cerramos la coneccion
        $this->UserConnection->closeConecction();
        //arrojamos resultados
        return $user;
    }
    //metodo para verificar credenciales de logeo
   //metodo para verificar credenciales de logeo
   public function getCredentials($us,$ps){
    //paso 1 creamos la consulta
    $sql="Call Getcredeusuario('$us','$ps')";
    //paso 2 obtenemos la coneccion
    $connection =$this->UserConnection->getconnection();
    //paso 3 ejecutamos la consulta
    $result=$connection->query($sql);
    //paso 4 verificamos que existan resultados
    if($result && $result->num_rows >0){
        $user=$result->fetch_assoc();                
    }else{
        $user=false;
    }
    //paso 5 cerramos la coneccion
    $this->UserConnection->closeConecction();
    //paso 6 arrojamos el resultado
    return $user;
}

   
    //metodo para insertar usuarios
    public function getLastDireccion()
    {
        // Obteniendo la conexión
        $__connection = $this->UserConnection->getConnection();
        // Creamos la consulta para obtener la ultima id insertada
        $__sql = "SELECT MAX(ID_Direccion) AS max_id FROM direccion";
        // Obteniendo el último ID insertado en la tabla "direccion"
        $lasId = 0;
        $result = $__connection->query($__sql);
        if ($result) {
            $row = $result->fetch_assoc();
            $lasId = $row['max_id'];
        }

        // Retornando el último ID insertado en la tabla "direccion"
        return $lasId;
    }
    public function insert($usuario, $direccion)
    {
        //paso1 creamos la consulta 

        $lasId = $this->getLastDireccion();
        if ($lasId != 0)
            $direccion['Fk_direccion'] = $lasId + 1;
        else
            $direccion['Fk_direccion'] = 1;

        

        $sql_D = " Call InsertDireccion
                ('" . $direccion['Fk_direccion'] . "',
                '" . $direccion['Calle'] . "',
                '" . $direccion['Colonia'] . "',
                '" . $direccion['Municipio'] . "',
                '" . $direccion['Localidad'] . "',
                '" . $direccion['Referencia'] . "' )";

        $usuario['direccion'] = $direccion['Fk_direccion'];

        $sql_U = "Call Insertusuario
            ('" . $usuario['Usuario'] . "',
            '" . $usuario['Nombre'] . "',
            '" . $usuario['ApPaterno'] . "',
            '" . $usuario['ApMaterno'] . "',
            '" . $usuario['Password'] . "',
            '" . $usuario['Numero'] . "',
            '" . $usuario['Email'] . "',
            '" . $usuario['direccion'] . "',
            '" . $usuario['Avatar'] . "')";

        //paso 2 conectamos a la base de datos
        $connection = $this->UserConnection->getConnection();
        //paso 3 ejecutamos la consulta
        $reslt = $connection->query($sql_D);
        $reslt = $connection->query($sql_U);
        //paso 4 preparamos la respuesta
        if ($reslt) {
            $res = true;
        } else {
            $res = false;
        }
        //paso 5 cerramos la coneccion
        $this->UserConnection->closeConecction();
        //paso 6 arrojamos resultados
        return $res;
    }

   
    //metodo para editar usuarios
    //metodo para editar usuarios
    public function update($user){
        //paso1 creamos la consulta
        $sql="Call Upusuario
        (
        '".$user['ID_usuario']."',
        '".$user["Nombre"]."',
        '".$user['Apaterno']."', 
        '".$user['Amaterno']."',
        '".$user['Password']."',
        '".$user['Telefono']."',
        '".$user['Correo']."',
        '".$user['Permisos']."',
        '".$user['Avatar']."'
         
        )";
        //paso 2 conectamos a la base de datos
        $connection =$this->UserConnection->getconnection();
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

    public function updateD($user){
        //paso1 creamos la consulta
        $sql="Call Actualizardireccion
        (
        '".$user['calle']."',
        '".$user["colonia"]."',
        '".$user['municipio']."', 
        '".$user['localidad']."',
        '".$user['referencia']."',
        '".$user['ID']."'
         
        )";
        //paso 2 conectamos a la base de datos
        $connection =$this->UserConnection->getconnection();
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

    //metodo para eliminar usuarios
    //metodo para eliminar un usuario por su ID
    public function delete($id){
        //paso1 creamos la consulta
        $sql="Call Deletusuario('$id')";
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
?>