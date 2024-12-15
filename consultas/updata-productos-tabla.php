<?php

include('./php//db.php');

$query = "SELECT 
inv.id_producto,
inv.producto,
inv.descripcion,
inv.cantidad,
inv.precio_unitario,
inv.fecha_ingreso,
inv.estado,
cat.id_categoria AS categoria,
prov.id_proveedor AS proveedor
FROM
inventario as inv
LEFT JOIN 
categorias AS cat ON inv.id_categoria = cat.id_categoria
LEFT JOIN
proveedores AS prov ON inv.id_proveedor = prov.id_proveedor;";
$result = $conexion->query($query);

while ($row = $result->fetch_assoc()) {
?>
    <tr> <!-- El (tr) es la fila -->
        <td><?php echo $row['producto']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
        <td><?php echo $row['descripcion']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
        <td><?php echo $row['cantidad']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
        <td><?php echo $row['precio_unitario']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
        <td><?php echo $row['categoria']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
        <td><?php echo $row['proveedor']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
        <td><?php echo $row['fecha_ingreso']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
        <td><?php echo $row['estado']; ?></td> <!-- el (td) son los cuadritos de cada sección -->

        <td>
            <a href="control-inventarios/editar-producto-proceso.php?id=<?php echo $row['id_producto']; ?>" class="btn btn-warning">Editar</a>
        </td>
    </tr>
<?php } ?>