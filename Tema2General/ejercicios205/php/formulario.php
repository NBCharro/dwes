<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/styleFactura.css">
	<title>Factura</title>
	<?php
	if (isset($_REQUEST['enviar'])) {
		$placaBase = $_REQUEST['placaBase'];
		$procesador = $_REQUEST['procesador'];
		$memoria = $_REQUEST['memoria'];
		$discoDuro = $_REQUEST['discoDuro'];
		$tarjetaGrafica = $_REQUEST['tarjetaGrafica'];
	}
	?>
	<?php
	switch ($placaBase) {
		case 'Gigabyte B560M DS3H V2':
			$precioPlacaBase = 93.99;
			break;
		case 'MSI B450M PRO-VDH Max':
			$precioPlacaBase = 84.99;
			break;
		case 'Asus TUF GAMING B550-PLUS WIFI II':
			$precioPlacaBase = 179.85;
			break;
		case 'Asus TUF GAMING B450-PLUS II':
			$precioPlacaBase = 101.89;
			break;
		default:
			$precioPlacaBase = 0;
			break;
	}
	switch ($procesador) {
		case 'Intel Core i5-8600 3.1GHz Box':
			$precioProcesador = 242.41;
			$imagen = "intel";
			break;
		case 'AMD Ryzen 7 2700X 3.7 Ghz':
			$precioProcesador = 532.90;
			$imagen = "amd";
			break;
		default:
			$precioProcesador = 0;
			break;
	}
	switch ($memoria) {
		case '8GB':
			$precioMemoria = 34.99;
			break;
		case '16GB':
			$precioMemoria = 70.99;
			break;
		case '32GB':
			$precioMemoria = 115.99;
			break;
		case '64GB':
			$precioMemoria = 202.99;
			break;
		default:
			$precioMemoria = 0;
			break;
	}
	switch ($discoDuro) {
		case 'HDD 1TB':
			$precioDiscoDuro = 45.05;
			break;
		case 'SSD 512GB':
			$precioDiscoDuro = 90;
			break;
		default:
			$precioDiscoDuro = 0;
			break;
	}
	switch ($tarjetaGrafica) {
		case 'Gigabyte GeForce RTX 3060':
			$precioTarjetaGrafica = 459.99;
			break;
		case 'MSI RTX 3060 TI VENTUS 2X':
			$precioTarjetaGrafica = 331.08;
			break;
		case 'MSI GeForce RTX 2060 VENTUS GP':
			$precioTarjetaGrafica = 345.09;
			break;
		case 'ninguna':
			$precioTarjetaGrafica = 0;
			break;
		default:
			$precioTarjetaGrafica = 0;
			break;
	}
	$total = $precioPlacaBase + $precioProcesador + $precioMemoria + $precioDiscoDuro + $precioTarjetaGrafica
	?>
</head>

<body>
	<div class="factura">
		<h1>Presupuesto de su PC</h1>
		<img src="../imagenes/<?php echo "$imagen" ?>.png" alt="Imagen del procesador elegido">
		<table>
			<tr>
				<th>Componente</th>
				<th class="modelo">Modelo</th>
				<th>Precio</th>
			</tr>
			<tr>
				<td>Placa Base</td>
				<td class="modelo"><?php echo "$placaBase" ?></td>
				<td><?php echo "$precioPlacaBase" ?> €</td>
			</tr>
			<tr>
				<td>Procesador</td>
				<td><?php echo "$procesador" ?></td>
				<td><?php echo "$precioProcesador" ?> €</td>
			</tr>
			<tr>
				<td>Memoria</td>
				<td><?php echo "$memoria" ?></td>
				<td><?php echo "$precioMemoria" ?> €</td>
			</tr>
			<tr>
				<td>Disco Duro</td>
				<td><?php echo "$discoDuro" ?></td>
				<td><?php echo "$precioDiscoDuro" ?> €</td>
			</tr>
			<tr>
				<td>Tarjeta Grafica</td>
				<td><?php echo "$tarjetaGrafica" ?></td>
				<td><?php echo "$precioTarjetaGrafica" ?> €</td>
			</tr>
			<tr>
				<th colspan="2">TOTAL</th>
				<th><?php echo "$total" ?> €</th>
			</tr>
		</table>
	</div>
</body>

</html>