<style>
    body {
        /* display: flex; */
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        padding: 20px;
        font-family: Arial, sans-serif;
        color: #f2f2f2;
    }

    h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }

    p {
        font-size: 16px;
        line-height: 1.5;
        color: #666;
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        transform: scale(1.01);
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    button {
        padding: 6px 12px;
        font-size: 14px;
        border-radius: 4px;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    table tbody tr:hover {
        background-color: #4caf50;
        transform: scale(1.01);
    }

    .nose {
        margin-top: 9rem;
    }
     /* Estilos responsivos */
     @media screen and (max-width: 768px) {
            /* Ajustar el tamaño de fuente para pantallas pequeñas */
            h2 {
                font-size: 20px;
            }

            p {
                font-size: 14px;
            }

            table {
                font-size: 14px;
            }

            /* Ajustar el margen superior para pantallas pequeñas */
            .nose {
                margin-top: 4rem;
            }
        }
</style>

<div class="nose">
    <h2>Administración de usuarios</h2>
    <p>
    La zona administrativa de productos es una sección restringida para los administradores de la página web. Aquí, pueden llevar a cabo cuatro acciones principales: consultar, editar, añadir y eliminar productos. Mediante la consulta, acceden a detalles y estadísticas de cada producto. Con la edición, modifican información relevante de los productos. La función de añadir les permite crear nuevos productos con sus respectivas especificaciones. Finalmente, mediante la acción de eliminar, pueden desactivar o retirar productos del catálogo. Estas acciones permiten a los administradores mantener actualizado y optimizado el inventario de productos en la página web.
    </p>
    <!-- Agregar plantilla para agregar usuarios -->
    <p>
        <a href="?C=ControllerProducto&M=CallFormpro">Agregar nuevo producto</a>
    </p>
    <!-- Aquí va una tabla con los usuarios -->
    <div style="overflow-x: auto;">
    <table border="1">
        <thead>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Existencias</td>
            <td>Precio</td>
            <td>IMagen</td>
        </thead>
        <tbody>

            <?php
            foreach ($datos as $dato) {
                echo "<tr>";
                echo "<td>" . $dato['Nombre_producto'] . "</td>";
                echo "<td>" . $dato['Descripcion'] . "</td>";
                echo "<td>" . $dato['Existencias'] . "</td>";
                echo "<td>" . $dato['Precio'] . "</td>";
               /*  echo "<td>" . $dato['Imagen'] . "</td>"; */
                echo "<td>
                        <button onclick='editar(" . $dato['ID_productos'] . ")'>Editar</button><br>
                        <button onclick='eliminar(" . $dato['ID_productos'] . ")'>Eliminar</button>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</div>
<script src="app/View/admin/Alerta.js">

</script>
<script>

    // Creamos la función para eliminar un usuario por medio de su id y confirmamos si se desea eliminar
    function eliminar(id) {
        const ANUNCIO = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        ANUNCIO.fire({
            title: 'Estas seguro de eliminar el producto?',
            text: "El producto se eliminara!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                
                ANUNCIO.fire(
                    {
                        title:'Eliminado',
                        text:'Elimino el producto',
                        icon: 'success',
                        timer: 100000,
                        timerProgress: true
                    }
                    /* 'Deleted!',
                    'Your file has been deleted.',
                    'success' */
                    
                ).then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "?C=ControllerProducto&M=Delete&id=" + id;

                    }
                }
                )
                
                
                
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                ANUNCIO.fire(
                    'Cancelado',
                    'El produto esta asalvo :)',
                    'error'
                )
            }
        })
        
         
    }

    // Creamos la función para editar un usuario por medio de su id
    function editar(id) {
        window.location.href = "?C=ControllerProducto&M=CallFormEditpro&id=" + id;
    }

    function ok(id) {
        alert("?C=ControllerProductor&M=Delete&id=" + id)
    }
</script>