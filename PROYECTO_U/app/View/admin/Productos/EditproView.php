<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 130vh;
        margin: 0;
       
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
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
        font-size: 24px;
        color: thistle;
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
    select,
    input[type="date"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 10px;
        background-color: white; /* Color de fondo para los campos de entrada */
    }

    input[type="date"] {
        /* Estilos adicionales para el campo de tipo date */
        appearance: none;
        background-image: url('calendar_icon.png'); /* Reemplaza 'calendar_icon.png' con la ruta de tu ícono de calendario */
        background-repeat: no-repeat;
        background-position: right center;
        background-size: 24px;
        padding-right: 32px;
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
    <h2>Actualización de datos del producto</h2>
    <!-- En el método action de este formulario llamaremos al método Add de nuestro controlador -->
    <form action="?C=ControllerProducto&M=Editproducto" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Nombre:</label><br />
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= $datos['Nombre_producto'] ?>" required minlength="3" maxlength="40" pattern="[a-z A-Z]+" />
        </p>
        <p>
            <label for="apaterno">Descripción:</label><br />
            <input type="text" name="descripcion" id="descripcion" placeholder="Descripción" value="<?= $datos['Descripcion'] ?>" required minlength="5" maxlength="40" pattern="[a-z A-Z 0-9]+" />
        </p>
        <p>
            <label for="amaterno">Precio:</label><br />
            <input type="text" name="precio" id="precio" placeholder="Precio" value="<?= $datos['Precio'] ?>" required pattern="[0-9]+(\.[0-9]{1,2})?" />
        </p>
        <p>
            <label for="user">Existencias:</label><br />
            <input type="text" name="existencias" id="existencias" placeholder="Existencias" value="<?= $datos['Existencias'] ?>" required pattern="[0-9]+" />
        </p>
        <p>
            <label for="avatar">Imagen del producto:</label><br>
            <input type="file" name="imagen" id="imagen" accept="image/*">
        </p>
        <input type="hidden" name="ava" value="<?= $datos['Imagen'] ?>">
        <input type="hidden" name="id" value="<?= $datos['ID_productos'] ?>" readonly id="id" />
        <p><input type="submit" value="Editar" /></p>
    </form>
</div>
