<style>
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

        .nose {
            margin-top: 9rem;
            overflow-x: auto; /* Agregar desplazamiento horizontal */
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
<body>
    <div class="nose">
        <h2>Administración de usuarios</h2>
        <p>
        La zona administrativa de usuarios es una sección privilegiada y restringida dentro de tu página web, diseñada específicamente para que los administradores y moderadores tengan el control y gestión total sobre los perfiles de los usuarios registrados. Esta área está ubicada generalmente en la parte trasera de la página, accesible solo a través de credenciales de administrador, lo que garantiza la seguridad y la privacidad de la información confidencial.
        </p>
        <!-- Agregar plantilla para agregar usuarios -->
        <p>
            <a href="?C=UserController&M=CallFormAddadmin">Agregar nuevo usuario</a>
        </p>
        <!-- Aquí va una tabla con los usuarios -->
        <div style="overflow-x: auto;">
            <table border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>A Paterno</th>
                        <th>A Materno</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($datos as $dato) {
                        echo "<tr>";
                        echo "<td>" . $dato['Nombre'] . "</td>";
                        echo "<td>" . $dato['Apaterno'] . "</td>";
                        echo "<td>" . $dato['Amaterno'] . "</td>";
                        echo "<td>" . $dato['Telefono'] . "</td>";
                        echo "<td>" . $dato['Correo'] . "</td>";
                        echo "<td><button onclick=' editarD(\"" . $dato['Fk_direccion'] . "\")'>Direccion</button>
                    </td>";
                        echo "<td>
                            <button onclick='editar(\"" . $dato['ID_usuario'] . "\")'>Editar</button><br>
                            <button onclick='eliminar(\"" . $dato['ID_usuario'] . "\")'>Eliminar</button>
                        </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table> 
        </div>
    </div>
</body>
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
                        window.location.href = "?C=UserController&M=Delete&id=" + id;

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
       
    }

    // Creamos la función para editar un usuario por medio de su id
    function editar(id) {
        window.location.href = "?C=UserController&M=CallFormEdit&id=" + id;
    }
    function editarD(id){
        window.location.href = "?C=UserController&M=CallFormEditD&id=" + id;
    }

    function ok(id) {
        alert("?C=UserController&M=Delete&id=" + id)
    }
</script>
