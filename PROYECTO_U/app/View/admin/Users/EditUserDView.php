<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin-top: 1rem;
        padding: 20px;
        font-family: Arial, sans-serif;
    }
    
     /* Estilo para el input válido */
        input:valid {
         border: 2px solid green;
        /*  background-color: gold; */
         color: blue; /* Letras en verde */
    }

     /* Estilo para el input inválido */
        input:invalid {
        border: 2px solid red;
  
        color: red; /* Letras en rojo */
    }



    .container {
        max-width: 600px;
        background-color: rgba(50, 50, 50, 0.7); 
        background-color:
        
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 24px;
        color: thistle ;
        margin-bottom: 10px;
        text-align: center;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: aliceblue;
    }

    input[type="text"],
    input[type="password"],
    input[type="tel"],
    input[type="email"],
    input[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    input[type="submit"] {
        padding: 8px 12px;
        background-color: #4caf50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<div class="container">
    <h2>Actualización de la direccion del usuario</h2>
    <!-- En el método action de este formulario llamaremos al método Add de nuestro controlador -->
    <form action="?C=UserController&M=EditD" method="post" enctype="multipart/form-data">
        <p>
            <label for="Calle">Calle</label><br />
            <input type="text" name="Calle" id="Calle" placeholder="Calle" value="<?= $datos['Calle'] ?>"  required pattern="[a-z A-Z]+" />
        </p>
        <p>
            <label for="Colonia">Colonia</label><br />
            <input type="text" name="Colonia" id="Colonia" placeholder="Colonia" value="<?= $datos['Colonia'] ?>"
            required pattern="[a-z A-Z]+" />
        </p>
        <p>
            <label for="Municipio">Municipio</label><br />
            <input type="text" name="Municipio" id="Municipio" placeholder="Municipio" value="<?= $datos['Municipio'] ?>" 
            required pattern="[a-z A-Z]+"/>
        </p>
        <p>
            <label for="Localidad">Localidad</label><br />
            <input type="text" name="Localidad" id="Localidad" placeholder="Localidad" value="<?= $datos['Localidad'] ?>" 
            required pattern="[a-z A-Z]+"/>
        </p>
        <p>
            <label for="Referencia">Referencia</label><br />
            <input type="text" name="Referencia" id="Referencia" placeholder="Referencia" value="<?= $datos['Referencia'] ?>" 
            required pattern="[a-z A-Z]+"/>
        </p>
         
        <input type="hidden" name="id" value="<?= $datos['ID_Direccion'] ?>" readonly id="id" />
        <p><input type="submit" value="Editar" /></p>
    </form>
</div>
