<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin-top: 10rem;
        padding: 20px;
        font-family: Arial, sans-serif;
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
    input[type="file"],
    select {
        width: 80%;
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
    <h2>Actualización de datos de usuario</h2>
    <!-- En el método action de este formulario llamaremos al método Add de nuestro controlador -->
    <form action="?C=UserController&M=Edit" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Nombre:</label><br />
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= $datos['Nombre'] ?>"  required pattern="[a-z A-Z]+"/>
        </p>
        <p>
            <label for="apaterno">Apellido Paterno:</label><br />
            <input type="text" name="apaterno" id="apaterno" placeholder="Apellido Paterno" value="<?= $datos['Apaterno'] ?>"
            required pattern="[a-z A-Z]+" />
        </p>
        <p>
            <label for="amaterno">Apellido Materno:</label><br />
            <input type="text" name="amaterno" id="amaterno" placeholder="Apellido Materno" value="<?= $datos['Amaterno'] ?>"
            required pattern="[a-z A-Z]+"/>
        </p>
        <p>
            <label for="user">Usuario:</label><br />
            <input type="text" name="user" id="user" placeholder="Usuario" value="<?= $datos['ID_usuario'] ?>" />
        </p>
        <p>
            <label for="password">Contraseña:</label><br />
            <input type="password" name="password" id="password" placeholder="Contraseña" value="<?= $datos['Password'] ?>" />
        </p>
        <p>
            <label for="telefono">Teléfono:</label><br>
            <input type="tel" name="telefono" id="telefono" placeholder="Teléfono" value="<?= $datos['Telefono'] ?>" 
            minlength="10" required pattern="[0-9]+"/>
        </p>
        <p>
            <label for="correo">Correo:</label><br>
            <input type="email" name="correo" id="correo" placeholder="Correo Electrónico" value="<?= $datos['Correo'] ?>" />
        </p>
        <p>
            <label for="avatar">Imagen de perfil de usuario:</label><br>
            <input type="file" name="avatar" id="avatar" accept="image/*">
        </p>
        <p>
             <label for="user">Permisos:</label><br />
             <select name="permisos" id="permisos">
             <option value="0" <?= $datos['Permisos'] === "0" ? "selected" : "" ?>>Administrador</option>
             <option value="1" <?= $datos['Permisos'] === "1" ? "selected" : "" ?>>Usuario</option>
             </select>
        </p>

         <input type="hidden" name="ava" value="<?= $datos['Imagen_U'] ?>">
        <input type="hidden" name="id" value="<?= $datos['ID_usuario'] ?>" readonly id="id" />
        <p><input type="submit" value="Editar" /></p>
    </form>
</div>
