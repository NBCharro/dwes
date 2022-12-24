<?php
require_once("./funcionesej5.php");
$mascotas = obtenerMascotas();
$especies = obtenerEspecies();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 5</title>
	<style>
		table,
		td,
		th {
			border: 1px solid black;
			text-align: center;
		}

		table {
			border-collapse: collapse;
			width: 70%;
			margin: auto;
		}

		.agregado {
			background-color: green;
			text-align: center;
			font-size: 1.3rem;
			color: white;
		}

		.error {
			text-align: center;
			font-size: 1.3rem;
			color: white;
			background-color: red;
		}

		img {
			width: 75px;
		}

		.m {
			background-color: purple;
			color: wheat;
		}

		.h {
			background-color: yellowgreen;
		}

		#nuevaMascota {
			width: 30%;
			margin: auto;
			text-align: center;
		}

		#nuevaMascota label,
		#nuevaMascota input:not([type='submit']),
		select {
			box-sizing: border-box;
			display: inline-block;
			width: 49%;
			text-align: center;
			margin-top: 5px;
		}

		[type='submit'] {
			width: 100px;
			margin-top: 15px;
			margin-bottom: 25px;
		}

		[type='submit']:hover {
			cursor: pointer;
		}

		#botonBorrar {
			display: inline-block;
			position: relative;
			width: 10%;
			left: 45%;
		}

		[type='checkbox'] {
			width: 25px;
			height: 25px;
		}
	</style>
</head>

<body>
	<?php
	if (isset($_REQUEST['guardar'])) {
		$nombre = $_REQUEST['nombre'];
		$especie = $_REQUEST['especie'];
		$raza = $_REQUEST['raza'];
		$nacimiento = $_REQUEST['nacimiento'];
		$sexo = $_REQUEST['sexo'];
		$agregado = agregarMascota($nombre, $especie, $raza, $nacimiento, $sexo);
		if ($agregado) {
			header("Location: ./ejercicio5.php?agregado=true");
		} else {
			header("Location: ./ejercicio5.php?agregado=false");
		}
	}
	if (isset($_REQUEST['borrar'])) {
		$idMascotas = $_REQUEST['idMascotas'];
		$borrado = borrarMascotas($idMascotas);
	}
	if (isset($_REQUEST['agregado'])) {
		if ($_REQUEST['agregado'] == "true") {
			echo "<p class='agregado'>La mascota se ha agregado correctamente.</p>";
		} else {
			echo "<p class='error'>La mascota se ha podido guardar.</p>";
		}
	}
	?>
	<form action="" method="post" id="nuevaMascota">
		<label for="nombre">Nombre</label>
		<input type="text" name="nombre" id="nombre"><br>
		<label for="especie">Especie</label>
		<select name="especie" id="especie">
			<?php
			foreach ($especies as $especie) {
				echo "<option>{$especie}</option>";
			}
			?>
			<option>otra</option>
		</select><br>
		<label for="raza">Raza</label>
		<input type="text" name="raza" id="raza"><br>
		<label for="nacimiento">Nacimiento</label>
		<input type="number" name="nacimiento" id="nacimiento"><br>
		<label for="sexo">Sexo</label>
		<select name="sexo" id="sexo">
			<option value="m">macho</option>
			<option value="h">hembra</option>
		</select><br>
		<input type="submit" value="Guardar" name="guardar">
	</form>
	<form action="" method="post">
		<table>
			<tr>
				<th>Nombre</th>
				<th>Especie</th>
				<th>Raza</th>
				<th>Nacimiento</th>
				<th>Imagen</th>
				<th>Marcar</th>
			</tr>
			<?php
			foreach ($mascotas as $mascota) {
				if ($mascota['imagen'] == "" && $mascota['especie'] == "otra") {
					$fotografia = "../images/no-disponible.png";
				} else if ($mascota['imagen'] == "") {
					$fotografia = "../images/{$mascota['especie']}.png";
				} else {
					$fotografia = $mascota['imagen'];
				}
				echo "<tr class='{$mascota['sexo']}'>";
				echo "<td>{$mascota['nombre']}</td>";
				echo "<td>{$mascota['especie']}</td>";
				echo "<td>{$mascota['raza']}</td>";
				echo "<td>{$mascota['nacimiento']}</td>";
				echo "<td><img src='{$fotografia}' alt=''></td>";
				echo "<td><input type='checkbox' name='idMascotas[]' value='{$mascota['id']}'></td>";
				echo "</tr>";
			}
			?>
		</table>
		<input type="submit" value="Borrar" name="borrar" id="botonBorrar">
	</form>
</body>

</html>