<?php
include('php/db.php');

$query = "SELECT *FROM usuario";
$result = $conexion->query($query);

while ($row = $result->fetch_assoc()) {
?>
  <tr> <!-- El (tr) es la fila -->
    <td><?php echo $row['id_user']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['nombre']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['email']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['telefono']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['id_cargo']; ?></td> <!-- el (td) son los cuadritos de cada sección -->

    <td>
      <a href="control-usuarios/update-usuario.php?id=<?php echo $row['id_user']; ?>" class="btn btn-warning">actualizar</a>
      <a href="control-usuarios/delete-usuarios.php?id=<?php echo $row['id_user']; ?>" class="btn btn-danger">Eliminar</a>
    </td>
  </tr>
<?php } ?>


