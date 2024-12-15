<?php
session_start();
include('db.php');
$email = $_POST['email'];
$contraseña = $_POST['password'];
$_SESSION['email'] = $email;
/* $_SESSION['usuario'] = $usuario; */

// Consulta SQL para verificar el usuario y la contraseña
$consulta = "SELECT * FROM usuario WHERE email='$email' AND contra='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_fetch_array($resultado);

if ($filas) {
    // Guardar el id_user en la sesión
    $_SESSION['id_user'] = $filas['id_user'];  // Esta línea guarda el ID del usuario en la sesión

    if ($filas['id_cargo'] == 1) { // Administrador
        $_SESSION['redirect'] = true;
        $_SESSION['message'] = "Bienvenido administrador $usuario!";
        $_SESSION['message_type'] = "success";
        setcookie("usuario", $usuario, time() + 3600, "/"); // Establecer cookie
        header("Location: ../administrado.html");
    } elseif ($filas['id_cargo'] == 2) { // Cliente
        $_SESSION['redirect'] = true;
        $_SESSION['message'] = "Bienvenido $usuario!";
        $_SESSION['message_type'] = "success";
        setcookie("usuario", $usuario, time() + 3600, "/");
        header("Location: ../home.php");
        exit();
    }
} else {
    // Si no se encuentra el usuario o la contraseña es incorrecta
    $_SESSION['message'] = "Usuario o contraseña incorrectos.";
    $_SESSION['message_type'] = "danger";
    header("Location: ../index.php");
}

// Liberar resultado y cerrar conexión
mysqli_free_result($resultado);
mysqli_close($conexion);
