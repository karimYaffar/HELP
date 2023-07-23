<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Resto de tus etiquetas en el head -->
</head>


<link rel="stylesheet" href="app/Pagina/Inicio/Diseño.css">
<link rel="stylesheet" href="app/Pagina/Registro/diseño.css">
<div class="containerr">
  <div class="title">Registrate</div>
  <div class="content">
    <form action="?C=UserController&M=Add" enctype="multipart/form-data" method="post">
      <div class="user-details">
        <div class="input-box">
          <span class="details">Name</span>
          <input type="text" name="nombre" placeholder="Enter your name" required required minlength="4" maxlength="40" pattern="[a-z A-Z]+">
        </div>
        <div class="input-box">
          <span class="details">Apellido Paterno</span>
          <input type="text" name="apaterno" placeholder="Enter your FS" required required minlength="3" maxlength="40" pattern="[a-z A-Z]+">
        </div>
        <div class="input-box">
          <span class="details">Apellido Materno</span>
          <input type="text" name="amaterno" placeholder="Enter your MS" required required minlength="3" maxlength="40" pattern="[a-z A-Z]+">
        </div>

        <div class="input-box">
          <span class="details">Nombre de usuario</span>
          <input type="text" name="username" placeholder="Enter your Username" required required minlength="4" maxlength="18">
        </div>
        <div class="input-box">
          <span class="details">Correo</span>
          <input type="text" name="email" placeholder="Enter your email" >
        </div>
        <div class="input-box">
          <span class="details">Phone Number</span>
          <input type="text" name="numero" placeholder="Enter your number" 
          minlength="10" maxlength="10" required pattern="[0-9]+">
        </div>
        <div class="input-box">
          <span class="details">Contraseña</span>
          <input type="password" name="password" id="pass" placeholder="Enter your password"  required required minlength="5" maxlength="18>
        </div>
        <div class="input-box">
          <span class="details">Confirmar Contraseña</span>
          <input type="password" id="pass2" placeholder="Confirm your password" required>
          <td>
              <div id="crear"> </div> 
          </td>
        </div>
        <div class="input-box">
          <span class="details">Colonia</span>
          <input type="text" name="Colonia" id="Colonia" placeholder="Neighborhood" required minlength="4" maxlength="40"
            pattern="[a-z A-Z]+">
        </div>
        <div class="input-box">
          <span class="details">Calle</span>
          <input type="text" name="Calle" id="Calle" placeholder="Street" required minlength="4" maxlength="40"
            pattern="[a-z A-Z]+">
        </div>
        <div class="input-box">
          <span class="details">Municipio</span>
          <input type="text" name="Municipio" id="Municipio" placeholder="Town city" required minlength="5"
            maxlength="40" pattern="[a-z A-Z]+">
        </div>
        <div class="input-box">
          <span class="details">Localidad</span>
          <input type="text" name="Localidad" id="Localidad" placeholder="State" required minlength="5"
            maxlength="40" pattern="[a-z A-Z]+">
        </div>
        <div class="input-box">
          <span class="details">Referencia</span>
          <input type="text" name="Referencia" id="Referencia" placeholder="Residential address" required minlength="0"
            maxlength="40" pattern="[a-z A-Z]+">
        </div>
        
          
          <label for="avatar">Imagen de perfil de usuario : </label><br>
      <input type="file" name="ava" id="ava" accept="image/* ">
        </div>

      </div>
      
      <?php
            if (isset($_SESSION['error'])) {
              echo '';
              echo $_SESSION['error'];
              unset($_SESSION['error']);
            } ?>

      <div class="button">
        <button type="submit" value="Register"
        
        > > Registrar <

      </button>
      
        
       
      </div>
     
    </form>      
  </div>
</div>
<script src="app/Pagina/Registro/Fromulario.js"></script>