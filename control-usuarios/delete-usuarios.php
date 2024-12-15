<?php
include('../php/db.php');

$id = $_GET['id'];

# Consulta de base de datos
$query = "DELETE FROM usuario WHERE id_user=$id";

if ($conexion->query($query)==TRUE) {
    $_SESSION['message'] = 'Registro eliminado';
    $_SESSION['message_type'] = 'danger';
    header("Location: ../tables.php");
}else {
    echo "Error de conexión";
}  


?> 