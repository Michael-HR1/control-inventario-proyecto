<?php
include('../php/db.php');

// Consultar 
$sql = "SELECT tipo_movimiento, SUM(cantidad) AS totalcantidad
FROM movimientos
WHERE tipo_movimiento IN ('prestamo', 'regreso')
GROUP BY tipo_movimiento;
";

$result = $conexion->query($sql);

$prestamo = 0;
$regreso = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['tipo_movimiento'] == 'prestamo') {
            $prestamo = (float)$row['totalcantidad'];
        } elseif ($row['tipo_movimiento'] == 'regreso') {
            $regreso = (float)$row['totalcantidad'];
        }
    }
}

// Datos formateados para dos series
$data = [
    ['Tipo Movimiento', 'Prestamo', 'Regreso'],
    ['Total', $prestamo, $regreso]
];

echo json_encode($data);
?>
