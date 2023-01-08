<?php
session_start();
if (!isset($_SESSION['partidas'])) {
	$_SESSION['partidas'] = array("ganadas" => 0, "perdidas" => 0, "numeroTotal" => 0);
}

if (isset($_REQUEST['empezarDeNuevo'])) {
	// unset($_SESSION['partidas']);
	// session_destroy();
	$_SESSION['partidas'] = array("ganadas" => 0, "perdidas" => 0, "numeroTotal" => 0);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 53</title>
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
				<!-- No guarda la opcion seleccionada, habria que guardar el valor de alguna forma
				para que se mantenga el valor checked cuando se comprueba -->
				<option name="eleccion" value="0">A</option>
				<option name="eleccion" value="1">B</option>
				<option name="eleccion" value="2">C</option>
			</select>
			<input type="submit" value="Comprobar" name="comprobar">
		</form>
		<?php
		if (isset($_REQUEST['comprobar'])) {
			$eleccion = $_REQUEST['eleccion'];
			$baraja = array("oro1", "oro2", "oro3");
			$opcionElegida = array("A", "B", "C");
			shuffle($baraja);
			if ($baraja[$eleccion] == "oro1") {
				echo "<h2>HAS ACERTADO</h2>";
				$_SESSION['partidas']['ganadas'] = $_SESSION['partidas']['ganadas'] + 1;
			} else {
				echo "<h2>NO HAS ACERTADO</h2>";
				$_SESSION['partidas']['perdidas'] = $_SESSION['partidas']['perdidas'] + 1;
			}
			$_SESSION['partidas']['numeroTotal'] = $_SESSION['partidas']['numeroTotal'] + 1;
			$ganadas = $_SESSION['partidas']['ganadas'];
			$perdidas = $_SESSION['partidas']['perdidas'];
			$numeroTotal = $_SESSION['partidas']['numeroTotal'];
		?>
			<h4>Has seleccionado la opcion <?php echo "$opcionElegida[$eleccion]"; ?></h4>
			<img src="./imagenes/<?php echo "$baraja[0]" ?>.jpg" alt="As de oros">
			<img src="./imagenes/<?php echo "$baraja[1]" ?>.jpg" alt="Dos de oros">
			<img src="./imagenes/<?php echo "$baraja[2]" ?>.jpg" alt="Tres de oros">
			<div>
				<p>Número de partidas ganadas: <?php echo "$ganadas" ?></p>
				<p>Número de partidas perdidas: <?php echo "$perdidas" ?></p>
				<p>Número de total de partidas: <?php echo "$numeroTotal" ?></p>
			</div>
			<form action="" method="post">
				<input type="submit" value="Volver a jugar" name="volverAJugar">
				<input type="submit" value="Empezar un nuevo juego" name="empezarDeNuevo">
			</form>
	<?php
		}
	}
	?>
</body>

</html>