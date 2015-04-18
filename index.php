<?php
include_once("admin/includes/config.php");
$consulta_productos = "SELECT nombre_producto FROM Productos GROUP BY nombre_producto";
$consulta_categorias = "SELECT nombre_categoria FROM Categorias GROUP BY nombre_categoria";

$resultado_productos = mysqli_query($conexion, $consulta_productos);
$resultado_categorias = mysqli_query($conexion, $consulta_categorias);

$titulo = "Mi tienda en línea";

$arreglo = array();

while($row= mysqli_fetch_assoc($resultado_productos)){
	array_push($arreglo,$row['nombre_producto']);
}

while($row2= mysqli_fetch_assoc($resultado_categorias)){
	array_push($arreglo,$row2['nombre_categoria']);
}

//echo $arreglo[2];
$total_productos = mysqli_num_rows($resultado_productos);
$total_categorias = mysqli_num_rows($resultado_categorias);
$total_registros = $total_productos + $total_categorias;

for ($i=0; $i < $total_registros; $i++){
$sugerencias = $sugerencias . "'" . $arreglo[$i] . "',"; 
}

echo $sugerencias;

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" >
		<title><?php echo $titulo; ?></title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
		  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
		  <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
		
		<script>
		  $(function() {
		    var availableTags = [
		     <?php echo $sugerencias; ?>
		    ];
		    $( "#palabra_clave" ).autocomplete({
		      source: availableTags
		    });
		  });
		  </script>
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
		
		
		<div id="login"> 
		<?php include_once("includes/login.php"); ?>
		</div>
		
		
		<div id="header">
		<form action="buscador.php" method="GET" >
			<input type="text" name="palabra_clave" id="palabra_clave" placeholder="Busco...">
			<input type="submit" value="Buscar...">
		</form>
		</div>
		
		<div id="bloques_productos">
		<div class="destacados">
		<h3>PRODUCTOS DESTACADOS</h3>
		<?php include_once("includes/destacados.php"); ?>
		</div>
		
		<div class="recientes">
		<h3>PRODUCTOS RECIENTES</h3>
		<?php include_once("includes/recientes.php"); ?>
		</div>
		</div>
		
		<div id="lateral"> 
		 <h3> CATEGORÍAS</h3>
		 <?php include_once("includes/categorias.php"); ?>
		</div>
		
	</body>
</html>