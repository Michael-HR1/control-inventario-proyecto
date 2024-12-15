<?php include('includes/header.php'); ?>

<?php
include('php/db.php');

if (isset($_POST['submit'])) {
    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio_uni = $_POST['precion-uni'];
    $categoria = $_POST['categoria'];
    $proveedor = $_POST['proveedor'];
    $estado = $_POST['estado'];

    //echo "Usuario  $name  Contraseña $password  Telefono $telefono";

    $query = "INSERT INTO inventario(producto, descripcion, cantidad, precio_unitario, id_categoria, id_proveedor, estado) VALUES ('$producto', '$descripcion', '$cantidad', '$precio_uni', '$categoria', '$proveedor', '$estado')";

    if ($conexion->query($query) == TRUE) {
        $_SESSION['message'] = "Registro Insertado exitosamente";
        $_SESSION['message_type'] = 'success';
        header('Location: mostrar-producto.php');
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
                        <h1>Agregar El Nuevo Producto</h1>

                        <!-- Agregar formulario -->

                        <form action="nuevo-producto.php" method="POST">

                            <div class="mb-3">
                                <label for="name">Nombre del producto</label>
                                <input type="text" name="producto" class="form-control" require>
                            </div>

                            <div class="mb-3">
                                <label for="text">Descripción</label>
                                <input type="text" name="descripcion" class="form-control" require>
                            </div>

                            <div class="mb-3">
                                <label for="phone">Cantidad</label>
                                <input type="number" name="cantidad" class="form-control" require>
                            </div>

                            <div class="mb-3">
                                <label for="text">Precio Unitario</label>
                                <input type="text" name="precion-uni" class="form-control" require>
                            </div>

                            <div class="mb-3">
                                <?php
                                $query = "SELECT id_categoria, nombre_categoria FROM categorias";
                                $result = $conexion->query($query);
                                if ($result->num_rows > 0) {
                                    echo "<label for='categoria'>categoria</label>";
                                    echo "<select name='categoria' id='categoria' class='form-select'>";
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id_categoria'] . '">' . $row['nombre_categoria'] . '</option>';
                                    }
                                    echo '</select>';
                                } else {
                                    echo 'No hay categorias';
                                }
                                ?>
                            </div>

                            <div class="mb-3">
                                <?php
                                $query = "SELECT id_proveedor, nombre_proveedor FROM proveedores";
                                $result = $conexion->query($query);
                                if ($result->num_rows > 0) {
                                    echo "<label for='proveedor'>Estado</label>";
                                    echo "<select name='proveedor' id='proveedor' class='form-select'>";
                                    while ($row = $result->fetch_assoc()) {
                                        echo '<option value="' . $row['id_proveedor'] . '">' . $row['nombre_proveedor'] . '</option>';
                                    }
                                    echo '</select>';
                                } else {
                                    echo 'No hay categorias';
                                }
                                ?>
                            </div>

                            <div class="mb-3">
                                <label for="estado">Estado</label>
                                <input type="text" name="estado" class="form-control" require>
                            </div>
                            <button type="submit" name="submit" class="btn btn-success">Agregar</button>

                        </form>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include('includes/footer.php'); ?>