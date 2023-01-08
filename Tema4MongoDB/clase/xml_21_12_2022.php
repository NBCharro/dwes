<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dia 21_12_2022</title>
</head>

<body>
	<h1>Escribir archivos XML</h1>
	<?php
	$mascotaNueva = [
		"id" => "010",
		"sexo" => "m",
		"nombre" => "Jose Luis",
		"especie" => "perro",
		"nacimiento" => 2000,
		"foto" => ""
	];
	// Guardamos los datos del XML en un objeto
	$clinica = simplexml_load_file("./data/clinica.xml");
	if ($clinica) {
		// Guardamos el nodo al que añadir el dato
		$mascotas = $clinica->mascotas;
		// Añadimos un nodo nuevo
		$nuevaMascota = $mascotas->addChild("mascota");
		// Añadimos los atributos
		$nuevaMascota->addAttribute("id", $mascotaNueva['id']);
		$nuevaMascota->addAttribute("sexo", $mascotaNueva['sexo']);
		// Añadimos los hijos
		$nuevaMascota->addChild("nombre", $mascotaNueva['nombre']);
		$nuevaMascota->addChild("especie", $mascotaNueva['especie']);
		$nuevaMascota->addChild("nacimiento", $mascotaNueva['nacimiento']);
		$nuevaMascota->addChild("foto", $mascotaNueva['foto']);
		// echo '<pre>';
		// print_r($clinica);
		// echo '</pre>';
		// Una vez hechos los cambios, volcamos los cambios al archivo: saveXML o asXML
		if ($clinica->saveXML("./data/clinica.xml")) {
			echo "<p>Cambios guardados correctamente</p>";
		} else {
			echo "<p>No se han podido guardar los cambios</p>";
		}
	} else {
		// Archivo no existe o la forma XML no es correcta
		echo "<p>No se ha podido acceder al archivo.</p>";
	}
	?>
	<h1>Leer archivos XML</h1>
	<?php
	// Guardamos los datos del XML en un objeto
	$clinica = simplexml_load_file("./data/clinica.xml");
	if ($clinica) {
		// echo '<pre>';
		// // Es mejor que print_r para objetos
		// var_dump($clinica);
		// echo '</pre>';
		// Para leer un nodos
		echo "<h2>Clinica: {$clinica->nombre}</h2>";
		echo "<h2>Propietario: {$clinica->propietario}</h2>";
		// echo '<pre>';
		// print_r($clinica->mascotas->mascota);
		// echo '</pre>';
		echo "<h3>Nombres mascotas</h3>";
		echo "<ul>";
		// OPCION 1
		foreach ($clinica->mascotas->mascota as $mascota) {
			// echo '<pre>';
			// print_r($mascota);
			// echo '</pre>';
			echo "<li>Nombre: {$mascota->nombre} Sexo: {$mascota->attributes()->sexo}</li>";
		}
		echo "</ul>";
		// OPCION 2: Usamos xpath
		echo "<h3>XPATH</h3>";
		$clinicaXpath = $clinica->xpath("/clinica");
		$clinicaXpath = $clinica->xpath("/clinica/propietario");
		$clinicaXpath = $clinica->xpath("/clinica/mascotas/mascota");
		// $clinicaXpath = $clinica->xpath("/clinica/mascotas/mascotas/@id");
		// $clinicaXpath = $clinica->xpath("/clinica/mascotas/mascota[@sexo='m']");
		// $clinicaXpath = $clinica->xpath("/clinica/mascotas/mascota[@sexo='m']/nombre");
		// echo '<pre>';
		// print_r($clinicaXpath);
		// echo '</pre>';
		$mascotas = $clinica->xpath("//mascota");
		// echo '<pre>';
		// print_r($mascotas);
		// echo '</pre>';
		$mascotas = $clinica->xpath("//mascota/nombre");
		echo "<ul>";
		foreach ($mascotas as $mascota) {
			//Usamos una funcion magica
			echo "<li>Nombre mascota: {$mascota->__toString()}</li>";
			// Como es magica, automaticamente se invoca
			echo "<li>Nombre mascota: {$mascota}</li>";
		}
		echo "</ul>";
	} else {
		// Archivo no existe o la forma XML no es correcta
		echo "<p>No se ha podido acceder al archivo.</p>";
	}
	?>
</body>

</html>