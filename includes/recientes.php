<?php
include_once("../admin/includes/config.php");
$consulta_destacados= "SELECT * FROM productos ORDER BY id DESC LIMIT 3";
$resultado = mysqli_query($conexion,$consulta_destacados);

while ($row = mysqli_fetch_assoc($resultado)){
	echo "<div>" . $row['nombre_producto'] . "</div>";
}
?>