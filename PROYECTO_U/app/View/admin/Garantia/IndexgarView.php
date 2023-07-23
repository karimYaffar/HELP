

    
   <style>
 /* Estilos generales */
        body {
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
            /* Ajusta el tamaño de fuente para pantallas pequeñas */
            h2 {
                font-size: 20px;
            }

            p {
                font-size: 14px;
            }

            table {
                font-size: 14px;
            }

            button {
                font-size: 12px;
            }
        }
    </style>
<body>
    <div class="nose">
        <h2>Administración de usuarios</h2>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit eos nobis
            aut aspernatur cumque nam velit, sequi reiciendis hic quae beatae dolorem
            molestiae officiis? Accusantium, molestiae ducimus. Dolores, quas sequi.
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, facilis
            iusto tempore ipsam numquam exercitationem officiis architecto.
            Exercitationem dolor vitae, omnis dolorum libero odit sint amet. Nam ipsum
            unde asperiores! Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Aperiam pariatur eveniet distinctio ut iusto corporis aliquam, dolor
            deserunt hic porro voluptates in officiis officia, quae nemo assumenda
            totam, unde reprehenderit
        </p>
        <!-- Agregar plantilla para agregar usuarios -->
        <p>
            <a href="?C=ControllerGarantia&M=CallFormgar">Agregar nuevo producto</a>
        </p>
        <!-- Aquí va una tabla con los usuarios -->
        <table border="1">
        <thead>
            <td>Producto</td>
            <td>Usuario</td>
            <td>Forma</td>
            <td>Fecha</td>
            <td>Razon</td>
        </thead>
        <tbody>
            <?php
            foreach ($garantia as $dato) {
                echo "<tr>";
                echo "<td>" . $dato['NombreProducto'] . "</td>";
                echo "<td>" . $dato['Fk_usuario'] . "</td>";
                echo "<td>" . $dato['Forma'] . "</td>";
                echo "<td>" . $dato['Fecha'] . "</td>";
                echo "<td>" . $dato['Razon'] . "</td>";
                echo "<td>";
                echo "<details>";
                echo "<summary>Acciones</summary>";
                echo "<button onclick='editar(" . $dato['ID_Garantia'] . ")'>Editar</button><br>";
                echo "<button onclick='eliminar(" . $dato['ID_Garantia'] . ")'>Eliminar</button>";
                echo "</details>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </div>
    <script src="app/View/admin/Alerta.js"></script>
    

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
        window.location.href = "?C=ControllerGarantia&M=CallFormEditgar&id=" + id;
    }

    function ok(id) {
        alert("?C=ControllerProductor&M=Delete&id=" + id)
    }
</script>
        
    </script>
</body>
