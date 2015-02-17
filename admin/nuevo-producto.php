<?php
//INCLUIMOS LA CONEXIÓN
include_once("includes/config.php");
$titulo="Nuevo Producto - Administrador";

//DEFINIMOS LA CONSULTA PARA LAS CATEGORÍAS
$consulta_categorias = "SELECT * FROM categorias";

//EJECUTAMOS LA CONSULTA DE LAS CATEGORÍAS
$resultado = mysqli_query($conexion,$consulta_categorias);
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $titulo; ?></title>
	<!-- INCLUIMOS LAS LIBRERIAS PARA UTILIZAR EL CALENDARIO DE JQUERY.UI -->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<!-- INCLUIMOS LA LIBRERIA PARA UTILIZAR EL EDITOR "CKEDITOR.JS" -->
	  <script src="js/ckeditor/ckeditor.js"></script>
	<!-- EJECUTAMOS LA FUNCIÓN DATEPICKER CON ALGUNOS PARAMETROS -->
	<script>
	  $(function() {
	    $( "#fecha_lanzamiento" ).datepicker(
			{
			  showOn: "both",
			  buttonText: "Calendario",
			  dateFormat: "yy-mm-dd",
			  yearRange: "1960:2015",
			  showOtherMonths: true,
			  changeMonth: true,
			  changeYear: true,
			  dayNames: [ "Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado" ],
			  dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
			  monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ]
			}
	    );
	  });
	  </script>
	  
</head>

<body>
	<h1><?php echo $titulo; ?></h1>
	<!-- CREAMOS UN FORMULARIO A TRAVÉS DEL CUAL EL USUARIO PODRÁ INGRESAR INFORMACIÓN A LA BASE DE DATOS -->
	
	<form action="includes/insertar-producto.php" method="POST" enctype="multipart/form-data">
		
		<label for="clave_producto">Clave de producto</label>
		<input type="text" name="clave_producto" value="" id="clave_producto"><br>
	
		<label for="nombre_producto">Nombre de producto</label>
		<input type="text" name="nombre_producto" value="" id="nombre_producto"><br>
		
		<label for="fecha_lanzamiento">Fecha de lanzamiento</label>
		<input type="text" name="fecha_lanzamiento" value="" id="fecha_lanzamiento"><br>
		
		<label for="descripcion_producto">Descripción del Producto</label>
		<textarea name="descripcion_producto" id="descripcion_producto"></textarea><br>
		<!-- EJECUTAMOS LA FUNCIÓN QUE SUSTITUYE EL TEXTAREA POR EL EDITOR  -->
		<script>

			CKEDITOR.replace( 'descripcion_producto' );

		</script>
	
		<label for="imagen_producto">Imagen del producto</label>
		<input type="file" name="imagen_producto" id="imagen_producto"><br>
		
		<label for="precio">Precio</label>
		<input type="text" name="precio" value="" id="precio"><br>
		
		<label for="categoria">Categoria</label>
	
		<select name="id_categoria" id="id_categoria">
			<option value="">- Selecciona una Categoria</option>
			
			<?php
			// MOSTRAMOS TODAS LAS CATEGORÍAS DISPONIBLES
			while ($row = mysqli_fetch_assoc($resultado)){
				echo "<option value='" . $row['id_cat'] . "'>"
					. $row['nombre_categoria'] . "</option>";
			}
			 ?>	
		</select>
		<p><input type="submit" value="Agregar Producto"></p>
	</form>
	
</body>
</html>