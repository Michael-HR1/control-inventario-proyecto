<?php

include('../php//db.php');

$id = $_GET['id'];

# Consulta de base de datos
$query = "DELETE FROM inventario WHERE id_producto=$id";

if ($conexion->query($query)==TRUE) {
    $_SESSION['message'] = 'Registro eliminado';
    $_SESSION['message_type'] = 'danger';
    header("Location: ../mostrar-producto.php");
}else {
    echo "Error de conexión";
}  


?> 