<?php
function obtenerProductos()
{
	$productos = false;
	try {
		$productosJSON = file_get_contents("../data/products.json");
		if ($productosJSON) {
			$JSONdecode = json_decode($productosJSON, true);
			$categorias = obtenerCategorias();
			$proveedores = obtenerProveedores();
			$productos = [];
			foreach ($JSONdecode as $cliente) {
				$productos[] = [
					"ProductID" => $cliente['ProductID'],
					"ProductName" => $cliente['ProductName'],
					// "SupplierID" => $cliente['SupplierID'],
					"SupplierID" => $proveedores[$cliente['SupplierID']],
					// "CategoryID" => $cliente['CategoryID'],
					"CategoryID" => $categorias[$cliente['CategoryID']],
					"QuantityPerUnit" => $cliente['QuantityPerUnit'],
					"UnitPrice" => $cliente['UnitPrice'],
					"UnitsInStock" => $cliente['UnitsInStock']
				];
			}
		}
	} catch (Exception $e) {
		# code...
	}
	return $productos;
}

function obtenerCategorias()
{
	$categorias = false;
	try {
		$productosJSON = file_get_contents("../data/categories.json");
		if ($productosJSON) {
			$JSONdecode = json_decode($productosJSON, true);
			$categorias = [];
			foreach ($JSONdecode as $categoria) {
				if (!in_array($categoria['CategoryName'], $categorias)) {
					$categorias[$categoria['CategoryID']] = $categoria['CategoryName'];
				}
			}
		}
	} catch (Exception $e) {
		# code...
	}
	return $categorias;
}

function obtenerProveedores()
{
	$proveedores = false;
	try {
		$porveedoresJSON = file_get_contents("../data/suppliers.json");
		if ($porveedoresJSON) {
			$JSONdecode = json_decode($porveedoresJSON, true);
			$proveedores = [];
			foreach ($JSONdecode as $proveedor) {
				if (!in_array($proveedor['CompanyName'], $proveedores)) {
					$proveedores[$proveedor['SupplierID']] = $proveedor['CompanyName'];
				}
			}
		}
	} catch (Exception $e) {
		# code...
	}
	return $proveedores;
}

function obtenerUltimoIDProductos()
{
	$id = false;
	try {
		$productosJSON = file_get_contents("../data/products.json");
		if ($productosJSON) {
			$JSONdecode = json_decode($productosJSON, true);
			$id = $JSONdecode[count($JSONdecode) - 1]['ProductID'] + 1;
		}
	} catch (Exception $e) {
		# code...
	}
	return $id;
}

function guardarProduco($nuevoProducto)
{
	$agregado = false;
	try {
		$ultimoID = obtenerUltimoIDProductos();
		$producto = [
			"ProductID" => $ultimoID,
			"ProductName" => $nuevoProducto['ProductName'],
			"SupplierID" => $nuevoProducto['SupplierID'],
			"CategoryID" => $nuevoProducto['CategoryID'],
			"QuantityPerUnit" => 'NULL',
			"UnitPrice" => $nuevoProducto['UnitPrice'],
			"UnitsInStock" => $nuevoProducto['UnitsInStock'],
			"UnitsOnOrder" => 'NULL',
			"ReorderLevel" => 'NULL',
			"Discontinued" => 'NULL',

		];
		$productosJSON = file_get_contents("../data/products.json");
		if ($productosJSON) {
			$productos = json_decode($productosJSON, true);
			$productos[] = $producto;
			$productosJSONencode = json_encode($productos);
			$num = file_put_contents("../data/products.json", $productosJSONencode);
			if ($num) {
				$agregado = true;
			}
		}
	} catch (Exception $e) {
		# code...
	}
	return $agregado;
}

function eliminarProductos($idEliminar)
{
	$eliminados = false;
	try {
		$productosJSON = file_get_contents("../data/products.json");
		if ($productosJSON) {
			$productosDecode = json_decode($productosJSON, true);

			$productos = [];
			foreach ($productosDecode as $value) {
				if (!in_array($value['ProductID'], $idEliminar)) {
					$productos[] = $value;
				}
			}
			$productosJSONencode = json_encode($productos);
			$num = file_put_contents("../data/products.json", $productosJSONencode);
			if ($num) {
				$eliminados = true;
			}
		}
	} catch (Exception $e) {
		# code...
	}
	return $eliminados;
}
