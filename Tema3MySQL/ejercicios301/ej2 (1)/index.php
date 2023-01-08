<?php
try {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Tema 3 Ejercicio 2</title>
	</head>

	<body>
		<h1>Seleccione el equipo de NBA</h1>
		<?php
		if (!isset($_REQUEST['enviar'])) {
			require_once("./funciones.php");
		?>
			<form action="" method="post">
				<label for="equipo">Equipo</label>
				<select name="equipo" id="equipo">
					<?php
					$equipos = obtenerEquipos();
					if ($equipos) {
						foreach ($equipos as $value) {
							echo "<option value='{$equipos['Nombre']}'>{$equipos['Nombre']}</option>";
						}
					} else {
						echo "<p>No se puede mostar la informacion</p>";
					}
					?>
				</select>
				<input type="submit" value="Enviar" name="enviar">
			</form>
		<?php
		} else {
			$conection = new mysqli('localhost', 'nba', 'nba', 'nba');
			$equipo = $_REQUEST['equipo'];
			$consultaJugadores = "SELECT Nombre FROM jugadores WHERE Nombre_equipo = '$equipo'";
			$jugadoresNBA = mysqli_query($conection, $consultaJugadores);
			mysqli_close($conection);
			echo "<pre>";
			print_r(mysqli_fetch_assoc($jugadoresNBA));
			echo "</pre>";
		?>
			<ol>
				<?php
				if (mysqli_num_rows($jugadoresNBA) > 0) {
					while ($jugador = mysqli_fetch_assoc($jugadoresNBA)) {
						echo "<li>{$jugador['Nombre']}</li>";
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