<?php
include_once("../admin/includes/config.php");
$consulta_categoria= "SELECT id_categoria, id_producto, id, nombre_producto FROM Productos INNER JOIN Relacion_Productos_Categoria ON id_producto = id WHERE id_categoria = 3 ORDER BY id DESC LIMIT 3";
$resultado = mysqli_query($conexion,$consulta_categoria);

while ($row = mysqli_fetch_assoc($resultado)){
	echo "<div>" . $row['nombre_producto'] . "</div>";
}
?>