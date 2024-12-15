<?php
include('../php/db.php');

$id = $_GET['id'];
$query = "SELECT * FROM usuario WHERE id_user =$id";
$result = $conexion->query($query);
$usuario = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    //echo "Usuario  $name  Contraseña $password  Telefono $telefono";

    $query = "UPDATE usuario SET nombre='$name', email='$email', contra='$password', telefono='$phone' WHERE id_user=$id";

    if ($conexion->query($query) == TRUE) {
        $_SESSION['message'] = "Registro $id Actualizado con exito";
        $_SESSION['message_type'] = 'info';
        header('Location: ../tables.php');
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
        <form action="update-usuario.php?id=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="name">Nombre de Usuario</label>
                <input type="text" name="name" class="form-control" value="<?php echo $usuario['nombre']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="email">Correo Electrónico</label>
                <input type="text" name="email" class="form-control" value="<?php echo $usuario['email']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="password">Contraseña</label>
                <input type="text" name="password" class="form-control" value="<?php echo $usuario['contra']; ?>" require>
            </div>

            <div class="mb-3">
                <label for="phone">Teléfono</label>
                <input type="number" name="phone" class="form-control" value="<?php echo $usuario['telefono']; ?>" require>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                <button type="submit" name="submit" class="btn btn-success">Actualizar</button>
            </div>
        </div>
    </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>