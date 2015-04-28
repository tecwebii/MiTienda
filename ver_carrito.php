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
		
		
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
			
			<!--COSTO DEL ENVÍO-->
			<input type="hidden" name="shipping" value="0">
			<!--DEFINE LA LEYENDA PARA REGRESAR AL SITIO-->
			<input type="hidden" name="cbt" value="Presione aquí para volver al sitio www.MiTienda.com">
			<!-- INDICAMOS EL METODO POR EL CUAL ENVIAMOS LA INFORMACIÓN 1 = GET y 2 = POST -->
			<input type="hidden" name="rm" value="2">
			<!--DEFINE EL NOMBRE DEL SITIO AL CUAL SE VA A REALIZAR EL PAGO-->
			<input type="hidden" name="bn" value="Mi Tienda de Peliculas" >
			<!--LA CUENTA DE PAYPAL QUE VA A RECIBIR EL PAGO-->
			<input type="hidden" name="business" value="moises.rojas@leon.uia.mx">
			<!--INDICAMOS EL CONCEPTO DEL PAGO POR UN PRODUCTO O SERVICIO-->
			<input type="hidden" name="item_name" value="Peliculas" >
			<!--INDICAMOS EL TOTAL DE PRODUCTOS EN EL CARRITO-->
			<input type="hidden" name="item_number" value="<?php echo count($carro); ?>">
			<!--INDICAMOS EL TOTAL A PAGAR -->
			<input type="hidden" name="amount" value="<?php echo $suma; ?>">
			<!--INDICAMOS LAS VARIABLES PERSONALIZADAS CON LAS QUE VAMOS A TRABAJAR-->
			<input type="hidden" name"custom" value="<?php echo $_SESSION['nombre_usuario']; ?>">
			<!--INDICAMOS LA DIVISA CON LA QUE VAMOS A COBRAR-->
			<input type="hidden" name="currency_code" value="MXN">
			<!--INDICAMOS LA RUTA ABSOLUTA DEL LOGOTIPO O IMAGEN A COLOCAR EN EL PAGO DE PAYPAL-->
			<input type="hidden" name="image_url" value="http://leon.uia.mx/images/escudo.gif">
			<!--INDICAMOS LA RUTA ABSOLUTA DE LA PÁGINA A DONDE SE VA A ENVIAR AL USUARIO SI EL PAGO ES EXITOSO-->
			<input type="hidden" name="return" value="http://www.MiTienda.com/ipn_success.php">
			<!--INDICAMOS LA RUTA ABSOLUTA DE LA PÁGINA A DONDE SE VA A ENVIAR AL USUARIO SI EL PAGO NO ES EXITOSO-->
			<input type="hidden" name="cancel_return" value="http://www.MiTienda.com/ipn_error.php">
			<!--INDICAMOS SI EL USUARIO PUEDE O NO DEJAR UN COMENTARIO AL MOMENTO DE REALIZAR UN PAGO 1 = SI y 0 = NO-->
			<input type="hidden" name="no_vote" value="0">
			<!--INDICAMOS SI EL USUARIO PUEDE O NO SELECCIONAR UN TIPO DE ENVIO PAGO 1 = SI y 0 = NO-->
			<input type="hidden" name="no_shipping" value="0">
			
			<!--VALOR QUE VALIDA QUE LA INFORMACIÓN SE ENVIÓ A TRAVÉS DE UN FORMULARIO-->
			<input type="hidden" name="cmd" value="_xclick">
			
			<input type="submit" value="FINALIZAR COMPRA">
			</form>
		
		
		<?php } else { ?>
			<p>No hay productos seleccionados -
			<a href="index.php">Ver Productos</a>
			</p>
		<?php } ?>	
	</body>
</html>