<?php
function obtenerDatos()
{
	$datos = false;
	try {
		$mongo = new MongoDB\Client(HOST);
		$db = $mongo->baseDeDatos;
		$mongoDatos = $db->tabla->find()->toArray();
		$datos = array();
		foreach ($mongoDatos as $dato) {
			$datos[] = [
				'id' => $dato->dataID,
				'nombre' => $dato->dataName,
				'precio' => $dato->dataPrice,
			];
		}
	} catch (Exception $e) {
	}
	return $datos;
}

function agregarDatos($id, $nombre, $precio)
{
	$agregado = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$mongoDatos = $mongo->baseDeDatos->tabla;
		$insertar = $mongoDatos->insertOne([
			'ProductID' => "$id",
			'ProductName' => "$nombre",
			'UnitPrice' => "$precio"
		]);
		if ($insertar->getInsertedCount()) {
			$agregado = true;
		}
	} catch (Exception $e) {
	}
	return $agregado;
}
