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
    <form action="?C=ControllerGarantia&M=Editgarantia"
       method="post"
       enctype="multipart/form-data">
      <div class="user-details">
        <div class="input-box">
        <span class="details">Producto ID</span>
          <input type="text" name="producto" id="producto" placeholder="ID del producto" value="<?= $datos['Fk_producto'] ?>" required >
        </div>
        <div class="input-box">
          <span class="details">Usuario</span>
          <input type="text" name="username" id="username" placeholder="Usuario" value="<?= $datos['Fk_usuario'] ?>"required >
        </div>
        <div class="input-box">
          <span class="details">ID de Forma </span>
          <input type="text" name="forma" id="forma" placeholder="1=Dinero,2=Producto" required value="<?= $datos['FK_forma'] ?>" pattern="[0-9]+">
        </div>

        <div class="input-box">
          <span class="details">Fecha</span>
          <input type="date" name="fecha" id="fecha" placeholder="Fecha" required value="<?= $datos['Fecha'] ?>" pattern="[0-9]+">
        </div>
        <div class="input-box">
          <span class="details">Razon</span>
          <input type="text" name="razon" id="razon" placeholder="Razon de la garantia" value="<?= $datos['Razon'] ?>" >
        </div>
      </div>

      <div class="button">
        <button type="submit" value="Register"> Registrar </button>
      </div>
    </form>
  </div>
</div>