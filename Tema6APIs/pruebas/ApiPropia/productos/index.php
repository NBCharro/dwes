<?php
require_once '../conexion.php';
$con = new Conexion();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	try {
		$sql = "SELECT * FROM productos WHERE 1";
		$result = $con->query($sql);
		$alumnos = $result->fetch_all(MYSQLI_ASSOC);
		header("HTTP/1.1 200 OK");
		echo json_encode($alumnos);
	} catch (mysqli_sql_exception $e) {
		header("HTTP/1.1 404 Not Found");
	}
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (
		isset($_POST['codigoProducto']) && isset($_POST['nombre']) && isset($_POST['gama'])
		&& isset($_POST['dimensiones']) && isset($_POST['proveedor'])
		&& isset($_POST['descripcion']) && isset($_POST['cantidadEnStock'])
		&& isset($_POST['precioVenta']) && isset($_POST['precioProveedor'])
	) {
		$codigoProducto = $_POST['codigoProducto'];
		$nombre = $_POST['nombre'];
		$gama = $_POST['gama'];
		$dimensiones = $_POST['dimensiones'];
		$proveedor = $_POST['proveedor'];
		$descripcion = $_POST['descripcion'];
		$cantidadEnStock = $_POST['cantidadEnStock'];
		$precioVenta = $_POST['precioVenta'];
		$precioProveedor = $_POST['precioProveedor'];

		$sql = "INSERT INTO `productos`(`CodigoProducto`, `Nombre`, `Gama`, `Dimensiones`, `Proveedor`, `Descripcion`, `CantidadEnStock`, `PrecioVenta`, `PrecioProveedor`) 
				VALUES ('codigoProducto','$nombre','$gama','$dimensiones','$proveedor','$descripcion','$cantidadEnStock','$precioVenta','$precioProveedor')";

		try {
			$con->query($sql);
			header("HTTP/1.1 201 Created");
			echo json_encode($con->insert_id);
		} catch (mysqli_sql_exception $e) {
			header("HTTP/1.1 400 Bad Request");
		}
	} else {
		header("HTTP/1.1 400 Bad Request");
	}
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
	if (
		isset($_POST['codigoProducto']) && isset($_POST['nombre']) && isset($_POST['gama'])
		&& isset($_POST['dimensiones']) && isset($_POST['proveedor'])
		&& isset($_POST['descripcion']) && isset($_POST['cantidadEnStock'])
		&& isset($_POST['precioVenta']) && isset($_POST['precioProveedor'])
	) {
		$codigoProducto = $_POST['codigoProducto'];
		$nombre = $_POST['nombre'];
		$gama = $_POST['gama'];
		$dimensiones = $_POST['dimensiones'];
		$proveedor = $_POST['proveedor'];
		$descripcion = $_POST['descripcion'];
		$cantidadEnStock = $_POST['cantidadEnStock'];
		$precioVenta = $_POST['precioVenta'];
		$precioProveedor = $_POST['precioProveedor'];

		$sql = "UPDATE `productos` SET 
				`Nombre`='$nombre',
				`Gama`='$gama',
				`Dimensiones`='$dimensiones',
				`Proveedor`='$proveedor',`
				Descripcion`='$descripcion',
				`CantidadEnStock`='$cantidadEnStock',
				`PrecioVenta`='$precioVenta',
				`PrecioProveedor`='$precioProveedor' 
				WHERE `CodigoProducto`='$codigoProducto'";

		try {
			$con->query($sql);
			header("HTTP/1.1 200 OK");
			echo json_encode($id);
		} catch (mysqli_sql_exception $e) {
			header("HTTP/1.1 400 Bad Request");
		}
	} else {
		header("HTTP/1.1 400 Bad Request");
	}
	exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
	if (isset($_GET['codigoProducto'])) {
		$codigoProducto = $_GET['codigoProducto'];
		$sql = "DELETE FROM `productos` WHERE `CodigoProducto`='$codigoProducto'";
		try {
			$con->query($sql);
			header("HTTP/1.1 200 OK");
			echo json_encode($id);
		} catch (mysqli_sql_exception $e) {
			header("HTTP/1.1 400 Bad Request");
		}
	} else {
		header("HTTP/1.1 400 Bad Request");
	}
	exit;
}


header("HTTP/1.1 400 Bad Request");
