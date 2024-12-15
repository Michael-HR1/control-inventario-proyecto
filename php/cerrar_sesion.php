<?php
session_start();

session_unset();
session_destroy();

// Eliminar la cookie 'usuario'
/* if (isset($_COOKIE['usuario'])) {
    setcookie('usuario', $usuario, time() - 10, '/'); // Asegúrate de usar la misma ruta que al crearla
} */

header("Location: ../home.php");
exit();


?>