<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Resto de tus etiquetas en el head -->
</head>
<script src="app/Pagina/Registro/Fromulario.js" async></script>

<link rel="stylesheet" href="app/Pagina/Inicio/Diseño.css">
<link rel="stylesheet" href="app/Pagina/Registro/diseño.css">
<div class="containerr">
  <div class="title">Registration</div>
  <div class="content">
    <form action="?C=ControllerProducto&M=Addproducto"
       method="post"
       enctype="multipart/form-data">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Nombre</span>
          <input type="text" name="nombre" placeholder="Nombre del producto" required required minlength="5" maxlength="40" pattern="[a-z A-Z]+">
        </div>
        <div class="input-box">
          <span class="details">Descripcion</span>
          <input type="text" name="descripcion" placeholder="Descripcion" required required minlength="5" maxlength="40" pattern="[a-z A-Z 0-9]+">
        </div>
        <div class="input-box">
          <span class="details">Precio</span>
          <input type="text" name="precio" placeholder="Precio" required pattern="[0-9]+">
        </div>

        <div class="input-box">
          <span class="details">Existencias</span>
          <input type="text" name="existencias" placeholder="Existencias" required pattern="[0-9]+">
        </div>
        <div class="input-box">
          <span class="details">Imagen</span>
          <input type="file" name="imagen" id="imagen" placeholder="Imagen" accept="image/*">
        </div>
      </div>

      <div class="button">
        <button type="submit" value="Register"> Registrar </button>
      </div>
    </form>
  </div>
</div>