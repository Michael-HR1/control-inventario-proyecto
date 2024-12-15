<?php
include('php/db.php');
require('fpdf/fpdf.php');


$query = "SELECT 
inv.id_producto,
inv.producto,
inv.descripcion,
inv.cantidad,
inv.precio_unitario,
inv.fecha_ingreso,
inv.estado,
cat.nombre_categoria AS categoria,
prov.nombre_proveedor AS proveedor
FROM
inventario as inv
LEFT JOIN 
categorias AS cat ON inv.id_categoria = cat.id_categoria
LEFT JOIN
proveedores AS prov ON inv.id_proveedor = prov.id_proveedor;
    ";
$result = $conexion->query($query);

//Instancia para fpdf
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('arial', 'b', 14);

//Titulo
$pdf->Cell(0, 10, 'Inventario disponible', 1, 1, 'C');
$pdf->Ln(5);

//Encabezado
$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(19, 10, 'Producto', 1);
$pdf->Cell(42, 10, 'Descripcion', 1);
$pdf->Cell(18, 10, 'Cantidad', 1);
$pdf->Cell(29, 10, 'Precio Unitario', 1);
$pdf->Cell(19, 10, 'Categoria', 1);
$pdf->Cell(21, 10, 'Proveedor', 1);
$pdf->Cell(28, 10, 'Fecha Ingreso', 1);
$pdf->Cell(15, 10, 'Estado', 1);
$pdf->Ln();

//Tbody
$pdf->SetFont('arial', '', 8);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(19, 10, $row['producto'], 1);
        $pdf->Cell(42, 10, $row['descripcion'], 1);
        $pdf->Cell(18, 10, $row['cantidad'], 1);
        $pdf->Cell(29, 10, $row['precio_unitario'], 1);
        $pdf->Cell(19, 10, $row['categoria'], 1);
        $pdf->Cell(21, 10, $row['proveedor'], 1);
        $pdf->Cell(28, 10, $row['fecha_ingreso'], 1);
        $pdf->Cell(15, 10, $row['estado'], 1);
        $pdf->Ln();
    }
}else {
    $pdf->Cell(0, 10, 'No se eoncontro registros', 1, 1, 'c');
}



//Salida archivo pdf
$pdf->Output('d', 'Reporte.pdf');
