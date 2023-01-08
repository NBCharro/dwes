<?php
require_once("../vendor/autoload.php");

function obtenerArticulos()
{
	$articulos = false;
	try {
		$man = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$filter = [];
		$options = [];
		$query = new MongoDB\Driver\Query($filter, $options);
		$datos = $man->executeQuery('northwind.products', $query);
		$articulos = array();
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		foreach ($datos as $dato) {
			$articulos[] = [
				'idArticulo' => $dato->ProductID,
				'nombre' => $dato->ProductName,
				'categoria' => $mongo->northwind->categories->findOne(["CategoryID" => "{$dato->CategoryID}"])->CategoryName,
				'proveedor' => $mongo->northwind->suppliers->findOne(["SupplierID" => "{$dato->SupplierID}"])->CompanyName,
				'precio' => $dato->UnitPrice
			];
		}
	} catch (mysqli_sql_exception $e) {
	}
	return $articulos;
}

function nombresCategorias()
{
	$categorias = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$colCategories = $mongo->northwind->categories->find()->toArray();
		$categorias = array();
		foreach ($colCategories as $categoria) {
			if (!in_array($categoria["CategoryName"], $categorias)) {
				$categorias[] = $categoria["CategoryName"];
			}
		}
	} catch (Exception $e) {
	}
	return $categorias;
}
function nombresProveedores()
{
	$proveedores = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$colProveedores = $mongo->northwind->suppliers->find()->toArray();
		$proveedores = array();
		foreach ($colProveedores as $proveedor) {
			if (!in_array($proveedor["CompanyName"], $proveedores)) {
				$proveedores[] = $proveedor["CompanyName"];
			}
		}
	} catch (Exception $e) {
	}
	return $proveedores;
}

function agregarDatos($arrayDatos)
{
	$agregado = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$colProductos = $mongo->northwind->products;
		$ultimoID = obtenerUltimoProductID();
		$supplierID = obtenerSupplierID($arrayDatos['proveedor']);
		$categoryID = obtenerCategoryID($arrayDatos['categoria']);
		$res = $colProductos->insertOne([
			'ProductID' => "$ultimoID",
			'ProductName' => $arrayDatos['nombre'],
			'SupplierID' => "$supplierID",
			'CategoryID' => "$categoryID",
			'QuantityPerUnit' => $arrayDatos['cantidadPorUnidad'],
			'UnitsInStock' => $arrayDatos['unidadesEnStock'],
			'UnitPrice' => $arrayDatos['precio']
		]);
		if ($res->getInsertedCount()) {
			$agregado = true;
		}
	} catch (mysqli_sql_exception $e) {
	}
	return $agregado;
}

function obtenerUltimoProductID()
{
	$mayorID = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$db = $mongo->northwind;
		$colProductos = $db->products->find()->toArray();
		$mayorID = 0;
		foreach ($colProductos as $producto) {
			if ($producto->ProductID >= $mayorID) {
				$mayorID = $producto->ProductID;
			}
		}
		$mayorID += 1;
	} catch (Exception $e) {
	}
	return $mayorID;
}
function obtenerSupplierID($proveedor)
{
	$proveedorID = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$colProveedor = $mongo->northwind->suppliers->findOne(["CompanyName" => "$proveedor"]);
		$proveedorID = $colProveedor->SupplierID;
	} catch (Exception $e) {
	}
	return $proveedorID;
}

function obtenerCategoryID($categoria)
{
	$categoriaID = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$colCategories = $mongo->northwind->categories->findOne(["CategoryName" => "$categoria"]);
		$categoriaID = $colCategories->CategoryID;
	} catch (Exception $e) {
	}
	return $categoriaID;
}

function eliminarDatos($idArticulo)
{
	$eliminado = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$colProductos = $mongo->northwind->products;
		$res = $colProductos->deleteOne([
			'ProductID' => $idArticulo
		]);
		$eliminado = true;
	} catch (mysqli_sql_exception $e) {
	}
	return $eliminado;
}

// Hay que revisar esto Bien
function cambiarDatos($arrayDatos)
{
	$agregado = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$colProductos = $mongo->northwind->products;
		$ultimoID = obtenerUltimoProductID();
		$supplierID = obtenerSupplierID($arrayDatos['proveedor']);
		$categoryID = obtenerCategoryID($arrayDatos['categoria']);
		$res = $colProductos->updateOne(
			['ProductID' => $arrayDatos['ID']],
			[
				'$set' =>
				[
					'ProductID' => "$ultimoID",
					'ProductName' => $arrayDatos['nombre'],
					'SupplierID' => "$supplierID",
					'CategoryID' => "$categoryID",
					'QuantityPerUnit' => $arrayDatos['cantidadPorUnidad'],
					'UnitsInStock' => $arrayDatos['unidadesEnStock'],
					'UnitPrice' => $arrayDatos['precio']
				]
			]
		);
		if ($res->getInsertedCount()) {
			$agregado = true;
		}
	} catch (mysqli_sql_exception $e) {
	}
	return $agregado;
}
