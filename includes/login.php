<?php
session_start();
if (!isset($_SESSION["nombre_usuario"])){
?>
<form action="includes/valida_usuario.php" method="POST">
	<label for="nombre_usuario">nombre usuario</label><br>
	<input type="text" name="nombre_usuario" value="" id="nombre_usuario"><br><br>
	<label for="password_usuario">password</label><br>
	<input type="password" name="password_usuario" value="" id="password_usuario"><br><br>
	<input type="submit" name="submit" value="Entrar" id="submit">
</form>
<br>
<?php
} else{
echo "Bienvenid@ " . $_SESSION["nickname"];
echo "<a href='includes/logout.php'>Cerrar Sesión </a>";
}
?>