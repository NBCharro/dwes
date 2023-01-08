<?php
function obtenerMascotas()
{
	$mascotas = false;
	try {
		$clinica = simplexml_load_file("../data/clinica.xml");
		$mascotasXML = $clinica->xpath("/clinica/mascotas/mascota");
		$mascotas = [];
		foreach ($mascotasXML as $mascota) {
			$mascotas[] = [
				"nombre" => $mascota->nombre->__toString(),
				"especie" => $mascota->especie->__toString(),
				"raza" => $mascota->raza->__toString(),
				"nacimiento" => $mascota->nacimiento->__toString(),
				"imagen" => $mascota->foto->__toString(),
				"sexo" => strtolower($mascota->attributes()->sexo),
				"id" => $mascota->attributes()->id
			];
		}
	} catch (Exception $e) {
		# code...
	}
	return $mascotas;
}

function obtenerEspecies()
{
	$especies = false;
	try {
		$clinica = simplexml_load_file("../data/clinica.xml");
		$mascotasXML = $clinica->xpath("/clinica/mascotas/mascota");
		$especies = [];
		foreach ($mascotasXML as $mascota) {
			if (!in_array($mascota->especie->__toString(), $especies)) {
				$especies[] = $mascota->especie->__toString();
			}
		}
	} catch (Exception $e) {
		# code...
	}
	return $especies;
}

function obtenerUltimoID()
{
	$id = false;
	try {
		$clinica = simplexml_load_file("../data/clinica.xml");
		$mascotasXML = $clinica->xpath("/clinica/mascotas/mascota");
		// $mascotasXML = $clinica->xpath("/clinica/mascotas/mascotas/@id");
		$id = intval($mascotasXML[count($mascotasXML) - 1]->attributes()->id->__toString()) + 1;
		$id = sprintf('%03s', $id);
	} catch (Exception $e) {
		# code...
	}
	return $id;
}

function agregarMascota($nombre, $especie, $raza, $nacimiento, $sexo)
{
	$agregado = false;
	try {
		@$clinica = simplexml_load_file("../data/clinica.xml");
		$id = obtenerUltimoID();
		if ($clinica) {
			$mascota = $clinica->mascotas->addChild("mascota");
			$mascota->addAttribute('id', $id);
			$mascota->addAttribute('sexo', $sexo);
			$mascota->addChild('nombre', $nombre);
			$mascota->addChild('especie', $especie);
			$mascota->addChild('raza', $raza);
			$mascota->addChild('nacimiento', $nacimiento);
			$mascota->addChild('foto');
			$clinica->asXML("../data/clinica.xml");
			$agregado = true;
		}
	} catch (Exception $e) {
		# code...
	}
	return $agregado;
}

function borrarMascotas($idMascotas)
{
	$borrado = false;
	try {
		echo "<p>No se ha configurado la funcion borrar.</p>";
		echo '<pre>';
		print_r($idMascotas);
		echo '</pre>';
	} catch (Exception $e) {
		# code...
	}
	return $borrado;
}
