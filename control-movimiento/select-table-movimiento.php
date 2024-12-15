<?php
include('php/db.php');

$query = "SELECT 
    i.producto AS producto,
    m.tipo_movimiento AS tipo_movimiento,
    m.cantidad,
    m.fecha_movimiento,
    m.observacion
FROM inventario AS i
JOIN movimientos AS m 
    ON i.id_producto = m.id_producto
WHERE m.fecha_movimiento = (
    SELECT MAX(m2.fecha_movimiento)
    FROM movimientos AS m2
    WHERE m2.id_producto = m.id_producto
)
ORDER BY m.fecha_movimiento DESC;
";
$result = $conexion->query($query);

while ($row = $result->fetch_assoc()) {
?>
  <tr> <!-- El (tr) es la fila -->
    <td><?php echo $row['producto']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['tipo_movimiento']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['cantidad']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['fecha_movimiento']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['observacion']; ?></td> <!-- el (td) son los cuadritos de cada sección -->

    <!--  <td>
      <a href="#update-usuario.php?id=<?php echo $row['id_user']; ?>" class="btn btn-warning">actualizar</a>
      <a href="#delete-usuarios.php?id=<?php echo $row['id_user']; ?>" class="btn btn-danger">Eliminar</a>
    </td> -->
  </tr>
<?php } ?>