<?php
include('../php/db.php');

// Consultar 
$sql = "SELECT p.nombre_proveedor, SUM(i.cantidad) AS totalproveedor
FROM inventario AS i
JOIN proveedores p on p.id_proveedor = i.id_proveedor
GROUP BY p.nombre_proveedor";
$result = $conexion->query($sql);

$data = [];
if ($result->num_rows > 0) {
    $data[] = ['categoria', 'total Q'];
    while($row = $result->fetch_assoc()) {
        $data[] = [$row['nombre_proveedor'], (float)$row['totalproveedor']];
    }
}

echo json_encode($data);


?>