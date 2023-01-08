<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resultados formulario</title>
	<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
	<?php
	if (isset($_REQUEST['enviar'])) {
		$nombre = $_REQUEST['nombre'];
		$apellidos = $_REQUEST['apellidos'];
		$direccion = $_REQUEST['direccion'];
		$telefono = $_REQUEST['telefono'];
		if (isset($_REQUEST['sexo'])) {
			$sexo = $_REQUEST['sexo'];
		} else {
			$sexo = "N/C";
		}
		echo "
		<table>
		<tr>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Sexo</th>
		</tr>
		<tr>
			<td>$nombre</td>
			<td>$apellidos</td>
			<td>$direccion</td>
			<td>$telefono</td>
			<td>$sexo</td>
		</tr>
		</table>
		";
	} else {
		echo "<p>No hay datos</p>";
	};
	?>
	<table>
	<tr>
			<th>Nombre</th>
			<th>Apellidos</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Sexo</th>
		</tr>
		<tr>
			<td><?php echo "$nombre"?></td>
			<td><?php echo "$apellidos"?></td>
			<td><?php echo "$direccion"?></td>
			<td><?php echo "$telefono"?></td>
			<td><?php echo "$sexo"?></td>
		</tr>
	</table>
	<h2><a href="../index.html">Volver</a> </h2>
</body>

</html>