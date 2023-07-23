<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../Compra/Estilo.css"> -->
    
    
    <link rel="stylesheet" href="app/Pagina/Inicio/Diseño.css">
</head>
    <script src="app/View/admin/Alerta.js"></script>
<!-- <header class="main-header"> -->
    <div >
        <div class="main-header__container">
        <!-- Titulo --><h1 class="__title">ELIXIR</h1>
            
        
            <nav class="main-nav" id="main-nav">
                <ul class="menu" id="__menu">
                <li class="menu__item"><a href="?C=DefaultController&M=indexadmin" class="menu__link">Inicio</a></li>
                <li class="menu__item"><a href="?C=ControllerUsuario&M=index" class="menu__link">Usuarios</a></li>
                    <li class="menu__item"><a href="?C=ControllerProducto&M=index" class="menu__link">Productos</a></li>
                    <li class="menu__item"><a href="?C=ControllerPedidos&M=index" class="menu__link">Pedidos</a></li>
                 <!--    <li class="menu__item"><a href="?C=ControllerGarantia&M=index" class="menu__link">Garantia</a></li> -->
                    <?php
                      if (!isset($_SESSION))
                      session_start();
                     if (isset ($_SESSION ['logedin'] ) && $_SESSION ['logedin']){
                         echo '<li class="login"><a href="?C=UserController&M=cerrar"
                         class="menu__link">cerrar sesion  </a></li>';
                     }
                    ?>
                </ul>
            </nav>
        </div>
        
        
    </div>
</header>
<?php
include_once ($vista);
?>
<!-- <footer>
        <p>Derechos de Autor &copy; 2023 | ELIXIR </p>
        <nav>
            <ul>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Política de Privacidad</a></li>
                <li><a href="#">Contactanos</a></li>
            </ul>
        </nav>
    </footer> -->

</html>

<style>
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

</style>

