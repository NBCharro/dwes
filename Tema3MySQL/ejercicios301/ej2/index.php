<?php
try {
	$conection = new mysqli('localhost', 'nba', 'nba', 'nba');
	$consultaEquipos = "SELECT nombre FROM equipos";
	$equiposNBA = mysqli_query($conection, $consultaEquipos);
	mysqli_close($conection);
?>


	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tema 3 Ejercicio 1</title>
	</head>

	<body>
		<h1>Seleccione el equipo de NBA</h1>
		<?php
		if (!isset($_REQUEST['enviar'])) {
		?>
			<form action="" method="post">
				<label for="equipo">Equipo</label>
				<select name="equipo" id="equipo">
					<option value=""></option>
					<?php
					if (mysqli_num_rows($equiposNBA) > 0) {
						while ($equipo = mysqli_fetch_assoc($equiposNBA)) {
							foreach ($equipo as $valor) {
								echo "<option value='$valor'>$valor</option>";
							}
						}
					}
					?>
				</select>
				<input type="submit" value="Enviar" name="enviar">
			</form>
		<?php
		} else {
			$conection = new mysqli('localhost', 'nba', 'nba', 'nba');
			$equipo = $_REQUEST['equipo'];
			$consultaJugadores = "SELECT nombre FROM jugadores WHERE Nombre_equipo = '$equipo'";
			$jugadoresNBA = mysqli_query($conection, $consultaJugadores);
		?>
			<ol>
				<?php
				if (mysqli_num_rows($jugadoresNBA) > 0) {
					while ($jugador = mysqli_fetch_assoc($jugadoresNBA)) {
						foreach ($jugador as $valor) {
							echo "<li>$valor</li>";
						}
					}
				}
				?>
			</ol>
			<h2><a href="./index.php">Volver</a></h2>
	<?php
		}
	} catch (mysqli_sql_exception $e) {
		echo "<p>No se puede realizar la operacion. Intentelo de nuevo mas tarde.</p>";
		echo $e->getMessage();
	}
	?>
	</body>

	</html>