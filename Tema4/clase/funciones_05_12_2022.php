<?php
function obtenerCategorias()
{
	$categorias = false;
	try {
		$man = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$filter = [];
		$options = [];
		$query = new MongoDB\Driver\Query($filter, $options);
		$colCategories = $man->executeQuery('northwind.categories', $query);
		$categorias = array();
		foreach ($colCategories as $categoria) {
			if (!in_array($categoria->CategoryName, $categorias)) {
				$categorias[] = $categoria->CategoryName;
			}
		}
	} catch (Exception $e) {
	}
	return $categorias;
}

function obtenerProveedores()
{
	$proveedores = false;
	try {
		$man = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		$filter = [];
		$options = [];
		$query = new MongoDB\Driver\Query($filter, $options);
		$colProveedores = $man->executeQuery('northwind.suppliers', $query);
		$proveedores = array();
		foreach ($colProveedores as $proveedor) {
			if (!in_array($proveedor->CompanyName, $proveedores)) {
				$proveedores[] = $proveedor->CompanyName;
			}
		}
	} catch (Exception $e) {
	}
	return $proveedores;
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

function obtenerProductos($categoria, $proveedor)
{
	$productos = false;
	try {
		$man = new MongoDB\Driver\Manager("mongodb://localhost:27017");
		if ($categoria == 0 && $proveedor == 0) {
			$filter = [];
		}
		if ($categoria == 0 && $proveedor != 0) {
			$proveedorID = obtenerSupplierID($proveedor);
			$filter = ['SupplierID' => "$proveedorID"];
		}
		if ($categoria != 0 && $proveedor == 0) {
			$categoriaID = obtenerCategoryID($categoria);
			$filter = ['CategoryID' => "$categoriaID"];
		}
		if ($categoria != 0 && $proveedor != 0) {
			$categoriaID = obtenerCategoryID($categoria);
			$proveedorID = obtenerSupplierID($proveedor);
			$filter = ['CategoryID' => "$categoriaID", 'SupplierID' => "$proveedorID"];
		}
		$options = ['sort' => ['ProductName' => 1]];
		$query = new MongoDB\Driver\Query($filter, $options);
		$colproductos = $man->executeQuery('northwind.products', $query);
		$productos = array();
		$mongo = new MongoDB\Client("mongodb://localhost:27017");
		foreach ($colproductos as $producto) {
			$productos[] = [
				'id' => $producto->ProductID,
				'producto' => $producto->ProductName,
				'categoria' => $categoria != 0 ? $categoria : $mongo->northwind->categories->findOne(["CategoryID" => "{$producto->CategoryID}"])->CategoryName,
				'proveedor' => $proveedor != 0 ? $proveedor : $mongo->northwind->suppliers->findOne(["SupplierID" => "{$producto->SupplierID}"])->CompanyName,
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
