<?php
include('../php/db.php');

 if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    //echo "Usuario  $name  Contraseña $password  Telefono $telefono";

    $query = "INSERT INTO usuario(nombre, email, contra, telefono, id_cargo) VALUES ('$name', '$email', '$password', '$phone', 2)";

    if ($conexion->query($query)==TRUE) {
        
        header('Location: ../tables.php');
    }else {
        echo "Error de conexión";
    }       
    
} 

?>