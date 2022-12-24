<?php
include_once("./funciones.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tema 3 Ejercicio 3</title>
</head>

<body>
	<form action="./formulario.php" method="post">
		<label for="estadistica">Estadistica</label>
		<select name="estadistica" id="estadistica">
			<option>Puntos</option>
			<option>Rebotes</option>
			<option>Asistencias </option>
			<option>Tapones</option>
		</select><br>
		<label for="temporada">Temporada</label>
		<select name="temporada" id="temporada">
			<?php
			$temporadas = obtenerTemporadas();

			foreach ($temporadas as $key => $temporada) {
				echo "<option value='{$key}'>$temporada</option>";
			}
			?>
		</select><br>
		<label for="numeroJugadores">Numero de jugadores</label>
		<input type="number" name="numeroJugadores" id="numeroJugadores" min="1" value="1"><br>
		<input type="submit" value="Enviar" name="enviar">
	</form>
</body>

</html>