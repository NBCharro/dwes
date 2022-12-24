<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
	<?php
	if (isset($_REQUEST['enviar'])) {
		$articuloA = intval($_REQUEST['articuloA']);
		/* Aunque sea un number en el form, siempre se envia de tipo String.
		Por eso hacemos intval, para castearlo de String a int. */
		$articuloB = intval($_REQUEST['articuloB']);
		$articuloC = intval($_REQUEST['articuloC']);
		define("IVA", 0.21);
		$totalArticuloA = round($articuloA * 5.99, 2);
		$totalArticuloB = round($articuloB * 12.49, 2);
		$totalArticuloC = round($articuloC * 19.99, 2);
		$total = round($totalArticuloA + $totalArticuloB + $totalArticuloC, 2);
		$iva = round($total * IVA, 2);
		$totalConIva = round($iva + $total, 2);
		$fechaEmisionFactura = date('d/m/Y');
		echo "
		<table>
	    <tr>
			<th>Artículo</th>
			<th>Precio</th>
			<th>Unidades</th>
			<th>SubTotal</th>
		</tr>
		<tr>
			<td class=\"izquierda\">Artículo A</td>
			<td>5.99 €</td>
			<td>$articuloA</td>
			<td>$totalArticuloA €</td>
		</tr>
		<tr>
			<td class=\"izquierda\">Artículo B</td>
			<td>12.49 €</td>
			<td>$articuloB</td>
			<td>$totalArticuloB €</td>
		</tr>
		<tr>
			<td class=\"izquierda\">Artículo C</td>
			<td>19.99 €</td>
			<td>$articuloC</td>
			<td>$totalArticuloC €</td>
		</tr>
		<tr>
			<td colspan=\"4\" class=\"vacio\"></td>
		</tr>
		<tr>
			<td colspan=\"2\" class=\"vacio\"></td>
			<td>IVA (20%)</td>
			<td>$iva €</td>
		</tr>
		<tr>
			<td colspan=\"2\" class=\"vacio\"></td>
			<td>TOTAL</td>
			<td>$totalConIva €</td>
		</tr>
		<tr>
			<td class=\"vacio\"></td>
			<td class=\"vacio\"></td>
			<td>Fecha emisión</td>
			<td>$fechaEmisionFactura</td>
		</tr>
		</table>
	";
	} else {
		echo "<h2>No hay datos</h2>";
	}
	?>
	<h2><a href="../index.html">Volver</a></h2>
</body>

</html>