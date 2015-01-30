<?php
include_once("config.php");
$clave = $_POST['clave_producto'];
$nombre = $_POST['nombre_producto'];
$descripcion= $_POST['descripcion_producto'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$fecha=$_POST['fecha_lanzamiento'];

$nombre_archivo = $_FILES['imagen_producto']['name'];
$tipo_archivo = $_FILES['imagen_producto']['type'];
$tmp_archivo = $_FILES['imagen_producto']['tmp_name'];
$nombre_final_archivo = date("His") . "-" . $nombre_archivo;

$directorio_archivos = "../img/Portadas/";

move_uploaded_file($tmp_archivo, $directorio_archivos . $nombre_final_archivo);


$consulta_insertar="INSERT INTO Productos
(clave_producto,nombre_producto,descripcion_producto,imagen_producto,precio,categoria,fecha_lanzamiento)
VALUES ('$clave','$nombre','$descripcion','$nombre_final_archivo','$precio','$categoria','$fecha')";
mysqli_query($conexion,$consulta_insertar);
?>