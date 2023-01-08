<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resultados formulario</title>
	<style>
		table,
		td,
		th {
			border: 1px solid black;
			padding: 10px 20px;
			text-align: center;
			;
		}

		th {
			background-color: lightgrey;
		}

		table {
			border-collapse: collapse;
		}
	</style>
</head>

<body>
	<?php
	$articuloA = $_REQUEST['articuloA'];
	$articuloB = $_REQUEST['articuloB'];
	$articuloC = $_REQUEST['articuloC'];
	$totalArticuloA = round($articuloA * 5.99, 2);
	$totalArticuloB = round($articuloB * 12.49, 2);
	$totalArticuloC = round($articuloC * 19.99, 2);
	$total = round($totalArticuloA + $totalArticuloB + $totalArticuloC, 2);
	$iva = round($total * 0.2, 2);
	$totalConIva = round($iva + $total, 2);
	$fechaEmisionFactura = date('d/m/Y');
	echo "
		<table>
	    <tr>
			<th>Articulo</th>
			<th>Precio</th>
			<th>Unidades</th>
			<th>SubTotal</th>
		</tr>
		<tr>
			<td>Articulo A</td>
			<td>5.99 €</td>
			<td>$articuloA</td>
			<td>$totalArticuloA €</td>
		</tr>
		<tr>
			<td>Articulo B</td>
			<td>12.49 €</td>
			<td>$articuloB</td>
			<td>$totalArticuloB €</td>
		</tr>
		<tr>
			<td>Articulo C</td>
			<td>19.99 €</td>
			<td>$articuloC</td>
			<td>$totalArticuloC €</td>
		</tr>
		<tr>
			<td colspan=\"2\">IVA (20%)</td>
			<td colspan=\"2\">$iva €</td>
		</tr>
		<tr>
			<td colspan=\"2\">TOTAL</td>
			<td colspan=\"2\">$totalConIva €</td>
		</tr>
		<tr>
			<td colspan=\"2\">Fecha emisión</td>
			<td colspan=\"2\">$fechaEmisionFactura</td>
		</tr>
		</table>
	";
	?>
</body>

</html>