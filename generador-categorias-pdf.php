<?php
include('php/db.php');
require('fpdf/fpdf.php');


$query = "SELECT id_categoria , nombre_categoria, descripcion FROM categorias";
$result = $conexion->query($query);

//Instancia para fpdf
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('arial', 'b', 14);

//Titulo
$pdf->Cell(0, 10, 'CATEGORIAS', 1, 1, 'C');
$pdf->Ln(5);

//Encabezado
$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(10, 10, 'ID', 1);
$pdf->Cell(42, 10, 'Nombre categorias', 1);
$pdf->Cell(28, 10, 'Descripción', 1);
$pdf->Ln();

//Tbody
$pdf->SetFont('arial', '', 8);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(10, 10, $row['id_categoria'], 1);
        $pdf->Cell(42, 10, $row['nombre_categoria'], 1);
        $pdf->Cell(28, 10, $row['descripcion'], 1);
        $pdf->Ln();
    }
}else {
    $pdf->Cell(0, 10, 'No se eoncontro registros', 1, 1, 'c');
}



//Salida archivo pdf
$pdf->Output('d', 'Reporte.pdf');
