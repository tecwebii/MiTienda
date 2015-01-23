<?php
$titulo="Nuevo Producto - Administrador";
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $titulo; ?></title>
</head>

<body>
	<h1><?php echo $titulo; ?></h1>
	
	<form action="includes/insertar-producto.php" method="POST">
		
		<label for="clave_producto">Clave de producto</label>
		<input type="text" name="clave_producto" value="" id="clave_producto"><br>
	
		<label for="nombre_producto">Nombre de producto</label>
		<input type="text" name="nombre_producto" value="" id="nombre_producto"><br>
		
		<label for="descripcion_producto">Descripción del Producto</label>
		<textarea name="descripcion_producto" id="descripcion_producto"></textarea><br>
	
		<label for="imagen_producto">Imagen del producto</label>
		<input type="text" name="imagen_producto" value="" id="imagen_producto"><br>
		
		<label for="precio">Precio</label>
		<input type="text" name="precio" value="" id="precio"><br>
		
		<label for="categoria">Categoria</label>
		<input type="text" name="categoria" value="" id="categoria"><br>
		
		<p><input type="submit" value="Agregar Producto"></p>
	</form>
	
</body>
</html>