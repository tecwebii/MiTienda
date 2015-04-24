<?php
session_start();
$carro = $_SESSION['carro'];
$titulo = "Productos Agregados al carrito";
?>
<html>
	<head>
		<meta charset="utf-8">
		<title><?php echo $titulo; ?></title>
	</head>
	<body>
		<h1><?php echo $titulo; ?></h1>
		<?php if($carro){ ?>
			<table>
				<tr>
					<th>PRODUCTO</th>
					<th>PRECIO</th>
					<th>SKU / CLAVE</th>
					<th>CANTIDAD</th>
					<th>BORRAR</th>
					<th>ACTUALIZAR</th>
				</tr>
			<?php 
			$suma=0;
			foreach($carro as $campo => $valor){ 
			$subtotal = $valor['precio'] * $valor['cantidad'];
			$suma = $suma + $subtotal;	
			?>	
			<form action="includes/agregar_carrito.php" method="POST">
			<tr>
				<td><?php echo $valor['nombre_producto']; ?></td>
				<td><?php echo $valor['precio']; ?></td>
				<td><?php echo $valor['clave_producto']; ?></td>
				<td><?php echo $valor['cantidad']; ?></td>
				<td><a href="includes/borrar_carrito.php?id=<?php echo $valor['id']; ?>"> X </a></td>
				<td>
				<input type="text" name="cantidad" value="<?php echo $valor['cantidad']; ?>" id="cantidad">
				<input type="hidden" name="id" value="<?php echo $valor['id']; ?>" id="id">
				</td>
				<td><input type="submit" value="Actualizar"></td>
			</tr>
				</form>
			<?php } ?>
				
				
			</table>
		<div><p> Total de artículos: <?php echo count($carro); ?></p></div>
		<div><p> Total a pagar: $<?php echo number_format($suma,2); ?></p></div>
		<div><a href="index.php">Continuar Comprando</a></div>
		<div><a href="finalizar_compra.php">Finalizar Compra</a></div>
		<?php } else { ?>
			<p>No hay productos seleccionados -
			<a href="index.php">Ver Productos</a>
			</p>
		<?php } ?>	
	</body>
</html>