<?php
require_once '../clases/conexion.php';
$con = new Conexion();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	try {
		$sql = "SELECT * FROM alumnos WHERE 1";
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$sql .= " AND id_alumno='$id'";
		} elseif (isset($_GET['nombre']) || isset($_GET['apellidos']) || isset($_GET['curso'])) {
			if (isset($_GET['nombre'])) {
				$nombre = $_GET['nombre'];
				$sql .= " AND Nombre='$nombre'";
			}
			if (isset($_GET['apellidos'])) {
				$apellidos = $_GET['apellidos'];
				$sql .= " AND Apellidos='$apellidos'";
			}
			if (isset($_GET['curso'])) {
				$curso = $_GET['curso'];
				$sql .= " AND Curso='$curso'";
			}
		}
		// Cuando ya no tengo mas parametros a los que responder hago lo siguiente
		// Si me pasan parametros pero no los reconozco (id, curso) entonces que devuelva error
		// Porque si no seguiria la ejecucion
		elseif (count($_GET) > 0) {
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
	// Si todo ha ido bien, no ejecuto nada mas:
	exit;
}

// AGREGAR ALUMNO
// En Postman se hace mediante Body y form-data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (
		isset($_POST['nombre']) && isset($_POST['apellidos'])
		&& isset($_POST['fechanac']) && isset($_POST['ciudad'])
		&& isset($_POST['telefono']) && isset($_POST['curso'])
	) {
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$fechanac = $_POST['fechanac'];
		$ciudad = $_POST['ciudad'];
		$telefono = $_POST['telefono'];
		$curso = $_POST['curso'];
		$sql = "INSERT INTO alumnos (Nombre, Apellidos, FechaNac, Ciudad,
    Telefono, Curso) VALUES ('$nombre', '$apellidos', '$fechanac',
    '$ciudad', '$telefono', '$curso')";
		try {
			$con->query($sql);
			header("HTTP/1.1 201 Created");
			// NO se suele poner pero es para ver que es OK:
			echo json_encode($con->insert_id);
		} catch (mysqli_sql_exception $e) {
			header("HTTP/1.1 400 Bad Request");
		}
	} else {
		header("HTTP/1.1 400 Bad Request");
	}
	exit;
}

// MODIFICAR ALUMNO
// En Postman se hace mediante params.
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
	// HTML solo tiene GET y POST, por eso nos lo envian por PUT pero lo recibo por GET
	if (
		isset($_GET['id']) && isset($_GET['nombre'])
		&& isset($_GET['apellidos']) && isset($_GET['fechanac'])
		&& isset($_GET['ciudad']) && isset($_GET['telefono'])
		&& isset($_GET['curso'])
	) {
		$id = $_GET['id'];
		$nombre = $_GET['nombre'];
		$apellidos = $_GET['apellidos'];
		$fechanac = $_GET['fechanac'];
		$ciudad = $_GET['ciudad'];
		$telefono = $_GET['telefono'];
		$curso = $_GET['curso'];
		$sql = "UPDATE alumnos SET Nombre='$nombre', Apellidos='$apellidos',
    FechaNac='$fechanac', Ciudad='$ciudad', Telefono='$telefono',
    Curso='$curso' WHERE id_Alumno='$id'";
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

// ELIMINAR ALUMNO
// En Postman se hace mediante params.
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "DELETE FROM alumnos WHERE id_Alumno='$id'";
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


// Si no me llega GET ni POST mando mensaje de error:
header("HTTP/1.1 400 Bad Request");
