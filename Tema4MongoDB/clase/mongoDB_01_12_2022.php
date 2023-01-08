<?php
require './vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mongo DB Dia_30_11_2022</title>
	<style>
		table,
		td,
		th {
			border: 1px solid black;
			padding: 4px 10px;
		}

		th {
			background-color: grey;
		}

		table {
			border-collapse: collapse;
			width: 80%;
			margin: 0 auto;
		}

		h1 {
			text-align: center;
		}
	</style>
</head>

<body>
	<?php
	// Creamos una instancia de la clase MongoDB y subclase Client para conectarnos
	$mongo = new MongoDB\Client("mongodb://localhost:27017");
	// Seleccionamos la base de datos
	$db = $mongo->northwind;
	// Seleccionamos una coleccion
	$colProductos = $db->products;
	// Podemos hacerlo todo a la vez
	// $colProductos = $mongo->northwind->products;
	?>
	<?php
	// Buscamos informacion con find()
	$productos = $colProductos->find(); // Devuelve la coleccion completa = SELECT *. Tambien es un cursor
	$productos = $colProductos->find()->toArray(); // Nos guarda los resultados del cursor en un array. Cada uno de ellos es un objeto, NO un array bidimensional
	// echo '<pre>';
	// print_r($productos);
	// echo '</pre>';
	// echo "<table>";
	// echo "<tr>";
	// echo "<th>ID</th>";
	// echo "<th>Nombre</th>";
	// echo "<th>Categoria</th>";
	// echo "<th>Precio</th>";
	// echo "</tr>";
	// foreach ($productos as $producto) {
	//     echo "<tr>";
	//     echo "<th>{$producto->ProductID}</th>";
	//     echo "<td>{$producto->ProductName}</td>";
	//     echo "<td>{$producto->CategoryID}</td>";
	//     echo "<td>{$producto->UnitPrice} €</td>";
	//     echo "</tr>";
	// }
	// echo "</table>";
	?>
	<?php
	// Buscamos informacion con findOne() ===> solo nos da uno, OJO con la restriccion que si tiene mas devuelve uno solo
	$productoOne = $colProductos->findOne(array("ProductID" => "1"));
	$productoOne = $colProductos->findOne(["ProductID" => "1"]); // Ambas son equivalentes
	// echo '<pre>';
	// print_r($productoOne);
	// echo '</pre>';
	// echo "<table>";
	// echo "<tr>";
	// echo "<th>ID</th>";
	// echo "<th>Nombre</th>";
	// echo "<th>Categoria</th>";
	// echo "<th>Precio</th>";
	// echo "</tr>";
	// echo "<tr>";
	// echo "<th>{$productoOne->ProductID}</th>";
	// echo "<td>{$productoOne->ProductName}</td>";
	// echo "<td>{$productoOne->CategoryID}</td>";
	// echo "<td>{$productoOne->UnitPrice} €</td>";
	// echo "</tr>";
	// echo "</table>";
	?>
	<?php
	// Restricciones del find()
	$productos = $colProductos->find(["ProductID" => "1"])->toArray(); // Aunque solo devuelva un valor, siempre es un array
	$productos = $colProductos->find(["CategoryID" => "1"])->toArray();
	$productos = $colProductos->find(['$or' => [["CategoryID" => "1"], ["CategoryID" => "3"]]])->toArray(); // Categoria 1 O 3 OJO con las comillas simples
	$productos = $colProductos->find(['UnitPrice' => ['$lt' => "50"]])->toArray(); // Precio menor a 50
	$productos = $colProductos->find(['UnitPrice' => ['$gt' => "10", '$lt' => "20"]])->toArray(); // Mayores de 10 y menos de 20
	$productos = $colProductos->find(['UnitPrice' => ['$gt' => "10", '$lt' => "20"], '$or' => [["CategoryID" => "1"], ["CategoryID" => "3"]]])->toArray(); // Mayores de 10 y menos de 20 y de categoria 1 o 3
	// echo "<table>";
	// echo "<tr>";
	// echo "<th>ID</th>";
	// echo "<th>Nombre</th>";
	// echo "<th>Categoria</th>";
	// echo "<th>Precio</th>";
	// echo "</tr>";
	// foreach ($productos as $producto) {
	//     echo "<tr>";
	//     echo "<th>{$producto->ProductID}</th>";
	//     echo "<td>{$producto->ProductName}</td>";
	//     echo "<td>{$producto->CategoryID}</td>";
	//     echo "<td>{$producto->UnitPrice} €</td>";
	//     echo "</tr>";
	// }
	// echo "</table>";
	?>
	<h1>Ejercicio 1</h1>
	<?php
	$productos = $colProductos->find()->toArray();
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
		echo "<th>{$producto->ProductID}</th>";
		echo "<td>{$producto->ProductName}</td>";
		$colCategories = $db->categories->findOne(["CategoryID" => "{$producto->CategoryID}"]);
		echo "<td>{$colCategories->CategoryName}</td>";
		$colProveedor = $db->suppliers->findOne(["SupplierID" => "{$producto->SupplierID}"]);
		echo "<td>{$colProveedor->CompanyName}</td>";
		echo "<td>{$producto->UnitPrice} €</td>";
		echo "</tr>";
	}
	echo "</table>";
	?>
	<h1>Ejercicio 2</h1>
	<?php
	include_once("./funciones_01_12_2022.php");
	$productos = obtenerProductos();
	mostrarProductos($productos);
	?>
	<h1>Ejercicio 3</h1>
	<?php
	// $categorias = nombresCategorias();
	// echo '<pre>';
	// print_r($categorias);
	// echo '</pre>';
	// $proveedores = nombresProveedores();
	// echo '<pre>';
	// print_r($proveedores);
	// echo '</pre>';
	$productosArray = obtenerProductosArray();
	mostrarProductos($productosArray);
	// Agregar Dato
	// agregarDato();
	?>
	<?php
	$categorias = nombresCategorias();
	$proveedores = nombresProveedores();
	?>
	<h1>Ejercicio 4: Insertar Producto</h1>
	<form action="" method="post">
		<label for="nombre">Nombre</label><br>
		<input type="text" name="nombre" id="nombre"><br>
		<label for="categoria">Categoria</label><br>
		<select name="categoria" id="categoria">
			<?php
			foreach ($categorias as $categoria) {
				echo "<option>$categoria</option>";
			} ?>
		</select><br>
		<label for="proveedor">Proveedor</label><br>
		<select name="proveedor" id="proveedor">
			<?php
			foreach ($proveedores as $proveedor) {
				echo "<option>$proveedor</option>";
			} ?>
		</select><br>
		<label for="precio">Precio</label><br>
		<input type="text" name="precio" id="precio"><br>
		<label for="cantidad">Cantidad por unidad</label><br>
		<input type="text" name="cantidad" id="cantidad"><br><br>
		<input type="submit" value="Agregar" name="agregar">
	</form>
	<?php
	if (isset($_REQUEST['agregar'])) {
		$nombre = $_REQUEST['nombre'];
		$categoria = $_REQUEST['categoria'];
		$proveedor = $_REQUEST['proveedor'];
		$precio = $_REQUEST['precio'];
		$cantidad = $_REQUEST['cantidad'];
		$agregar = agregarProducto($nombre, $categoria, $proveedor, $precio, $cantidad);
		if ($agregar) {
			echo "<h2>Producto agregado correctamente.</h2>";
		} else {
			echo "<h2>No se ha podido agregar el producto.</h2>";
		}
	} ?>
</body>

</html>