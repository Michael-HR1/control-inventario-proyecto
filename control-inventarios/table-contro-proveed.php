<?php
include('php/db.php');

$query = "SELECT id_proveedor , nombre_proveedor, telefono_proveedor, direccion_proveedor	 FROM proveedores";
$result = $conexion->query($query);

while ($row = $result->fetch_assoc()) {
?>
  <tr> <!-- El (tr) es la fila -->
    <td><?php echo $row['id_proveedor']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['nombre_proveedor']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['telefono_proveedor']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['direccion_proveedor']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
   
    <!--  <td>
      <a href="#update-usuario.php?id=<?php echo $row['id_user']; ?>" class="btn btn-warning">actualizar</a>
      <a href="#delete-usuarios.php?id=<?php echo $row['id_user']; ?>" class="btn btn-danger">Eliminar</a>
    </td> -->
  </tr>
<?php } ?>