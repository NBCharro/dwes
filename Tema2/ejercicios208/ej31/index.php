<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 31</title>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<?php
	if (!isset($_REQUEST['enviar']) && !isset($_REQUEST['comprobar'])) {
	?>
		<form action="" method="post">
			<?php
			$baraja = array("oro1", "oro2", "oro3");
			shuffle($baraja);
			?>
			<img src="./imagenes/<?php echo "$baraja[0]" ?>.jpg" alt="As de oros">
			<img src="./imagenes/<?php echo "$baraja[1]" ?>.jpg" alt="Dos de oros">
			<img src="./imagenes/<?php echo "$baraja[2]" ?>.jpg" alt="Tres de oros">
			<br><input type="submit" value="Enviar" name="enviar">
		</form>
	<?php
	} else {
	?>
		<table>
			<tr>
				<td>
					<img src="./imagenes/dorso.png" alt="Primer dorso">
				</td>
				<td>
					<img src="./imagenes/dorso.png" alt="Segundo dorso">
				</td>
				<td>
					<img src="./imagenes/dorso.png" alt="Tercer dorso">
				</td>
			</tr>
			<tr>
				<td>A</td>
				<td>B</td>
				<td>C</td>
			</tr>
		</table>
		<br><br>
		<form action="" method="post">
			<label for="eleccion">¿Donde esta el AS de oros?</label>
			<select name="eleccion">
				<option name="eleccion" value="0">A</option>
				<option name="eleccion" value="1">B</option>
				<option name="eleccion" value="2">C</option>
			</select>
			<input type="submit" value="Comprobar" name="comprobar">
		</form>
		<?php
		if (isset($_REQUEST['comprobar'])) {
			$eleccion = $_REQUEST['eleccion'];
			/* $baraja = array("A", "B", "C"); */
			$baraja = array("oro1", "oro2", "oro3");
			shuffle($baraja);
			if ($baraja[$eleccion] == "oro1") {
				echo "<h2>HAS ACERTADO</h2>";
			} else {
				echo "<h2>NO HAS ACERTADO</h2>";
			}
		?>
			<img src="./imagenes/<?php echo "$baraja[0]" ?>.jpg" alt="As de oros">
			<img src="./imagenes/<?php echo "$baraja[1]" ?>.jpg" alt="Dos de oros">
			<img src="./imagenes/<?php echo "$baraja[2]" ?>.jpg" alt="Tres de oros">
	<?php
		}
	}
	?>
</body>

</html>