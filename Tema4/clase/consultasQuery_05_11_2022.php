<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Consulta Query 05_11_2022</title>
	<style>
		table,
		td,
		th {
			border: 1px solid black;
		}

		table {
			border-collapse: collapse;
			width: 80%;
			margin: auto;
		}

		th {
			background-color: grey;
			color: wheatblue;
		}

		td select,
		td input {
			display: flex;
			align-content: center;
			margin: auto;
		}
	</style>
</head>

<body>
	<h1>Query</h1>
	<?php
	require './vendor/autoload.php';
	// MongoDB permite realizar consultas mas complejas que las que nos permite find(), para ello usamos query
	// Primero tenemos que crear un objeto Manager
	$man = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	// Ahora creamos los filtros y opciones. En el primer caso lo dejamos en blanco y nos devuelve todo.
	$filter = [];
	$options = [];
	// Creamos la consulta
	$query = new MongoDB\Driver\Query($filter, $options);
	// Ejecutamos la consulta
	$productos = $man->executeQuery('northwind.products', $query);
	// Obtendremos un cursor con todos los datos de nuestra DB
	// foreach ($productos as $producto) {
	// 	echo "<pre>";
	// 	print_r($producto);
	// 	echo "</pre>";
	// }
	?>
	<h1>Query opciones</h1>
	<?php
	// Las mas usadas son: projection, sort, limit, skip, max, min
	// PROJECTION: permite establecer los campos del documento que queremos obtener (nombre, id, precio, etc)
	$options = ['projection' => ['ProductID' => 1, 'ProductName' => 1, 'UnitPrice' => 1]];
	// SORT: nos permite ordenar los campos. Para ascendente 1 y para descendente -1
	$options = ['sort' => ['ProductID' => -1, 'UnitPrice' => 1]];
	// LIMIT: indica el numero maximo de documentos a obtener
	$options = ['limit' => 5];
	// SKIP: nos indica el numero de documentos que queremos saltar en los resultados.
	// es decir, empezar la busqueda en el documento 10, 100, 54335, etc. 
	$options = ['skip' => 10];
	// MAX/MIN: permite obtener unicamente el documento que contiene el valor maximo/minimo en un campo en particular
	// Ejemplo: Cinco primeros productos ordenados por nombre
	$options = ['sort' => array('ProductName' => 1), 'limit' => 5];
	$options = ['sort' => ['ProductName' => 1], 'limit' => 5];
	// Ejemplo: Productos del 11 al 15 (salto de 10) ordenados por nombre
	$options = ['sort' => ['ProductName' => 1], 'skip' => 10, 'limit' => 5];
	// Ejemplo: Tres productos más recientes: utilizamos “_id” y valor -1 (descendente)
	$options = ['sort' => ['ProductID' => -1], 'limit' => 3];
	// Ejemplo: id, nombre y precio de todos los productos ordenados por nombre
	$options = [
		'projection' => ['ProductID' => 1, 'ProductName' => 1, 'UnitPrice' => 1],
		'sort' => ['ProductName' => 1], 'limit' => 4
	];
	$query = new MongoDB\Driver\Query($filter, $options);
	$productos = $man->executeQuery('northwind.products', $query);
	foreach ($productos as $producto) {
		echo "<pre>";
		print_r($producto);
		echo "</pre>";
	}
	?>
	<h1>Query filtros</h1>
	<?php
	// Los filtros nos permitiran establecer los requisitos de la consulta
	$filter = ['CategoryID' => '1'];
	$filter = ['UnitPrice' => ['$gte' => '50']];
	$options = ['limit' => 4];
	// Ejemplo: Productos de la categoría ‘Beverages’ en un solo paso
	$mongo = new MongoDB\Client("mongodb://localhost:27017");
	$db = $mongo->northwind;
	$filter = ['CategoryID' => $db->categories->findOne(['CategoryName' => 'Beverages'])->CategoryID];
	$query = new MongoDB\Driver\Query($filter, $options);
	$productos = $man->executeQuery('northwind.products', $query);
	foreach ($productos as $producto) {
		echo "<pre>";
		print_r($producto);
		echo "</pre>";
	}
	?>
	<h1>Ejercicio 04: Filtrado de productos</h1>
	<?php
	include_once("./funciones_05_12_2022.php");
	$categorias = obtenerCategorias();
	$proveedores = obtenerProveedores();
	if (isset($_REQUEST['filtrar'])) {
		$categoria = $_REQUEST['categoria'];
		$proveedor = $_REQUEST['proveedor'];
		$catSeleccionada = $provSeleccionado = 0;
	}
	?>
	<form action="" method="post">
		<table>
			<tr>
				<th>Categoria</th>
				<th>Proveedor</th>
			</tr>
			<tr>
				<td>
					<select name="categoria" id="categoria">
						<option value="0">Todas</option>
						<?php
						foreach ($categorias as $categoria) {
							$opciones = "";
							if($catSeleccionada != 0){
								$opciones = " selected='' ";
							}
							echo "<option $opciones>$categoria</option>";
						}
						?>
					</select>
				</td>
				<td>
					<select name="proveedor" id="proveedor">
						<option value="0">Todas</option>
						<?php
						foreach ($proveedores as $proveedor) {
							echo "<option>$proveedor</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" value="Filtrar" name="filtrar"></td>
			</tr>
		</table>
	</form>
	<?php
		$productos = obtenerProductos($categoria, $proveedor);
		if (is_array($productos) && count($productos) > 0) {
			mostrarProductos($productos);
		} else {
			echo "<h2>No hay ningun producto que cumpla el filtro.</h2>";
		}

	?>
</body>

</html>