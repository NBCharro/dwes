<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 38</title>
	<style>
		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
			height: 25px;
			width: 250px;
		}

		th {
			background-color: lightgray;
		}
	</style>
</head>

<body>
	<?php
	if (!isset($_REQUEST['enviar'])) {
	?>
		<form action="#" method="post">
			<label for="tamano">Tamaño</label>
			<select name="tamano">
				<option name="tamano" value="Mini">Mini (2.95€)</option>
				<option name="tamano" value="Media">Media (4.95€)</option>
				<option name="tamano" value="Maxi">Maxi (8.95€)</option>
			</select><br>
			<label for="base">Base</label>
			<select name="base">
				<option name="base" value="Normal">Normal (0€)</option>
				<option name="base" value="Crujiente">Crujiente (1€)</option>
				<option name="base" value="Rellena">Rellena (2€)</option>
			</select><br>
			<label for="salsa">Salsa</label>
			<select name="salsa">
				<option name="salsa" value="Ninguna">Ninguna (0€)</option>
				<option name="salsa" value="Barbacoa">Barbacoa (0,95€)</option>
				<option name="salsa" value="Carbonara">Carbonara (1,45€)</option>
			</select><br>
			<label for="">Ingredientes:</label><br>
			<label for="ingredientes">Pollo (0.55€)</label>
			<input type="checkbox" name="ingredientePollo" value="pollo"><br>
			<label for="ingredientes">Bacon (0.75€)</label>
			<input type="checkbox" name="ingredienteBacon" value="bacon"><br>
			<label for="ingredientes">Jamón (0.95€)</label>
			<input type="checkbox" name="ingredienteJamon" value="jamon"><br>
			<label for="ingredientes">Cebolla (0.45€)</label>
			<input type="checkbox" name="ingredienteCebolla" value="cebolla"><br>
			<label for="ingredientes">Aceitunas (0.55€)</label>
			<input type="checkbox" name="ingredienteAceitunas" value="aceitunas"><br>
			<label for="ingredientes">Pimiento (0.65€)</label>
			<input type="checkbox" name="ingredientePimiento" value="pimiento"><br><br>
			<input type="submit" value="Enviar" name="enviar">
		</form>
	<?php
	} else {
		$total = 0;
		$tamano = $_REQUEST['tamano'];
		$precioTamano = 0;
		$base = $_REQUEST['base'];
		$precioBase = 0;
		$salsa = $_REQUEST['salsa'];
		$precioSalsa = 0;
		switch ($tamano) {
			case 'Mini':
				$precioTamano = 2.95;
				$total += $precioTamano;
				break;
			case 'Media':
				$precioTamano = 4.95;
				$total += $precioTamano;
				break;
			case 'Maxi':
				$precioTamano = 8.95;
				$total += $precioTamano;
				break;
		}
		switch ($base) {
			case 'Normal':
				$precioBase = 0;
				$total += $precioBase;
				break;
			case 'Crujiente':
				$precioBase = 1;
				$total += $precioBase;
				break;
			case 'Rellena':
				$precioBase = 2;
				$total += $precioBase;
				break;
		}
		switch ($salsa) {
			case 'Ninguna':
				$precioSalsa = 0;
				$total += $precioSalsa;
				break;
			case 'Barbacoa':
				$precioSalsa = 0.95;
				$total += $precioSalsa;
				break;
			case 'Carbonara':
				$precioSalsa = 1.45;
				$total += $precioSalsa;
				break;
		}
		$precioTamanoFormat = sprintf("%05.2f€", $precioTamano);
		$precioBaseFormat = sprintf("%05.2f€", $precioBase);
		$precioSalsaFormat = sprintf("%05.2f€", $precioSalsa);

	?>
		<table>
			<tr>
				<th>Tamaño</th>
				<td><?php echo " $tamano" ?></td>
				<td><?php echo "$precioTamanoFormat" ?></td>
			</tr>
			<tr>
				<th>Base</th>
				<td><?php echo " $base" ?></td>
				<td><?php echo "$precioBaseFormat" ?></td>
			</tr>
			<tr>
				<th>Salsa</th>
				<td><?php echo " $salsa" ?></td>
				<td><?php echo "$precioSalsaFormat" ?></td>
			</tr>
			<?php
			if (isset($_REQUEST['ingredientePollo'])) {
				$precioPollo = 0.55;
				$total += $precioPollo;
				$precioPolloFormat = sprintf("%05.2f€", $precioPollo);
			?>
				<tr>
					<th>Ingrediente</th>
					<td>Pollo</td>
					<td><?php echo "$precioPolloFormat" ?></td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredienteBacon'])) {
				$precioBacon = 0.75;
				$total += $precioBacon;
				$precioBaconFormat = sprintf("%05.2f€", $precioBacon);
			?>
				<tr>
					<th>Ingrediente</th>
					<td>Bacon</td>
					<td><?php echo "$precioBaconFormat" ?></td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredienteJamon'])) {
				$precioJamon = 0.95;
				$total += $precioJamon;
				$precioJamonFormat = sprintf("%05.2f€", $precioJamon);
			?>
				<tr>
					<th>Ingrediente</th>
					<td>Jamon</td>
					<td><?php echo "$precioJamonFormat" ?></td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredienteCebolla'])) {
				$precioCebolla = 0.45;
				$total += $precioCebolla;
				$precioCebollaFormat = sprintf("%05.2f€", $precioCebolla);
			?>
				<tr>
					<th>Ingrediente</th>
					<td>Cebolla</td>
					<td><?php echo "$precioCebollaFormat" ?></td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredienteAceitunas'])) {
				$precioAceitunas = 0.55;
				$total += $precioAceitunas;
				$precioAceitunasFormat = sprintf("%05.2f€", $precioAceitunas);
			?>
				<tr>
					<th>Ingrediente</th>
					<td>Aceitunas</td>
					<td><?php echo "$precioAceitunasFormat" ?></td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredientePimiento'])) {
				$precioPimiento = 0.65;
				$total += $precioPimiento;
				$precioPimientoFormat = sprintf("%05.2f€", $precioPimiento);
			?>
				<tr>
					<th>Ingrediente</th>
					<td>Pimiento</td>
					<td><?php echo "$precioPimientoFormat" ?></td>
				</tr>
			<?php
				$totalFormat = sprintf("%05.2f€", $total);
			}
			?>
			<tr>
				<th colspan="2">Total</th>
				<td><?php echo "$totalFormat" ?></td>
			</tr>
		</table>
	<?php
		echo "<h2><a href='./index.php'>Volver</a></h2>";
	}
	?>
</body>

</html>