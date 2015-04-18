<?php
include_once("admin/includes/config.php");
$URL_id = $_GET['id'];
$consulta_producto= "SELECT * FROM Productos WHERE id = $URL_id";
$resultado = mysqli_query($conexion,$consulta_producto);

while ($row = mysqli_fetch_assoc($resultado)){
	echo "<div>" . $row['clave_producto'] . "</div>";
	echo "<div>" . $row['nombre_producto'] . "</div>";
	echo "<div>" . $row['precio'] . "</div>";
}
?>