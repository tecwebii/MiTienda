<?php
include_once("config.php");
$email = $_POST['email'];
$usuario = $_POST['nombre_usuario'];
$password = $_POST['password'];
$repetir_password = $_POST['repetir_password'];
$nickname = $_POST['nickname'];
$edad = $_POST['edad'];
$tipo_usuario = $_POST['tipo_usuario'];

$consulta_usuario_existente = "SELECT nombre_usuario FROM Usuarios WHERE nombre_usuario = '$usuario'";
$resultado_usuario_existente = mysqli_query($conexion,$consulta_usuario_existente);

$total_coincidencias = mysqli_num_rows($resultado_usuario_existente);

if ($total_coincidencias == 0){

if ($password == $repetir_password){
	
	$password = md5($password);

$consulta_insertar_usuario = "INSERT INTO Usuarios (nombre_usuario, password_usuario, correo_usuario, tipo_usuario, nickname, edad_usuario) VALUES ('$usuario', '$password', '$email', '$tipo_usuario', '$nickname', '$edad')";
mysqli_query($conexion, $consulta_insertar_usuario);

$asunto = "Registro exitoso";
$msg_html = "<h1> Registro exitoso </h1>
	<br>
	<p> Muchas gracias por tu tiempo, tu registro en TIENDA fue exitoso aquí están los datos para ingresar a nuestro sitio:</p>
	<p> Usuario: ". $usuario ." </p>
	<p> Contraseña: " . $password . "</p>";

$cabeceras = "MIME-Version: 1.0" . "\r\n";
$cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$cabeceras .= "From: no-reply@MiTienda.com";

mail($email,$asunto, $msg_html,$cabeceras);

echo "<p>Registro exitoso, enviamos un correo electrónico con tus datos a la dirección que ingresaste</p>";	

} else {

 echo "<p>Las contraseñas no coinciden</p>";	

}
} else {
    echo "<p>El nombre de usuario ya existe</p>";	
}
?>