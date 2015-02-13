<?php
include_once("includes/config.php");
$titulo="Mi Tienda - Administrador";

$limite_registros = 2;
$pagina=$_GET['pagina'];

if (isset($_GET['pagina'])){
	$inicio = ($pagina-1) * $limite_registros;
} else{
$inicio = 0;
$pagina = 1;
}
$consulta="SELECT * FROM productos LIMIT $inicio, $limite_registros";
$resultado=mysqli_query($conexion,$consulta);

$consulta_totales = mysqli_query($conexion, "SELECT * FROM productos");
$total_registros = mysqli_num_rows($consulta_totales);

$paginas_totales = ceil($total_registros/$limite_registros);

echo "Pagina: " . $pagina . "<br>";
echo "Inicio: " . $inicio . "<br>";
echo "Limite de registros: " . $limite_registros . "<br>";
echo "Total registros: " . $total_registros . "<br>";
echo "paginas totales: " . $paginas_totales . "<br>";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
	</head>
	<body>
		<?php include_once("includes/menu.php"); ?>
		<h1><?php echo $titulo; ?></h1>
		
		<?php
		while ($row = mysqli_fetch_assoc($resultado)){
			echo "<div>";
			echo "<a href='editar-producto.php?id=" . $row['id'] 
				. "'>" .$row['nombre_producto'] . "</a>";
			echo $row['clave_producto'];
			$id_producto= $row['id'];
			$consulta_categoria="SELECT id_cat, nombre_categoria, id_categoria
				FROM Categorias
				INNER JOIN Productos
				ON id_cat = id_categoria
				WHERE id ='$id_producto'";
				$resultado_categoria = mysqli_query($conexion,$consulta_categoria);
				while ($row2 = mysqli_fetch_assoc($resultado_categoria)){
					echo $row2['nombre_categoria'];
				}
			//echo $row['id_categoria'];
			echo "</div>";
		}
		
		for ($i=1; $i<$paginas_totales+1; $i++ ){
			if ($i == $pagina){
				echo "<strong>".$i."</strong>";
			}else{
			echo "<a href='index.php?pagina=".$i."'>" . $i . "</a>";
			}
		}
		
		?>
		
		
		
	</body>
</html>