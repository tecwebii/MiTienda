<?php
ob_start();
session_start();
include_once("../admin/includes/config.php");
$id=$_GET['id'];
$consulta_producto = "SELECT * FROM productos WHERE id = '$id'";
$resultado_producto = mysqli_query($conexion,$consulta_producto);
$row = mysqli_fetch_assoc($resultado_producto);

//echo $row['nombre_producto'];

$cantidad = 1;

if(isset($_SESSION['carro'])){
	$carro= $_SESSION['carro'];
}

$carro[$id] = array('id' => $row['id'],
				'nombre_producto' => $row['nombre_producto'],
				'imagen_producto' => $row['imagen_producto'],
				'precio' => $row['precio'],
				'clave_producto' => $row['clave_producto'],
				'cantidad' => $cantidad
			);

$_SESSION['carro'] = $carro;

//echo $carro[$id]['precio'];
//print_r($carro);

header("Location: ../ver_carrito.php");

ob_end_flush();
?>