<?php
include('../php/db.php');

$id = $_GET['id'];
$query = "SELECT * FROM inventario WHERE id_producto =$id";
$result = $conexion->query($query);
$invetario = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $producto = $_POST['producto'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];
    $precio_uni = $_POST['precion-uni'];
    $categoria = $_POST['categoria'];
    $proveedor = $_POST['proveedor'];
    $estado = $_POST['estado'];

    //echo "Usuario  $name  Contraseña $password  Telefono $telefono";

    $query = "UPDATE inventario 
          SET producto = '$producto', 
              descripcion = '$descripcion', 
              cantidad = '$cantidad', 
              precio_unitario = '$precio_uni', 
              id_categoria = '$categoria', 
              id_proveedor = '$proveedor', 
              estado = '$estado' 
          WHERE id_producto = $id";

    if ($conexion->query($query) == TRUE) {
        header('Location: ../mostrar-producto.php');
    } else {
        echo "Error de conexión";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">

        <h1>Editar producto nuevos/reciente</h1>



        <form action="editar-producto-proceso.php?id=<?php echo $id; ?>" method="POST">

            <div class="mb-3">
                <label for="name">Nombre de producto</label>
                <input type="text" name="producto" class="form-control" value="<?php echo $invetario['producto']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="text">Descripción</label>
                <input type="text" name="descripcion" class="form-control" value="<?php echo $invetario['descripcion']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="number">cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="<?php echo $invetario['cantidad']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="text">Precio Unitario</label>
                <input type="number" step="0.01" name="precion-uni" class="form-control" value="<?php echo $invetario['precio_unitario']; ?>" require>
            </div>

            <div class="mb-3">
                <label for='categoria'>Categoría</label>
                <select name='categoria' id='categoria' class='form-select'>
                    <?php
                    $query = "SELECT id_categoria, nombre_categoria FROM categorias";
                    $result = $conexion->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $selected = ($row['id_categoria'] == $invetario['id_categoria']) ? 'selected' : '';
                            echo '<option value="' . $row['id_categoria'] . '" ' . $selected . '>' . $row['nombre_categoria'] . '</option>';
                        }
                    } else {
                        echo 'No hay categorías';
                    }
                    ?>
                </select>
            </div>


            <div class="mb-3">
                <label for='proveedor'>Proveedor</label>
                <select name='proveedor' id='proveedor' class='form-select'>
                    <?php
                    $query = "SELECT id_proveedor, nombre_proveedor FROM proveedores";
                    $result = $conexion->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $selected = ($row['id_proveedor'] == $invetario['id_proveedor']) ? 'selected' : '';
                            echo '<option value="' . $row['id_proveedor'] . '" ' . $selected . '>' . $row['nombre_proveedor'] . '</option>';
                        }
                    } else {
                        echo 'No hay proveedores';
                    }
                    ?>
                </select>
            </div>


            <div class="mb-3">
                <label for="text">Estado</label>
                <input type="text" name="estado" class="form-control" value="<?php echo $invetario['estado']; ?>" require>
            </div>
            <button type="submit" name="submit" class="btn btn-success">Agregar</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>