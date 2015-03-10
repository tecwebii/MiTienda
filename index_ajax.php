<?php
$titulo = "EJEMPLOS CON AJAX";
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $titulo; ?></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		
		<script>
		$(document).ready(function(){
			$("#miBoton").click(function(){
				$("#div1").load("cargame.php");
			});
			
			$("#miBoton2").click(function(){
				$.get("Get.php", {nombre: "Juan"}, function(respuesta){
					$("#div2").html(respuesta);
				})
			});
			
			$("#miBoton3").click(function(){
				$.post("Post.php", {nombre: "Hola Mundo"}, function(respuesta){
					$("#div3").html(respuesta);
				})
			});
			
			$("#formulario").submit(function(e){
				e.preventDefault();
				$.ajax({
					url: "formulario.php",
					type: "post",
					data: $("#formulario").serialize(),
					success: function(respuesta){
						$("#div4").html(respuesta)
					}
				});
			});
			
		});
		</script>
		
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
		
		<a href="#" id="miBoton"> Obtener contenido externo</a>
		<div id="div1"> AQUÍ CARGO CONTENIDO EXTERNO</div>
		
		<input type="button" id="miBoton2" value="CARGAR CON GET" />
		<div id="div2"> AQUÍ CARGO CON GET</div>
		
		<input type="button" id="miBoton3" value="CARGAR CON POST" />
		<div id="div3"> AQUÍ CARGO CON POST</div>
		
		
	</body>
</html>