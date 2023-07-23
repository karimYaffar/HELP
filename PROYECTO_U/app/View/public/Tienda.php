<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="app/Pagina/Compra/Estilo.css">



<div class="busqueda">

    <input class="main-header__input" type="text" name="buscar" placeholder="Buscar">
</div>

<section class="contenedor">
    <!-- Contenedor de elementos -->
    <div class="contenedor-items">
        <?php

        foreach ($datos as $datos) {
            echo ' <div class="item">';
            echo ' <span class="titulo-item"> ' . $datos['Nombre_producto'] . '</span>';
            echo '<img src="app/Pagina/IMagen/' . $datos['Imagen'] . '" alt="" class="img-item">';
            echo ' <span class="precio-item">' . $datos['Precio'] . '</span>';
            echo ' <h4 class="existencias">Existencias:"' . $datos['Existencias'] . '" </h4>';
            echo ' <h4 class="existencias"> ' . $datos['Descripcion'] . '</h4>';
            // mi_vista.php
        
            if (isset($_SESSION['logedin']) && $_SESSION['logedin'] == true) {
                // Mostrar el botón con el efecto script
                echo '<button class="boton-item">Agregar al Carrito</button>';
            } else {
                // Redirigir a otro sitio (por ejemplo, formulario de inicio de sesión)
                echo "<button onclick='mensaje()'>Agregar al Carrito</button>";
            }

            echo "</div>";




        }
        ?>


        <script src="app/View/admin/Alerta.js">
        
        </script>
        <script>

            // Creamos la función para eliminar un usuario por medio de su id y confirmamos si se desea eliminar
            function mensaje() {
                const mensaje = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                mensaje.fire({
                    title: 'Usted no esta logeado!!',
                    text: "Gustaria logearse!?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, !',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href ="?C=UserController&M=CallFormAdd"


                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        mensaje.fire(
                            'Cancelado',
                            '',
                            'error'
                        )
                    }
                })
               

            }

    </script>
    </div>
                <!-- Carrito de Compras -->
                <div class="carrito" id="carrito">
                    <div class="header-carrito">
                        <h2>Tu Carrito</h2>
                    </div>


                    <div class="carrito-items">
                        <!-- dentro de de este contenedor se encontrara la imagen del producto que llamaremos -->

                    </div>
                    <div class="carrito-total">
                        <div class="fila">
                            <strong>Tu Total</strong>
                            <span class="carrito-precio-total">

                            </span>
                        </div>
                        <button href="?C=ControllerCompra&M=CallFormAdd" class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i> </button>
                    </div>
                </div>

    
</section >
<script src="app/Pagina/Compra/java.js"></script>
