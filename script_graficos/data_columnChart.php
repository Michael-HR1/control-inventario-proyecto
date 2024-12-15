<?php
include('../php/db.php');

// Consultar 
$sql = "SELECT c.nombre_categoria, SUM(i.cantidad*i.precio_unitario) 
AS total_productos FROM inventario AS i JOIN categorias AS c ON i.id_categoria = c.id_categoria
GROUP BY c.nombre_categoria ORDER BY 'total_productos' ASC";
$result = $conexion->query($sql);

$data = [];
if ($result->num_rows > 0) {
    $data[] = ['categoria', 'total Q'];
    while($row = $result->fetch_assoc()) {
        $data[] = [$row['nombre_categoria'], (float)$row['total_productos']];
    }
}

echo json_encode($data);


?>