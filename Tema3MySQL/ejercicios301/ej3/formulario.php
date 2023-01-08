<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario</title>
	<style>
		table,
		td,
		th {
			border: 1px solid black;
		}

		table {
			border-collapse: collapse;
		}
	</style>
</head>

<body>
	<?php
	if (isset($_REQUEST['enviar'])) {
		$estadistica = $_REQUEST['estadistica'];
		$temporada = $_REQUEST['temporada'];
		$numeroJugadores = $_REQUEST['numeroJugadores'];
		include_once("./funciones.php");
		$jugadores = obtenerJugadores($estadistica, $temporada, $numeroJugadores);
	?>
		<h1>TOP <?php echo $numeroJugadores; ?></h1>
		<h2><?php echo $estadistica; ?> por partido (<?php echo $temporada; ?>)</h2>
		<table>
			<tr>
				<th>Jugador</th>
				<th>Equipo</th>
				<th><?php echo $estadistica; ?></th>
			</tr>
			<?php
			foreach ($jugadores as $value) {
				echo "<tr>";
				echo "<td>{$value['Nombre']}</td>";
				echo "<td>{$value['Nombre_equipo']}</td>";
				echo "<td>" . $value["{$estadistica}_por_partido"] . "</td>";
				echo "</tr>";
			}
			?>
		</table>
		<h2><a href="">Volver</a></h2>
	<?php
	} else {
		header("Location: ./index.php");
	}
	?>
</body>

</html>