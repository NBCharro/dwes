<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 23</title>
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

	?>
		<table>
			<tr>
				<th>Tamaño</th>
				<td><?php echo " $tamano" ?></td>
				<td><?php echo "$precioTamano" ?> €</td>
			</tr>
			<tr>
				<th>Base</th>
				<td><?php echo " $base" ?></td>
				<td><?php echo "$precioBase" ?> €</td>
			</tr>
			<tr>
				<th>Salsa</th>
				<td><?php echo " $salsa" ?></td>
				<td><?php echo "$precioSalsa" ?> €</td>
			</tr>
			<?php
			if (isset($_REQUEST['ingredientePollo'])) {
				$precioPollo = 0.55;
				$total += $precioPollo;
			?>
				<tr>
					<th>Ingrediente</th>
					<td>Pollo</td>
					<td><?php echo "$precioPollo" ?> €</td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredienteBacon'])) {
				$precioBacon = 0.75;
				$total += $precioBacon;
			?>
				<tr>
					<th>Ingrediente</th>
					<td>Bacon</td>
					<td><?php echo "$precioBacon" ?> €</td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredienteJamon'])) {
				$precioJamon = 0.95;
				$total += $precioJamon;

			?>
				<tr>
					<th>Ingrediente</th>
					<td>Jamon</td>
					<td><?php echo "$precioJamon" ?> €</td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredienteCebolla'])) {
				$precioCebolla = 0.45;
				$total += $precioCebolla;

			?>
				<tr>
					<th>Ingrediente</th>
					<td>Cebolla</td>
					<td><?php echo "$precioCebolla" ?> €</td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredienteAceitunas'])) {
				$precioAceitunas = 0.55;
				$total += $precioAceitunas;

			?>
				<tr>
					<th>Ingrediente</th>
					<td>Aceitunas</td>
					<td><?php echo "$precioAceitunas" ?> €</td>
				</tr>
			<?php
			}
			?>
			<?php
			if (isset($_REQUEST['ingredientePimiento'])) {
				$precioPimiento = 0.65;
				$total += $precioPimiento;
			?>
				<tr>
					<th>Ingrediente</th>
					<td>Pimiento</td>
					<td><?php echo "$precioPimiento" ?> €</td>
				</tr>
			<?php
			}
			?>
			<tr>
				<th colspan="2">Total</th>
				<td><?php echo "$total" ?> €</td>
			</tr>
		</table>
	<?php
		echo "<h2><a href='./index.php'>Volver</a></h2>";
	}
	?>
</body>

</html>