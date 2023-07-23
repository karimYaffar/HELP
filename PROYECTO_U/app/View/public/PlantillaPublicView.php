<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../Compra/Estilo.css"> -->



</head>
<style> 
body{
    background: url(app/Pagina/IMagen/fondo_3.jpg);
  background-repeat: no-repeat;
    background-size: cover;
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

</style>


  
        <div class="main-header__container">
            <!-- Titulo -->
            <h1 class="__title">ELIXIR</h1>


            <nav class="main-nav" id="main-nav">
                <ul class="menu" id="__menu">
                    <li class="menu__item"><a href="?C=DefaultController&M=index"
                            class="menu__link">Inicio</a></li>
                    <li class="menu__item"><a href="?C=ControllerNosotros&M=index"
                            class="menu__link">Nosotros</a></li>
                    <li class="menu__item"><a href="?C=ControllerPoliticas&M=index"
                            class="menu__link">Politicas</a></li>
                    <li class="menu__item"><a href="?C=ControllerContacto&M=index"
                            class="menu__link">Contacto</a></li>
                    <li class="menu__item"><a href="?C=ControllerTienda&M=index"
                            class="menu__link">Tienda</a></li>        
                            <?php
                             if (!isset($_SESSION))
                             session_start();
                            if (isset ($_SESSION ['logedin'] ) && $_SESSION ['logedin']){
                                echo '<li class="login"><a href="?C=UserController&M=cerrar"
                                class="menu__link">cerrar sesion  </a></li>';
                            }
                            else{
                                echo '<li class="singup"><a href="?C=UserController&M=CallFormLogin"
                                class="menu__link">Login</a></li>';
                                
                                echo '<li class="login"><a href="?C=UserController&M=CallFormAdd"
                                class="menu__link">Sign up  </a></li>';

                            }
                           
                   
                            ?>  
                            
                </ul>
            </nav>
        </div>

        
    </div>
</header>
<?php
include_once($vista);
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