<?php
function guardarProducto()
{
	// No se el codigo para mandar un POST contra una API. Voy a simular una respuesta manualmente
	$respuestaPOST = true;
	return $respuestaPOST;
}


function obtenerProductos()
{
	$uriProductos = "http://localhost/dwes/Tema6APIs/pruebas/ApiPropia/productos";
	$productosJSON = file_get_contents($uriProductos);
	$productos = json_decode($productosJSON);
	return $productos;
}

function obtenerGamaProductos()
{
	$gamas = false;
	try {
		$uriGamasProductos = "http://localhost/dwes/Tema6APIs/pruebas/ApiPropia/gamasproductos";
		$gamasJSON = file_get_contents($uriGamasProductos);
		$gamasProductos = json_decode($gamasJSON);
		$gamas = [];
		foreach ($gamasProductos as $gama) {
			$gamas[] = $gama->Gama;
		}
	} catch (\Throwable $e) {
		# code...
	}
	return $gamas;
}
