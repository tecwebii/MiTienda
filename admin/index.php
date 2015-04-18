<?php
session_start();
if (isset($_SESSION["nombre_usuario"])){
// INCLUIMOS LA CONEXIÓN A LA BASE DE DATOS
include_once("includes/config.php");
$titulo="Mi Tienda - Administrador";

// PAGINACIÓN - DEFINIMOS EL LIMITE DE REGISTROS
$limite_registros = 2;

// PAGINACIÓN - LEEMOS EL VALOR DE "PAGINA" EN LA URL
$pagina=$_GET['pagina'];

// SI EXISTE EL VALOR EN LA URL (?pagina=) ENTONCES CALCULAMOS EL NÚMERO DE REGISTRO A PARTIR DEL CUAL EMPEZARÁ A MOSTRAR
if (isset($_GET['pagina'])){
	$inicio = ($pagina-1) * $limite_registros;
} else{
// SI NO ENTONCES DEFINIMOS VALORES POR DEFECTO
$inicio = 0;
$pagina = 1;
}
//DEFINIMOS LA CONSULTA EN BASE A LOS VALORES DE INICIO Y EL LIMITE DE REGISTROS
$consulta="SELECT * FROM productos LIMIT $inicio, $limite_registros";
//PAGINACIÓN - EJECUTAMOS LA CONSULTA ANTERIOR
$resultado=mysqli_query($conexion,$consulta);
//PAGINACIÓN - DEFINIMOS Y EJECUTAMOS LA CONSULTA PARA SABER CUANTOS REGISTROS TENEMOS EN LA BASE
$consulta_totales = mysqli_query($conexion, "SELECT * FROM productos");
//PAGINACIÓN - ALMACENAMOS EN UNA VARIABLE EL TOTAL DE REGISTROS ENCONTRADOS
$total_registros = mysqli_num_rows($consulta_totales);
//PAGINACIÓN - ALMACENAMOS EN UNA VARIABLE EL TOTAL DE PAGINAS REDONDEANDO AL NÚMERO ENTERO SUPERIOR EL RESULTADO DEL TOTAL REGISTROS ENTRE LIMITE DE REGISTROS
$paginas_totales = ceil($total_registros/$limite_registros);

//echo "Pagina: " . $pagina . "<br>";
//echo "Inicio: " . $inicio . "<br>";
//echo "Limite de registros: " . $limite_registros . "<br>";
//echo "Total registros: " . $total_registros . "<br>";
//echo "paginas totales: " . $paginas_totales . "<br>";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
	</head>
	<body>
	
		<?php 
		//INCLUIMOS EL MENÚ
		include_once("includes/menu.php");
		echo "Bienvenid@ " . $_SESSION["nickname"];
		echo "<a href='includes/logout.php'>Cerrar Sesión </a>";
		?>
		<h1><?php echo $titulo; ?></h1>
		
		<?php
		//MIENTRAS EL ARREGLO "$RESULTADO" TENGA ELEMENTOS, REPETIRÁ EL CICLO WHILE
		while ($row = mysqli_fetch_assoc($resultado)){
			echo "<div>";
			echo "<a href='editar-producto.php?id=" . $row['id'] 
				. "'>" .$row['nombre_producto'] . "</a>";
			echo $row['clave_producto'];
			//ALMACENAMOS EL ID DEL REGISTRO EN CURSO PARA HACER UNA SEGUNDA CONSULTA
			$id_producto= $row['id'];
			//HACEMOS UNA CONSULTA A DOS TABLAS UNIENDOLAS A TRAVÉS DE INNER JOIN
			$consulta_categoria="SELECT id_cat, nombre_categoria, id_categoria
				FROM Categorias
				INNER JOIN Relacion_producto_categoria
				ON id_cat = id_categoria
				WHERE id_producto ='$id_producto'";
			//EJECUTAMOS LA CONSULTA
			$resultado_categoria = mysqli_query($conexion,$consulta_categoria);
			//MOSTRAMOS LAS CATEGORÍAS ENCONTRADAS A TRAVÉS DE OTRO WHILE
				while ($row2 = mysqli_fetch_assoc($resultado_categoria)){
					echo $row2['nombre_categoria'] . "<br>";
					}
			//echo $row['id_categoria'];
			echo "</div>";
		}
		
		// PAGINACIÓN - MOSTRAMOS A TRAVÉS DE UN CICLO WHILE EL NÚMERO DE PÁGINAS CALCULADO
		for ($i=1; $i<$paginas_totales+1; $i++ ){
			// SI EL VALOR DE $i ES IGUAL AL VALOR DE LA VARIABLE $PAGINA (tomado de la URL) ENTONCES SÓLO SE MUESTRA EL NÚMERO DE LA PÁGINA
			if ($i == $pagina){
				echo "<strong>".$i."</strong>";
			}else{
				//SI NO ENTONCES LO HACEMOS LINK
				echo "<a href='index.php?pagina=".$i."'>" . $i . "</a>";
			}
		}
	} else {
		header("Location: login.php");
	}
	
		?>
		
	</body>
</html>