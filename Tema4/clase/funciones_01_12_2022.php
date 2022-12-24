<?php
function obtenerProductos()
{
	$productos = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$db = $mongo->northwind;
		$colProductos = $db->products->find()->toArray();
		$productos = array();
		foreach ($colProductos as $producto) {
			$colCategories = $db->categories->findOne(["CategoryID" => "{$producto->CategoryID}"]);
			$colProveedor = $db->suppliers->findOne(["SupplierID" => "{$producto->SupplierID}"]);
			$productos[] = [
				'id' => $producto->ProductID,
				'producto' => $producto->ProductName,
				'categoria' => $colCategories->CategoryName,
				'proveedor' => $colProveedor->CompanyName,
				'precio' => $producto->UnitPrice,
			];
		}
	} catch (Exception $e) {
	}
	return $productos;
}

function mostrarProductos($productos)
{
	try {
		echo "<table>";
		echo "<tr>";
		echo "<th>ID</th>";
		echo "<th>Nombre</th>";
		echo "<th>Categoria</th>";
		echo "<th>Proveedor</th>";
		echo "<th>Precio</th>";
		echo "</tr>";
		foreach ($productos as $producto) {
			echo "<tr>";
			echo "<th>{$producto['id']}</th>";
			echo "<td>{$producto['producto']}</td>";
			echo "<td>{$producto['categoria']}</td>";
			echo "<td>{$producto['proveedor']}</td>";
			echo "<td>{$producto['precio']} €</td>";
			echo "</tr>";
		}
		echo "</table>";
	} catch (Exception $e) {
	}
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
		$colCategories = $mongo->northwind->suppliers->find()->toArray();
		$proveedores = array();
		foreach ($colCategories as $proveedor) {
			if (!in_array($proveedor["CompanyName"], $proveedores)) {
				$proveedores[] = $proveedor["CompanyName"];
			}
		}
	} catch (Exception $e) {
	}
	return $proveedores;
}

function obtenerProductosArray()
{
	$productos = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$db = $mongo->northwind;
		$colProductos = $db->products->find()->toArray();
		$categorias = nombresCategorias();
		$proveedores = nombresProveedores();
		$productos = array();
		foreach ($colProductos as $producto) {
			$productos[] = [
				'id' => $producto->ProductID,
				'producto' => $producto->ProductName,
				'categoria' => $categorias[$producto->CategoryID - 1],
				'proveedor' => $proveedores[$producto->SupplierID - 1],
				'precio' => $producto->UnitPrice,
			];
		}
	} catch (Exception $e) {
	}
	return $productos;
}

function agregarProducto($nombre, $categoria, $proveedor, $precio, $cantidad)
{
	$agregado = false;
	try {
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		$colProductos = $mongo->northwind->products;
		$ultimoID = obtenerUltimoProductID();
		$supplierID = obtenerSupplierID($proveedor);
		$categoryID = obtenerCategoryID($categoria);
		$res = $colProductos->insertOne([
			'ProductID' => "$ultimoID",
			'ProductName' => "$nombre",
			'SupplierID' => "$supplierID",
			'CategoryID' => "$categoryID",
			'QuantityPerUnit' => "$cantidad",
			'UnitPrice' => "$precio"
		]);
		if ($res->getInsertedCount()) {
			$agregado = true;
		}
	} catch (Exception $e) {
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
