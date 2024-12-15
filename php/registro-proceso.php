<?php
/* session_start(); */

 // Inicia la sesión para usar variables de sesión
include('db.php');

// Validamos que el formulario y que el boton registro haya sido presionado
if(isset($_POST['submit'])) {

    // Obtener los valores enviados por el formulario
    $nombre = $_POST['exampleNombre'];
    $email = $_POST['exampleEmail'];
    $telefono = $_POST['exampletelefono'];
    $contrasena = $_POST['examplePassword'];
    $genero = $_POST['example-radio'];
    
    // Insertamos los datos en la base de datos
    $query = "INSERT INTO  usuario (nombre, email, contra, telefono, id_cargo, id_genero) VALUES ('$nombre', '$email', '$contrasena', $telefono, 2, $genero)";
    $resultado = mysqli_query($conexion, $query);
        if ($resultado) {
            
           /*  $_SESSION['usuario'] = $nombre;
            $_SESSION['id_user'] = $resultado['id_user']; */ 
           
            // Si el usuario y contraseña son correctos, redirige a la aplicación
            $_SESSION['redirect'] = true; // Esto indica que fue un login exitoso
            $_SESSION['message'] = "Te damos la Bienvenida! $usuario"; // Mensaje de éxito
            $_SESSION['message_type'] = "success";// Tipo de alerta para el éxito
           /*  setcookie("usuario", $nombre, time() + 3600, "/"); */
            header("Location: ../index.php");
            exit();
        } else {
            // Si los datos no coinciden, manda mensaje de error
            $_SESSION['message'] = "Error: Usuario o contraseña incorrectos"; // Mensaje de error
            $_SESSION['message_type'] = "danger"; // Tipo de alerta para el error
            header("location: /register.html");
        }
        
        mysqli_close($conexion);
        
}
?>
