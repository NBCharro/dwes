<?php
require_once '../conexion.php';
$con = new Conexion();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	try {
		$sql = "SELECT * FROM clientes WHERE 1";
		if (isset($_GET['codigoCliente'])) {
			$codigoCliente = $_GET['codigoCliente'];
			$sql .= " AND CodigoCliente='$codigoCliente'";
		} elseif (isset($_GET['nombreContacto']) || isset($_GET['apellidoContacto'])) {
			if (isset($_GET['nombreContacto'])) {
				$nombreContacto = $_GET['nombreContacto'];
				$sql .= " AND NombreContacto='$nombreContacto'";
			}
			if (isset($_GET['apellidoContacto'])) {
				$apellidoContacto = $_GET['apellidoContacto'];
				$sql .= " AND ApellidoContacto='$apellidoContacto'";
			}
		} elseif (count($_GET) > 0) {
			header("HTTP/1.1 404 Bad Request");
			exit;
		}

		$result = $con->query($sql);
		$alumnos = $result->fetch_all(MYSQLI_ASSOC);
		header("HTTP/1.1 200 OK");
		echo json_encode($alumnos);
	} catch (mysqli_sql_exception $e) {
		header("HTTP/1.1 404 Not Found");
	}
	exit;
}




















header("HTTP/1.1 400 Bad Request");
