<?php
require_once('./php/funciones.php');
$productos = obtenerProductos();
$gamas = obtenerGamaProductos();
?>
<?php
if (isset($_POST['guardarProducto'])) {
	$codigoProducto = $_POST['codigoProducto'];
	$nombre = $_POST['nombre'];
	$gama = $_POST['gama'];
	$dimensiones = $_POST['dimensiones'];
	$proveedor = $_POST['proveedor'];
	$descripcion = $_POST['descripcion'];
	$cantidadEnStock = $_POST['cantidadEnStock'];
	$precioVenta = $_POST['precioVenta'];
	$precioProveedor = $_POST['precioProveedor'];

	$guardado = guardarProducto();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<title>Productos</title>
</head>

<body>
	<?php
	if (isset($_POST['guardarProducto']) && $guardado) {
	?>
		<div class='alert alert-success' role='alert'>
			Producto guardado!
		</div>
	<?php
	} elseif (isset($_POST['guardarProducto']) && !$guardado) {
	?>
		<div class="alert alert-danger" role="alert">
			No se ha podido guardar
		</div>
	<?php
	}
	?>
	<div class="container">
		<form action="#" method="post">
			<div class="mb-3">
				<label for="codigoProducto" class="form-label">Codigo Producto</label>
				<input type="text" class="form-control" name="codigoProducto" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="nombre" class="form-label">Nombre</label>
				<input type="text" class="form-control" name="nombre" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="gama" class="form-label">Gama</label>
				<select class="form-select" aria-label="Default select example" name="gama">
					<?php
					foreach ($gamas as $gama) {
						echo "<option>$gama</option>";
					}
					?>
				</select>
			</div>
			<div class="mb-3">
				<label for="dimensiones" class="form-label">Dimensiones</label>
				<input type="text" class="form-control" name="dimensiones" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="proveedor" class="form-label">proveedor</label>
				<input type="text" class="form-control" name="proveedor" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="descripcion" class="form-label">descripcion</label>
				<input type="text" class="form-control" name="descripcion" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="cantidadEnStock" class="form-label">cantidadEnStock</label>
				<input type="text" class="form-control" name="cantidadEnStock" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="precioVenta" class="form-label">precioVenta</label>
				<input type="text" class="form-control" name="precioVenta" aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<label for="precioProveedor" class="form-label">precioProveedor</label>
				<input type="text" class="form-control" name="precioProveedor" aria-describedby="emailHelp">
			</div>



			<hr>
			<button type="submit" class="btn btn-primary" name="guardarProducto">Guardar Producto</button>
		</form>
	</div>
</body>

</html>