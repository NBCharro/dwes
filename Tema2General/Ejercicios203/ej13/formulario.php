<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resultados formulario</title>
	<style>
		table,
		td,
		th {
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}

		table {
			border-collapse: collapse;
		}
	</style>
</head>

<body>
	<?php
	$nombre = $_REQUEST['nombre'];
	$apellidos = $_REQUEST['apellidos'];
	$direccion = $_REQUEST['direccion'];
	$telefono = $_REQUEST['telefono'];
	echo "<p>Nombre: $nombre</p>";
	echo "<p>Apellidos: $apellidos</p>";
	echo "<p>Direccion: $direccion</p>";
	echo "<p>Telefono: $telefono</p>";
	?>
</body>

</html>