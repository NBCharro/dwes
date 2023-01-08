<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 30</title>
	<link rel="stylesheet" href="./CSS/style.css">
</head>

<body>
	<form action="./php/formulario.php" method="post">
		<table>
			<tr>
				<th>Nombre del articulo</th>
				<th>Precio</th>
			</tr>
			<?php
			for ($i = 0; $i < 10; $i++) {
				echo "
				<tr>
				<td><input type='text' name='articulo$i'></td>
				<td><input type='number' step='0.01' name='cantidad$i' min='0' value='0'></td>
				</tr>
				";
			}
			?>
		</table>
		<label for="ordenarPor">Ordenar por:</label>
		<select name="ordenarPor">
			<option value="nombre">Nombre</option>
			<option value="precio">Precio</option>
		</select><br>
		<label for="orden">Orden:</label>
		<select name="orden">Orden:
			<option value="ascendente">Ascendente</option>
			<option value="descendente">Descendente</option>
		</select><br>
		<input type="submit" value="Enviar" name="enviar">
	</form>
</body>

</html>