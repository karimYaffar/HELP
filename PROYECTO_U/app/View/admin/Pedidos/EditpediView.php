<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 120vh;
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
        padding-right: 3px;
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
    <h2>Actualización de la compra</h2>
    <!-- En el método action de este formulario llamaremos al método Add de nuestro controlador -->
    <form action="?C=ControllerPedidos&M=Editpedido" method="post" enctype="multipart/form-data">
        <p>
            <label for="nombre">Nombre:</label><br />
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= $datos['Fk_usuario'] ?>" />
        </p>
        <p>
            <label for="apaterno">Fecha pedido:</label><br />
            <input type="date" name="fecha" id="fecha" value="<?= $datos['Fecha_pedido'] ?>" />
        </p>
        <p>
            <label for="apaterno">Estado:</label><br />
            <select name="estado" id="estado">
                <option value="1" <?= $datos['Fk_estado'] === "1" ? "selected" : "" ?>>Preparando</option>
                <option value="2" <?= $datos['Fk_estado'] === "2" ? "selected" : "" ?>>Enviando</option>
                <option value="3" <?= $datos['Fk_estado'] === "3" ? "selected" : "" ?>>Entregado</option>
            </select>
        </p>
        <p>
            <label for="amaterno">Total:</label><br />
            <input type="text" name="total" id="total" placeholder="Total" value="<?= $datos['Total'] ?>" />
        </p>
        <!-- <input type="hidden" name="ava" value=""> -->
        <input type="hidden" name="id" value="<?= $datos['ID_pedido'] ?>" readonly id="id" />
        <p><input type="submit" value="Editar" /></p>
    </form>
</div>
