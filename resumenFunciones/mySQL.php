<?php
function obtenerDatosTabla()
{
	$datos = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultadatos = "SELECT * FROM tabla";
		$datosSQL = mysqli_query($conection, $consultadatos);
		mysqli_close($conection);
		if (mysqli_num_rows($datosSQL) > 0) {
			$datos = array();
			// while ($datosArray = mysqli_fetch_row($datosSQL)) {
			// 	$datos[] = $datosArray;
			// }
			while ($datosArrayAsociativo = mysqli_fetch_assoc($datosSQL)) {
				$datos[] = $datosArrayAsociativo;
			}
		}
	} catch (mysqli_sql_exception $e) {
		// echo $e->getMessage();
	}
	return $datos;
}

function agregarDatos()
{
	$agregado = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaSQL = "INSERT INTO tabla('nombre','apellido','edad') VALUES ('Bob','Marley',32);";
		$resultado = $conection->query($consultaSQL);
		mysqli_close($conection);
		if ($resultado) {
			$agregado = true;
		}
	} catch (mysqli_sql_exception $e) {
		// echo $e->getMessage();
	}
	return $agregado;
}

function eliminarDatos($idTabla)
{
	$eliminado = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaSQL = "DELETE FROM tabla WHERE id=$idTabla";
		$resultado = $conection->query($consultaSQL);
		mysqli_close($conection);
		if ($resultado) {
			$eliminado = true;
		}
	} catch (mysqli_sql_exception $e) {
	}
	return $eliminado;
}

function modificarDatos($idTabla, $valor1)
{
	$modificado = false;
	try {
		$conection = new mysqli(HOST, USER, PASS, BD);
		$consultaSQL = "UPDATE tabla SET campo1 = '$valor1' WHERE idTabla = $idTabla";
		$resultado = $conection->query($consultaSQL);
		$conection->close();
		if ($resultado) {
			$modificado = true;
		}
	} catch (mysqli_sql_exception $e) {
	}
	return $modificado;
}
