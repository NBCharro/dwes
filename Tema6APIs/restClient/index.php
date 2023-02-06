<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alumnos REST</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
	<h1>Tabla alumnos</h1>
	<?php
	// Todos los alumnos
	$url = "http://localhost/dwes/Tema6APIs/clase/alumnos/";
	$alumnosJSON = file_get_contents($url);
	$alumnos = json_decode($alumnosJSON);
	echo "<h3>{$alumnos[9]->Nombre}</h3>";
	// Un alumno cuyo id es 10
	$url = "http://localhost/dwes/Tema6APIs/clase/alumnos/?id=10";
	$alumnosJSON = file_get_contents($url);
	$alumnos = json_decode($alumnosJSON);
	// echo '<pre>';
	// print_r($alumnos);
	// echo '</pre>';
	require_once("./php/funciones.php");
	mostrar($alumnos);
	?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>