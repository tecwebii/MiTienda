<?php
include_once("../admin/includes/config.php");
$consulta_destacados= "SELECT * FROM productos WHERE destacado = 1";
$resultado = mysqli_query($conexion,$consulta_destacados);

while ($row = mysqli_fetch_assoc($resultado)){
	echo "<a href='detalle_producto.php?id=" . $row['id'] . "'><li>" . $row['nombre_producto'] . "</li></a>";
	echo "<a href='includes/agregar_carrito.php?id=" . $row['id'] . "'>Agregar a Carrito</a>";
}
?>