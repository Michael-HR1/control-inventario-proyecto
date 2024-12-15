<?php
include('php/db.php');
require('fpdf/fpdf.php');

$query1 = "SELECT SUM(cantidad*precio_unitario) AS total FROM inventario;";
$result1 = $conexion->query($query1);

// Instancia para FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('arial', 'b', 14);

// Ancho de la página y ancho de la celda
$pageWidth = 210; // Ancho de una página A4 en mm
$cellWidth = 60;  // Ancho de cada cuadro

// Calcular la posición X centrada
$centerX = ($pageWidth - $cellWidth) / 2;


// Título
$pdf->Cell(0, 10, 'TOTAL DE COSTOS DISPONIBLES', 1, 1, 'C');
$pdf->Ln(5);

// Encabezado

$pdf->SetX($centerX); // Mueve la posición X al centro
$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(50, 10, 'Suma total de costos', 1, 1, 'C');

// Tbody
$pdf->SetX($centerX); // Mueve la posición X al centro
$pdf->SetFont('arial', '', 8);
if ($fila1 = $result1->fetch_assoc()) {
    $pdf->Cell(50, 10, 'Q ' . number_format($fila1['total'], 2), 1, 1, 'C');
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros', 1, 1, 'C');
}
$pdf->Ln(10);

/* ---------------------------- SEGUNDA CONSULTA ---------------------------- */
$query2 = "SELECT SUM(cantidad) AS total_productos FROM inventario;";
$result2 = $conexion->query($query2);

// Título
$pdf->Cell(0, 10, 'TOTAL DE PRODUCTOS', 1, 1, 'C');
$pdf->Ln(5);

// Encabezado
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(50, 10, 'Total Productos', 1, 1, 'C');

// Tbody
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', '', 8);
if ($fila2 = $result2->fetch_assoc()) {
    $pdf->Cell(50, 10, 'Q ' . number_format($fila2['total_productos'], 2), 1, 1, 'C');
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros', 1, 1, 'C');
}
$pdf->Ln(10);

/* ---------------------------- TERCERA CONSULTA ---------------------------- */
$query3 = "SELECT COUNT(id_categoria) AS tatal_categorias FROM categorias;";
$result3 = $conexion->query($query3);

// Título
$pdf->Cell(0, 10, 'TOTAL DE CATEGORIAS', 1, 1, 'C');
$pdf->Ln(5);

// Encabezado
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(50, 10, 'Total Categorias', 1, 1, 'C');

// Tbody
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', '', 8);
if ($fila3 = $result3->fetch_assoc()) {
    $pdf->Cell(50, 10, number_format($fila3['tatal_categorias']), 1, 1, 'C');
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros', 1, 1, 'C');
}
$pdf->Ln(10);

/* ----------------------------- CUARTA CONSULTA ---------------------------- */
$query4 = "SELECT COUNT(id_proveedor) AS Total_proveedores FROM proveedores;";
$result4 = $conexion->query($query4);

// Título
$pdf->Cell(0, 10, 'TOTAL DE PROVEEDOR', 1, 1, 'C');
$pdf->Ln(5);

// Encabezado
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(50, 10, 'Total de proveedores', 1, 1, 'C');

// Tbody
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', '', 8);
if ($fila4 = $result4->fetch_assoc()) {
    $pdf->Cell(50, 10, number_format($fila4['Total_proveedores']), 1, 1, 'C');
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros', 1, 1, 'C');
}
$pdf->Ln(10);

/* ----------------------------- QUINTO CONSULTA ---------------------------- */
$query5 = "SELECT c.nombre_categoria, SUM(i.cantidad) AS totalxcategoria FROM inventario AS i 
JOIN categorias AS c ON i.id_categoria = c.id_categoria
WHERE c.nombre_categoria = 'carnes'
GROUP BY c.nombre_categoria;";
$result5 = $conexion->query($query5);

// Título
$pdf->Cell(0, 10, 'TOTAL DE COSTOS POR CATEGORIA DE CARNE', 1, 1, 'C');
$pdf->Ln(5);

// Encabezado
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(68, 10, 'Total de costo por categoria carne', 1, 1, 'C');

// Tbody
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', '', 8);
if ($fila5 = $result5->fetch_assoc()) {
    $pdf->Cell(68, 10, number_format($fila5['totalxcategoria'], 2), 1, 1, 'C');
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros', 1, 1, 'C');
}
$pdf->Ln(10);

/* ----------------------------- SEXTA CONSULTA ----------------------------- */
$query6 = "SELECT c.nombre_categoria, SUM(i.cantidad*i.precio_unitario) AS totalxcategoria FROM inventario AS i 
JOIN categorias AS c ON i.id_categoria = c.id_categoria
WHERE c.nombre_categoria = 'Embutido'
GROUP BY c.nombre_categoria;";
$result6 = $conexion->query($query6);

// Título
$pdf->Cell(0, 10, 'TOTAL DE COSTOS POR CATEGORIA DE EMBUTIDOS', 1, 1, 'C');
$pdf->Ln(5);

// Encabezado
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(68, 10, 'Total de costo por categoria Embutidos', 1, 1, 'C');

// Tbody
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', '', 8);
if ($fila6 = $result6->fetch_assoc()) {
    $pdf->Cell(68, 10, number_format($fila6['totalxcategoria'], 2), 1, 1, 'C');
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros', 1, 1, 'C');
}
$pdf->Ln(10);

/* ---------------------------- SEPTIMA CONSULTA ---------------------------- */
$query7 = "SELECT c.nombre_categoria, SUM(i.cantidad*i.precio_unitario) AS totalxcategoria 
FROM inventario AS i 
JOIN categorias AS c ON i.id_categoria = c.id_categoria
WHERE c.nombre_categoria = 'Bebidas'
GROUP BY c.nombre_categoria;";
$result7 = $conexion->query($query7);

// Título
$pdf->Cell(0, 10, 'TOTAL DE COSTO POR CATEGORIA DE BEBIDAS', 1, 1, 'C');
$pdf->Ln(5);

// Encabezado
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(68, 10, 'Total de costo por categoria Bebidas', 1, 1, 'C');

// Tbody
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', '', 8);
if ($fila7 = $result7->fetch_assoc()) {
    $pdf->Cell(68, 10, number_format($fila7['totalxcategoria'], 2), 1, 1, 'C');
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros', 1, 1, 'C');
}
$pdf->Ln(10);

/* ----------------------------- OCTAVA CONSULTA ---------------------------- */
$query8 = "SELECT c.nombre_categoria, SUM(i.cantidad*i.precio_unitario) AS totalxcategoria 
FROM inventario AS i 
JOIN categorias AS c ON i.id_categoria = c.id_categoria
WHERE c.nombre_categoria = 'frutas'
GROUP BY c.nombre_categoria";
$result8 = $conexion->query($query8);

// Título
$pdf->Cell(0, 10, 'TOTAL DE COSTO POR CATEGORIA DE FRUTAS', 1, 1, 'C');
$pdf->Ln(5);

// Encabezado
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', 'b', 10);
$pdf->Cell(68, 10, 'Total de costo por categoria Frutas', 1, 1, 'C');

// Tbody
$pdf->SetX($centerX); // Mueve la posición X al centro

$pdf->SetFont('arial', '', 8);
if ($fila8 = $result8->fetch_assoc()) {
    $pdf->Cell(68, 10, number_format($fila8['totalxcategoria'], 2), 1, 1, 'C');
} else {
    $pdf->Cell(0, 10, 'No se encontraron registros', 1, 1, 'C');
}
$pdf->Ln(10);



// Salida archivo PDF
$pdf->Output('D', 'Reporte2.pdf');
