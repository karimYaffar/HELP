<link rel="stylesheet" href="app/Pagina/Login/Diseño_Lo.css">
<link rel="stylesheet" href="app/Pagina/Inicio/Diseño.css">
  <div class="login-box">
    <form action="?C=UserController&M=Login" method="post"   name="login" id="login">
      <h2>Iniciar sesión</h2>

      <div class="user-box">
        <input type="text" name="user" id="user" placeholder="Usuario" required >
        <label for="user">Usuario</label>
      </div>
      <div class="user-box">
        <input type="password" name="pass" id="pass" placeholder="Contraseña" required  >
        <label for="pass">Contraseña</label>
      </div>
      <div class="user-box">
        <tr><label >Usted no esta registrao? </label> <a>Registrarse aqui</a> </tr>
      </div>

      <button type="submit" >Iniciar sesión</button>
    </form>
  </div>

 


