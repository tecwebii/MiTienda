<?php
$titulo= "Nuevo Usuario";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		<script>
		$(document).ready(function(){
			
			$("#nuevo_usuario").submit(function(e){
				e.preventDefault();
				$.ajax({
					url: "includes/insertar_usuario.php",
					type: "post",
					data: $("#nuevo_usuario").serialize(),
					success: function(respuesta){
						$("#respuesta").html(respuesta);
						$("#respuesta").effect("bounce");
					}
				});
			});
			
		});
		</script>
		
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
		
		<form id="nuevo_usuario" >
			
			<label for="email">Email</label>
			<input type="text" name="email" value="" id="email">
			<br>
			<label for="nombre_usuario">Nombre usuario</label>
			<input type="text" name="nombre_usuario" value="" id="nombre_usuario">
			<br>
			<label for="password">Password</label>
			<input type="text" name="password" value="" id="password">
			<br>
			<label for="repetir_password">Repetir password</label>
			<input type="text" name="repetir_password" value="" id="repetir_password">
			<br>
			<label for="nickname">Nickname</label>
			<input type="text" name="nickname" value="" id="nickname">
			<br>
			<label for="edad">Edad</label>
			<input type="text" name="edad" value="" id="edad">
			<br>
			<label for="tipo_usuario">Tipo de Usuario</label>
			<select name="tipo_usuario" id="tipo_usuario">
				<option value="1">Cliente</option>
				<option value="2">Administrador</option>
			</select>
			<br>
			<input type="submit" value="Registrar">
			
		</form>
		
		<div id="respuesta"> </div>
		
	</body>
</html>