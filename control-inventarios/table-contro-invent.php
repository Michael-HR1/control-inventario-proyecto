<?php
include('php/db.php');

$query = "SELECT id_categoria , nombre_categoria, descripcion FROM categorias";
$result = $conexion->query($query);

while ($row = $result->fetch_assoc()) {
?>
  <tr> <!-- El (tr) es la fila -->
    <td><?php echo $row['id_categoria']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['nombre_categoria']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
    <td><?php echo $row['descripcion']; ?></td> <!-- el (td) son los cuadritos de cada sección -->
   
    <!--  <td>
      <a href="#update-usuario.php?id=<?php echo $row['id_user']; ?>" class="btn btn-warning">actualizar</a>
      <a href="#delete-usuarios.php?id=<?php echo $row['id_user']; ?>" class="btn btn-danger">Eliminar</a>
    </td> -->
  </tr>
<?php } ?>