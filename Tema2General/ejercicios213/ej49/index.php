<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 49</title>
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
	<?php
	include("./inc/header.php");
	?>
	<form action="./php/formulario.php" method="post">
		<label for="cantidad">Introduzca el numero de valores de la muestra:</label>
		<input type="number" name="cantidad" min="0" value="0"><br>
		<label for="funcion">Funcion a calcular:</label>
		<select name="funcion">
			<option name="funcion" value="Minimo">Minimo</option>
			<option name="funcion" value="Maximo">Maximo</option>
			<option name="funcion" value="Suma">Suma</option>
			<option name="funcion" value="Media">Media</option>
			<option name="funcion" value="Recorrido">Recorrido</option>
			<option name="funcion" value="Moda">Moda</option>
		</select><br>
		<input type="submit" value="Enviar" name="enviar">
	</form>
	<?php
	include("./inc/footer.php");
	?>
</body>

</html>