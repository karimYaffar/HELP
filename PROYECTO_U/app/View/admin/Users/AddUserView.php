<div>
  <h2>Agregar nuevo usuario</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form 
  action="?C=UserController&M=Add" 
  method="post"
  enctype="multipart/form-data">
    <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" />
    </p>
    <p>
      <label for="apaterno">Apellido Paterno : </label><br />
      <input
        type="text"
        name="apaterno"
        id="apaterno"
        placeholder="Apellido Paterno"
      />
    </p>
    <p>
      <label for="amaterno">Apellido Materno : </label><br />
      <input
        type="text"
        name="amaterno"
        id="amaterno"
        placeholder="Apellido Materno"
      />
    </p>
    <p>
        <label for="user">Usuario : </label><br />
        <input type="text" name="user" id="user" placeholder="Usuario"/>
    </p>
    <p>
        <label for="password">Password : </label><br>
        <input type="password" name="password" id="password" placeholder="Password"/>
    </p>
    <p>
        <label for="Telefono">Telefono : </label><br>
        <input type="tel" name="telefono" id="telefono" placeholder="Telefono"
        minlength="10" required pattern="[0-9]+"/>
    </p>
    <p>
      <label for="Correo">Correo : </label><br>
      <input type="email" name="correo" id="correo" placeholder="Correo Electronico"/>
  </p>
    <p>
      <label for="avatar">Imagen de perfil de usuario : </label><br>
      <input type="file" name="avatar" id="avatar" accept="image/*">
    </p>
    <p><input type="submit" value="Add User"></p>
  </form>
</div>