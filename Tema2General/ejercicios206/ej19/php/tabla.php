<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tabla</title>
	<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>telefono</th>
			<th>Direccion</th>
			<th>Poblacion</th>
			<th>Provincia</th>
			<th>Fecha de nacimiento</th>
			<th>Estudios</th>
		</tr>
		<?php
		if (isset($_REQUEST['enviar'])) {
			$cantidad = $_REQUEST['cantidad'];
			for ($i = 0; $i < $cantidad; $i++) {
				echo "<tr>";
				$temp = $_REQUEST["nombre$i"];
				echo "<td>$temp</td>";
				$temp = $_REQUEST["apellidos$i"];
				echo "<td>$temp</td>";
				$temp = $_REQUEST["telefono$i"];
				echo "<td>$temp</td>";
				$temp = $_REQUEST["direccion$i"];
				echo "<td>$temp</td>";
				$temp = $_REQUEST["poblacion$i"];
				echo "<td>$temp</td>";
				$temp = $_REQUEST["provincia$i"];
				echo "<td>$temp</td>";
				$temp = $_REQUEST["nacimiento$i"];
				echo "<td>$temp</td>";
				$temp = $_REQUEST["estudios$i"];
				echo "<td>$temp</td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='28'>No hay valores</td></tr>";
		}
		?>
	</table>
	<h2><a href="./formulario.php">Volver</a></h2>
</body>

</html>