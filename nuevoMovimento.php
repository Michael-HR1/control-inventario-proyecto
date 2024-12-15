<?php include('includes/header.php'); ?>

<?php
include('php/db.php');

if (isset($_POST['submit'])) {
    $producto = $_POST['producto'];
    $tipo_movimiento = $_POST['tipo_movimiento'];
    $cantidad = $_POST['cantidad'];
    $observacion = $_POST['observacion'];
    

    //echo "Usuario  $name  Contraseña $password  Telefono $telefono";

    $query = "INSERT INTO movimientos (id_producto, tipo_movimiento, cantidad, observacion) VALUES
    ('$producto', '$tipo_movimiento', '$cantidad', '$observacion')";

    if ($conexion->query($query) == TRUE) {
        $_SESSION['message'] = "Registro Insertado exitosamente";
        $_SESSION['message_type'] = 'success';
        header('Location: cosultas_movimiento.php');
    } else {
        echo "Error de conexión";
    }
}

?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include('includes/sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('includes/topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="container mt-5">
                        <h1>Registro de Movimiento</h1>

                        <!-- Agregar formulario -->

                        <form action="nuevoMovimento.php" method="POST">

                            

                            <div class="mb-3">
                                <?php
                                $query = "SELECT id_Producto, producto FROM inventario";
                                $result = $conexion->query($query);
                                if ($result->num_rows > 0) {
                                    echo "<label for='categoria'>Producto</label>";
                                    echo "<select name='producto' id='producto' class='form-select'>";
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id_Producto'] . '">' . $row['producto'] . '</option>';
                                    }
                                    echo '</select>';
                                } else {
                                    echo 'No hay categorias';
                                }
                                ?>
                            </div>

                            <div class="mb-3">
                                <?php
                                $query = "SELECT DISTINCT tipo_movimiento FROM movimientos";
                                $result = $conexion->query($query);
                                if ($result->num_rows > 0) {
                                    echo "<label for='proveedor'>Movimento</label>";
                                    echo "<select name='tipo_movimiento' id='tipo_movimiento' class='form-select'>";
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['tipo_movimiento'] . '">' . $row['tipo_movimiento'] . '</option>';
                                    }
                                    echo '</select>';
                                } else {
                                    echo 'No hay categorias';
                                }
                                ?>
                            </div>

                            <div class="mb-3">
                                <label for="text">Cantida</label>
                                <input type="number" name="cantidad" class="form-control" require>
                            </div>

                            <div class="mb-3">
                                <label for="estado">Observación</label>
                                <textarea name="observacion" class="form-control" required></textarea>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Agregar</button>

                        </form>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include('includes/footer.php'); ?>