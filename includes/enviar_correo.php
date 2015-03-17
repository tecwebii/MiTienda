<?php
include_once("../admin/includes/config.php");
$nombre = $_POST['nombre'];
$asunto = $_POST['asunto'];
$correo = $_POST['correo'];
$msg = $_POST['mensaje'];
$cabecera = "From: no-reply@mitienda.com" . "\r\n" .
"CC: $correo";

if (mail("moyo2100@gmail.com",$asunto,$msg,$cabecera)){
	echo "Mensaje enviado exitosamente";
	$consulta_insertar = "INSERT INTO contactos (nombre_completo,asunto,correo,mensaje) VALUES ('$nombre','$asunto','$correo','$msg')";
	mysqli_query($conexion, $consulta_insertar);
} else{
	echo "Ocurrió un error, intentalo de nuevo";
}			
?>