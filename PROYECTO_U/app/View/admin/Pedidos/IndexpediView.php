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
    La zona administrativa de pedidos es una sección exclusiva para los administradores de la página web, donde pueden gestionar las compras realizadas por los usuarios. Aquí, se llevan a cabo tres acciones principales: consultar, editar y eliminar pedidos. Mediante la consulta, los administradores acceden a los detalles y el estado de cada pedido, incluyendo la información del cliente y los productos adquiridos. Con la función de edición, pueden actualizar la información relevante de los pedidos si es necesario. Finalmente, mediante la acción de eliminar, tienen la capacidad de cancelar pedidos o ajustar su estado según corresponda. Estas acciones permiten a los administradores mantener un control preciso y garantizar una gestión efectiva del proceso de compras, asegurando una experiencia satisfactoria para los clientes.
    </p>
    
    
    <!-- Aquí va una tabla con los usuarios -->
    <div style="overflow-x: auto;">
    <table border="1">
        <thead>
                <td>Nombre Usuario</td>
                <td>Fecha pedido</td>
                <td>Estado</td>
                <td>Total</td>
            </thead>
            <tbody>
            





                <?php
                foreach ($pedidos as $dato) {
                    echo "<tr>";
                    echo "<td>" . $dato['Fk_usuario'] . "</td>";
                    echo "<td>" . $dato['Fecha_pedido'] . "</td>";
                    echo "<td>" . $dato['Fk_estado'] . "</td>";
                    echo "<td>" . $dato['Total'] . "</td>";
                    echo "<td>
                        <button onclick='editar(" . $dato['ID_pedido'] . ")'>Editar</button><br>
                        <button onclick='eliminar(" . $dato['ID_pedido'] . ")'>Eliminar</button>
                    </td>";
                    echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div> 
</div>

<script>
    // Creamos la función para eliminar un usuario por medio de su id y confirmamos si se desea eliminar
    function eliminar(id) {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                
                swalWithBootstrapButtons.fire(
                    {
                        title:'Eliminado',
                        text:'Elimino usuario',
                        icon: 'success',
                        timer: 100000,
                        timerProgress: true
                    }
                    /* 'Deleted!',
                    'Your file has been deleted.',
                    'success' */
                    
                ).then((result) =>{
                    if (result.isConfirmed) {
                        window.location.href = "?C=ControllerPedidos&M=Delete&id=" + id;

                    }
                }
                )
                
                
                
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })

       /*  if (confirm("¿Desea eliminar el usuario?")) {
            window.location.href = "?C=ControllerPedidos&M=Delete&id=" + id;
        } */
        
    }

    // Creamos la función para editar un usuario por medio de su id
    function editar(id) {
        window.location.href = "?C=ControllerPedidos&M=CallFormEditpedi&id=" + id;
    }

    function ok(id) {
        alert("?C=ControllerPedidos&M=Delete&id=" + id)
    }
</script>


