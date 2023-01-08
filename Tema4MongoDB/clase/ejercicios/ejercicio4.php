<?php
require_once("./funcionesej4.php");
$productos = obtenerProductos();
$categorias = obtenerCategorias();
$proveedores = obtenerProveedores();
$id = obtenerUltimoIDProductos();
if (isset($_REQUEST['guardar'])) {
	$nuevoProducto = [
		"ProductName" => $_REQUEST['nombre'],
		"SupplierID" => $_REQUEST['proveedor'],
		"CategoryID" => $_REQUEST['categoria'],
		"UnitPrice" => $_REQUEST['precio'],
		"UnitsInStock" => $_REQUEST['stock'],
	];
	$guardado = guardarProduco($nuevoProducto);
	if ($guardado) {
		header("Location: ./ejercicio4.php?agregado=true");
	} else {
		header("Location: ./ejercicio4.php?agregado=false");
	}
}
if (isset($_REQUEST['borrar'])) {
	$eliminados = eliminarProductos($_REQUEST['productosID']);
	if ($eliminados) {
		header("Location: ./ejercicio4.php?eliminados=true");
	} else {
		header("Location: ./ejercicio4.php?eliminados=false");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 4</title>
	<style>
		table,
		td,
		th {
			border: 1px solid black;
		}

		table {
			border-collapse: collapse;
			width: 90%;
			margin: auto;
		}

		.correcto {
			background-color: greenyellow;
			font-size: 1.2rem;
			text-align: center;
		}

		.error {
			background-color: red;
			font-size: 1.2rem;
			text-align: center;
		}
	</style>
</head>

<body>
	<?php
	if (isset($_REQUEST['agregado'])) {
		if ($_REQUEST['agregado'] == "true") {
			echo "<p class='correcto'>El producto se ha agregado correctamente.</p>";
		} else {
			echo "<p class='error'>No se ha podido agregar el producto.</p>";
		}
	}
	if (isset($_REQUEST['eliminados'])) {
		if ($_REQUEST['eliminados'] == "true") {
			echo "<p class='correcto'>Los productos se han eliminado correctamente.</p>";
		} else {
			echo "<p class='error'>No se han podido eliminar los productos seleccionados.</p>";
		}
	}
	?>
	<h2>Nuevo producto</h2>
	<form action="" method="post">
		<label for="nombre">Nombre del producto</label>
		<input type="text" name="nombre" id="nombre"><br>
		<label for="proveedor">Proveedor</label>
		<select name="proveedor" id="proveedor">
			<?php
			foreach ($proveedores as $key => $value) {
				echo "<option value='$key'>$value</option>";
			}
			?>
		</select><br>
		<label for="categoria">Categoria</label>
		<select name="categoria" id="categoria">
			<?php
			foreach ($categorias as $key => $value) {
				echo "<option value='$key'>$value</option>";
			}
			?>
		</select><br>
		<label for="precio">Precio</label>
		<input type="number" name="precio" id="precio"><br>
		<label for="stock">Unidades en stock</label>
		<input type="number" name="stock" id="stock"><br>
		<input type="submit" value="Guardar" name="guardar">
	</form>
	<h2>Productos</h2>
	<form action="" method="post">
		<table>
			<tr>
				<th>ID del Producto</th>
				<th>Nombre</th>
				<th>Proveedor</th>
				<th>Categoria</th>
				<th>Precio</th>
				<th>Unidades en stock</th>
				<th>Borrar</th>
			</tr>
			<?php
			foreach ($productos as $value) {
				echo "<tr>";
				echo "<th>{$value['ProductID']}</th>";
				echo "<td>{$value['ProductName']}</td>";
				echo "<td>{$value['SupplierID']}</td>";
				echo "<td>{$value['CategoryID']}</td>";
				echo "<td>{$value['UnitPrice']} €</td>";
				echo "<td>{$value['UnitsInStock']}</td>";
				echo "<td><input type='checkbox' name='productosID[]' value='{$value['ProductID']}'></td>";
				echo "</tr>";
			}
			?>
		</table>
		<input type="submit" value="Borrar" name="borrar">
	</form>
</body>

</html>