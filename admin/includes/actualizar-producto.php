<?php
//INICIAMOS EL ALMACENAMIENTO EN CACHÉ
ob_start();
//INCLUIMOS LA CONEXIÓN
include_once("config.php");
//CAPTURAMOS EN VARIABLES LA INFORMACIÓN INTRODUCIDA POR EL USUARIO EN "EDITAR-PRODUCTO.php"
$id=$_POST['id'];
$clave=$_POST['clave_producto'];
$nombre=$_POST['nombre_producto'];
$descripcion=$_POST['descripcion_producto'];
$precio=$_POST['precio'];
$id_categoria=$_POST['id_categoria'];
//DEFINIMOS LA CONSULTA PARA ACTUALIZAR
$consulta_actualizar="UPDATE Productos SET clave_producto='$clave', nombre_producto='$nombre', descripcion_producto='$descripcion', precio='$precio', id_categoria='$id_categoria' WHERE id='$id'";
// EJECUTAMOS LA CONSULTA
mysqli_query($conexion,$consulta_actualizar);
//AL TERMINAR LOS PROCESOS, MANDAMOS DE REGRESO AL INDEX
header("Location:../index.php");
//LIBERAMOS CACHÉ DE LA PÁGINA
ob_end_flush();
?>