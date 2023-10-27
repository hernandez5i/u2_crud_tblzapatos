<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conceptos básicos de CRUD con PHP y MySQL">
    <title>Iker Sneacker's</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">IkerSneacker's | Registros</a>
            
        </div>
    </nav>


    <div class="container mt-5">
        <!-- agregar formulario de proveedor -->
        <div class="card mb-5">
            <!-- agregar datos -->
            <div class="card-body">
                <h3 class="card-title">Mi negocio IkerSneacker's</h3>
                <h4 class="card-text">Tabla Zapatos</h4>
                <p class="card-text">Elaborado por: Iker Samuel Requenes Hernandez 5*I</p>

                <!-- mostrar mensaje de éxito agregado -->
                <?php if (isset($_GET['estado'])) : ?>
                    <?php
                    if ($_GET['estado'] == 'Exitoso')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exitoso!</strong> Datos agregados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> No se pudieron agregar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="agregar.php" method="POST">

                    <div class="col-md-12">
                        <label for="Id_Proveedor" class="form-label">Id Proveedor</label>
                        <input type="number" name="Id_Proveedor" class=" form-control" placeholder="00000" required>
                    </div>

                    <div class="col-12">
                        <label for="Estilo" class="form-label">Estilo</label>
                        <input type="text" name="Estilo" class="form-control" placeholder="Tipo" required>
                    </div>
                    <div class="col-md-4">
                        <label for="Color" class="form-label">Color</label>
                        <input type="text" name="Color" class="form-control" placeholder="Rojo" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Precio" class="form-label">Precio</label>
                        <input type="text" name="Precio" class="form-control" placeholder="000" required>
                    </div>

                    <div class="col-md-4">
                        <label for="Descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="Descripcion" class="form-control" placeholder="Tipo" required>
                    </div>

                    <div class="col-md-6">
                        <label for="Talla" class="form-label">Talla</label>
                        <input type="text" name="Talla" class="form-control" placeholder="Talla" required>
                    </div>

                    <div class="col-md-6">
                        <label for="Id_Venta" class="form-label">Id Venta</label>
                        <input type="text" name="Id_Venta" class="form-control" placeholder="Ingresa ID" required>
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="agregar"><i class="fa fa-plus"></i><span class="ms-2">Agregar Datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- título de la tabla -->
        <h5 class="mb-3">Proveedor</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar algo..." aria-label="Buscar" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!-- mostrar mensaje de eliminación exitosa -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'Exitoso')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exitoso!</strong> ¡Datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> No se pudieron eliminar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            ?>
        <?php endif; ?>


        <?php if (isset($_GET['editar'])) : ?>
            <?php
            if ($_GET['editar'] == 'Exitoso')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>¡Éxitoso!</strong>¡Datos actualizados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>¡Ups!</strong> ¡No se pudieron actualizar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabla -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>Id Zapato</th>";
            echo "<th scope='col'>Id Proveedor</th>";
            echo "<th scope='col'>Estilo</th>";
            echo "<th scope='col'>Color</th>";
            echo "<th scope='col'>Precio</th>";
            echo "<th scope='col'>Descripcion</th>";
            echo "<th scope='col'>Talla</th>";
            echo "<th scope='col'>Id Venta</th>";
            echo "<th scope='col' class='text-center'>Opcion</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $limite = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $pagina_principal = ($pagina > 1) ? ($pagina * $limite) - $limite : 0;

            $anterior = $pagina - 1;
            $siguiente = $pagina + 1;

            $datos = mysqli_query($db, "SELECT * FROM zapatos");
            $cantidad_datos = mysqli_num_rows($datos);
            $total_pagina = ceil($cantidad_datos / $limite);

            $datos_zapatos = mysqli_query($db, "SELECT * FROM zapatos LIMIT $pagina_principal, $limite");
            $Id_Zapato = $pagina_principal + 1;

            // $sql = "SELECT * FROM proveedor";
            // $query = mysqli_query($db, $sql);




            while ($zapatos = mysqli_fetch_array($datos_zapatos)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $zapatos['Id_Zapato'] . "</td>";
                echo "<td class='text-center'>" . $Id_Zapato++ . "</td>";
                echo "<td>" . $zapatos['Id_Proveedor'] . "</td>";
                echo "<td>" . $zapatos['Estilo'] . "</td>";
                echo "<td>" . $zapatos['Color'] . "</td>";
                echo "<td>" . $zapatos['Precio'] . "</td>";
                echo "<td>" . $zapatos['Descripcion'] . "</td>";
                echo "<td>" . $zapatos['Talla'] . "</td>";
                echo "<td>" . $zapatos['Id_Venta'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary btnEditar pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                
                echo "
                            <button type='button' class='btn btn-danger btnEliminar pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($cantidad_datos == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total de entradas: $cantidad_datos </p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagination -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$anterior'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_pagina; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_pagina) ? "href='?pagina=$siguiente'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!--Modal Editar-->
        <div class='modal fade' style="top:58px !important;" id='editarModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar Datos de Proveedor</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM zapatos";
                    $query = mysqli_query($db, $sql);
                    $zapatos = mysqli_fetch_array($query);
                    ?>

                    <form action='editar.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='editar_Id_Zapato' id='editar_Id_Zapato'>

                    <div class="col-md-6">
                        <label for="editar_Id_Proveedor" class="form-label">Id Proveedor</label>
                        <input type="number" name="editar_Id_Proveedor" id="editar_Id_Proveedor" class=" form-control" placeholder="00000" required>
                    </div>

                    <div class="col-12">
                        <label for="editar_Estilo" class="form-label">Estilo</label>
                        <input type="text" name="editar_Estilo" id="editar_Estilo" class="form-control" placeholder="Tipo" required>
                    </div>
                    <div class="col-md-4">
                        <label for="editar_Color" class="form-label">Color</label>
                        <input type="text" name="editar_Color" id="editar_Color" class="form-control" placeholder="Rojo" required>
                    </div>

                    <div class="col-md-4">
                        <label for="editar_Precio" class="form-label">Precio</label>
                        <input type="text" name="editar_Precio" id="editar_Precio" class="form-control" placeholder="00" required>
                    </div>

                    <div class="col-md-4">
                        <label for="editar_Descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="editar_Descripcion" id="editar_Descripcion" class="form-control" placeholder="Descríbelo" required>
                    </div>

                    <div class="col-md-6">
                        <label for="editar_Talla" class="form-label">Talla</label>
                        <input type="text" name="editar_Talla" id="editar_Talla" class="form-control" placeholder="00" required>
                    </div>

                    <div class="col-md-6">
                        <label for="editar_Id_Venta" class="form-label">Id_Venta</label>
                        <input type="text" name="editar_Id_Venta" id="editar_Id_Venta" class="form-control" placeholder="Ingresa" required>
                    </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='editar_datos' class='btn btn-primary'>Editar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- Modal Eliminar-->
        <div class='modal fade' style="top:58px !important;" id='eliminarModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                    </div>


                    <form action='eliminar.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='eliminar_id' id='eliminar_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='eliminardatos' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- cerrar el contenedor -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Paquete de Javascript con arranque popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Funcion Editar -->
    <script>
        $(document).ready(function() {
            $('.btnEditar').on('click', function() {
                $('#editarModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#editar_Id_Zapato').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#editar_Id_Proveedor').val(data[2]);
                $('#editar_Estilo').val(data[3]);
                $('#editar_Color').val(data[4]);
                $('#editar_Precio').val(data[5]);
                $('#editar_Descripcion').val(data[6]);
                $('#editar_Talla').val(data[7]);
                $('#editar_Id_Venta').val(data[8]);
            });
        });
    </script>

    <!-- delete function -->
    <script>
        $(document).ready(function() {
            $('.btnEliminar').on('click', function() {
                $('#eliminarModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#eliminar_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>