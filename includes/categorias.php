<?php
include_once("../admin/includes/config.php");
$consulta_categorias= "SELECT id_cat, nombre_categoria FROM Categorias";
$resultado = mysqli_query($conexion,$consulta_categorias);

echo "<ul>";
while ($row = mysqli_fetch_assoc($resultado)){
	echo "<a href='detalle_categoria.php?id=" . $row['id_cat'] . "'><li>" . $row['nombre_categoria'] . "</li></a>";
}
echo "</ul>";
?>