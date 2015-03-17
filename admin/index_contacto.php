<?php
include_once("includes/config.php");
$titulo="Mi Tienda - Administrador";
$consulta="SELECT * FROM contactos";
$resultado=mysqli_query($conexion,$consulta);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
	</head>
	<body>
	
		<?php 
		include_once("includes/menu.php");
		?>
		<h1><?php echo $titulo; ?></h1>
		
		<?php
		while ($row = mysqli_fetch_assoc($resultado)){
			echo "<div>";
			echo $row['id_contacto'] .  ' - ';
			echo $row['nombre_completo'] .  ' - ';
			echo $row['asunto'] .  ' - ';
			echo $row['correo'] .  ' - ';
			echo $row['mensaje'];
			echo "</div>";
		}
		?>
	</body>
</html>