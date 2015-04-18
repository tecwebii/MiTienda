<?php
ob_start();
$usuario = $_POST['nombre_usuario'];
$password = $_POST['password_usuario'];

$password = md5($password);

include_once("config.php");
$consulta_usuario = "SELECT nombre_usuario, password_usuario, tipo_usuario, nickname 
	FROM Usuarios 
	WHERE nombre_usuario = '$usuario' 
	AND password_usuario = '$password'
	AND tipo_usuario = 2";
$resultado_usuario = mysqli_query($conexion, $consulta_usuario);

$row = mysqli_fetch_assoc($resultado_usuario);

$total_usuarios = mysqli_num_rows($resultado_usuario);

if ($total_usuarios > 0){
	session_start();
	echo $_SESSION["nombre_usuario"] = $usuario;
	echo $_SESSION["tipo_usuario"] = $row['tipo_usuario'];
	echo $_SESSION["nickname"] = $row['nickname'];
	header("Location: ../index.php");
} else {
	?>
	<script type="text/javascript">
	alert("Usuario ó Contraseña Incorrecta ó no tiene los permisos necesarios para acceder a esta parte del sitio");
	location.href = "../login.php";
	</script>
	<?php
}
ob_end_flush();
?>