<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario</title>
	<style>
		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
		}

		th {
			background-color: lightgray;
		}
	</style>
</head>

<body>
	<?php
	if (isset($_REQUEST['enviar'])) {
		$alumnos = array();
		for ($i = 1; $i <= 10; $i++) {
			if (isset($_REQUEST["alumno$i"]) && $_REQUEST["alumno$i"] != "") {
				$alumnos[] = $_REQUEST["alumno$i"];
			}
		}
	?>
		<table>
			<tr>
				<th>Nombre</th>
			</tr>
			<?php
			foreach ($alumnos as $key => $alumno) {
				echo "
				<tr>
					<td>$alumno</td>
				</tr>
				";
			}
			?>
		</table>
		<h2><a href="../index.html">Volver</a></h2>
	<?php
	} else {
		header('Location: ../index.html');
	}
	?>
</body>

</html>