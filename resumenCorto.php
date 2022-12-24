<?php
// PHP permite alterar el CSS
// p {
// 	border-style: <?php echo "$estilo" >;
// border-color: <?php echo "$color" >;
// border-width: <?php echo "$tamaño" >px;
// }

echo "<p>---------------ARRAYS MULTISORT---------------</p>";
$money = array_column($totalArticulosUnico, "precio");
$name = array_column($totalArticulosUnico, "nombre");
array_multisort($name, SORT_ASC, SORT_NATURAL, $money, SORT_ASC, SORT_NATURAL, $bidimensionalAsociativo);

echo "<p>---------------DAR FORMATO---------------</p>";
$precioTamano = 8.95;
$precioTamanoFormat = sprintf("%05.2f€", $precioTamano);

echo "<p>---------------USOS CON STRINGS---------------</p>";
$precio = 123.786; // Si hacemos round() perdemos la variable, y si solo queremos mostrar formato
printf("Este es el precio: %07.2f y es de %s", $precio, $nombre); // %f float, %s string
printf("Este es el precio: %07.2f - %0-3.1f", $precio, $precio);
// %8f ancho total
// %4.2 4 digitos totales(incluido el punto) y 2 decimales 
// %07.2 rellena con 0 por la izquierda
// %0-7.2 rellena con 0 rellena por la derecha

// Reemplaza una a una en posicion de arrays
$phrase = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy = array("pizza", "beer", "ice cream");
$newphrase = str_replace($healthy, $yummy, $phrase);

echo "<p>---------------EXPRESIONES REGULARES---------------</p>";
$patron = "#^[abc]$#"; // Tiene que ser exactamente abc
$patron = "#(com)|(es)|(ecu)#"; // OR
$patron = '#php#b'; // La b delimita a una unica palabra: entre espacios en blanco
// Comprobar si existe el patron
if (preg_match($patron, $texto, $coincidencias, PREG_OFFSET_CAPTURE, 10)) {
	// Devuelve 1 si existe el patron y 0 si no existe
	// PREG_OFFSET_CAPTURE guarda la posicion de la coincidencia
	// 10 posicion a partir de la que guarda
	echo "Patron encontrado con " . count($coincidencias) . " coincidencias";
} else {
	echo "Patron NO encontrado";
}
// Sustituir patrones. Si patron y sustitucionPor son arrays, cambia cada elemento del primero por su misma posicion del segundo
$textoSustituido = preg_replace($patron, $sustitucionPor, $texto, 5, $cantidadSustituciones); // Hasta 5 cambios y almacena la cantidad de sustituciones
// Dividir cadenas mediante patron
$division = preg_split($patron, $texto);
$division = preg_split($patron, $texto, 5, $cantidadSustituciones); // Hasta 5 cambios y se guarda la cantidad de sustituciones

echo "<p>---------------COOKIES---------------</p>";
setcookie("usuario", "invitado", time() + 60);
// Acceder a una cookie. No existe la cookie la primera vez
if (!isset($_COOKIE['usuario'])) {
	setcookie("usuario", "invitado", time() + 60); // La creo
} else {
	$user = $_COOKIE['usuario']; // Recojo el valor cuando esta creaada
}
// Para ELIMINAR la cookie tenemos que restarle tiempo
setcookie("usuario", "invitado", time() - 1);

echo "<p>---------------SESIONES---------------</p>";
session_start();
if (!isset($_SESSION['usuarioSesion'])) {
	$_SESSION['usuarioSesion'] = "Sesion invitado";
} else {
	$usuarioSesion = $_SESSION['usuarioSesion'];
}
// Para cerrar una determinada sesion
unset($_SESSION['usuarioSesion']);
// Para cerrar todas las sesiones
session_destroy();

echo "<p>---------------BASES DE DATOS---------------</p>";
mysqli_affected_rows($con);
// Obtener datos para un SELECT-OPTION en HTML
function obtenerEquipos()
{
	$equipos = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaEquipos = "SELECT DISTINCT Nombre FROM equipos ORDER BY Nombre DESC;";
		$equiposNBA = mysqli_query($conection, $consultaEquipos);
		mysqli_close($conection);
		if (mysqli_num_rows($equiposNBA) > 0) {
			$equipos = array();
			while ($equipo = mysqli_fetch_assoc($equiposNBA)) {
				$equipos[] = $equipo[0];
				// Por si hay algun dato en DB que sea feo para mostrar:
				if (str_starts_with($equipo[0], "9")) {
					// Dato: 99 --> Guarda: temporadas['99'] = 1999
					$tempMostrar = "19" . $equipo[0];
					$temporadas[$equipo[0]] = $tempMostrar;
				}
			}
		}
	} catch (mysqli_sql_exception $e) {
		// echo $e->getMessage();
	}
	return $equipos;
}

function obtenerTablas($bd, $nombreTabla)
{
	$nombreTablas = false;
	try {
		$conection = new mysqli(HOST, $bd, $bd, $bd);
		// Obtener tablas de una DB
		$consultaSQL = "SHOW TABLES FROM $bd;";
		// Obtener columnas de una tabla
		$consultaSQL = "SHOW COLUMNS FROM $bd.$nombreTabla;";
		$tablas = mysqli_query($conection, $consultaSQL);
		mysqli_close($conection);
		if (mysqli_num_rows($tablas) > 0) {
			$nombreTablas = array();
			while ($tabla = mysqli_fetch_row($tablas)) {
				// while ($tabla = mysqli_fetch_assoc($tablas)) {
				// 	$nombreTablas[] = $tabla['tabla'];
				$nombreTablas[] = $tabla[0];
			}
		}
	} catch (mysqli_sql_exception $e) {
		// echo $e->getMessage();
	}
	return $nombreTablas;
}

function obtenerDatos($nombreTabla)
{
	$datos = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$ConsultaSQL = "SELECT * FROM $nombreTabla";
		$datosSQL = mysqli_query($conection, $ConsultaSQL);
		mysqli_close($conection);
		if (mysqli_num_rows($datosSQL) > 0) {
			$datos = array();
			while ($articulo = mysqli_fetch_assoc($datosSQL)) {
				// while ($articulo = mysqli_fetch_row($datosSQL)) {
				$datos[] = $articulo;
			}
		}
	} catch (mysqli_sql_exception $e) {
		// echo $e->getMessage();
	}
	return $datos;
}

function agregarDatos($baseDatos, $nombreTabla, $arrayDatos)
{
	$agregado = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, $baseDatos);
		$nombreTablas = "";
		$valorTablas = "";
		foreach ($arrayDatos as $key => $value) {
			$nombreTablas = $nombreTablas . "$key, ";
			if (is_int($value) | is_float($value)) {
				$valorTablas = $valorTablas . "$value, ";
			} else {
				$valorTablas = $valorTablas . "'$value', ";
			}
		}
		$nombreTablas = trim($nombreTablas, ', ');
		$valorTablas = trim($valorTablas, ', ');
		$consultaSQL = "INSERT INTO $baseDatos.$nombreTabla (" . $nombreTablas . ") VALUES (" . $valorTablas . ")";
		$result = $conection->query($consultaSQL);
		mysqli_close($conection);
		if ($result) {
			$agregado = true;
		}
	} catch (mysqli_sql_exception $e) {
		// echo $e->getMessage();
		$agregado = "No se han podido agregar los datos. Error: " . $e->getMessage();
	}
	return $agregado;
}

function agregarDatosSencillo($nombreTabla)
{
	$agregado = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaSQL = "INSERT INTO $nombreTabla('nombre','apellido','edad') VALUES ('Nelson','Blanco',32);";
		$result = $conection->query($consultaSQL);
		mysqli_close($conection);
	} catch (mysqli_sql_exception $e) {
		// echo $e->getMessage();
	}
	return $agregado;
}

function agregarCSV($nombreTabla)
{
	$agregado = false;
	try {
		$conection = new mysqli(HOST, USER, PASS, BD);
		$consultaSQL = "
            LOAD DATA LOCAL INFILE 'datos.csv'
            INTO TABLE $nombreTabla 
            FIELDS TERMINATED BY ','
            OPTIONALLY ENCLOSED BY '\"'
            LINES TERMINATED BY ';\\n'
            IGNORE 1 LINES
            (nombre,apellidos,numeroCalle,localidad)
        ";
		$result = $conection->query($consultaSQL);
		$conection->close();
		if ($result) {
			$agregado = true;
		}
	} catch (Exception $e) {
		// echo $e->getMessage();
	}
	return $agregado;
}

function eliminarDatos($idArticulo)
{
	$eliminado = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaSQL = "DELETE FROM articulos WHERE idArticulo=$idArticulo";
		$result = $conection->query($consultaSQL);
		if ($result) {
			$eliminado = true;
		}
		mysqli_close($conection);
	} catch (mysqli_sql_exception $e) {
	}
	return $eliminado;
}

function modificarDatos($nombreTabla, $idModificar, $campoModificar, $valorModificar)
{
	$modificado = false;
	try {
		$conection = new mysqli(HOST, USER, PASS, BD);
		$consultaSQL = "UPDATE $nombreTabla SET $campoModificar = '$valorModificar' WHERE id_articulo = $idModificar";
		$consultaSQL = "UPDATE $nombreTabla SET $campoModificar = $valorModificar WHERE id_articulo = $idModificar";
		$result = $conection->query($consultaSQL);
		$conection->close();
		if ($result) {
			$modificado = true;
		}
	} catch (mysqli_sql_exception $e) {
	}
	return $modificado;
}

function instruccionesPredefinidas($alumnos)
{
	try {
		$conection = new mysqli(HOST, USER, PASS, BD);
		// Cuando no queremos insertar mas de un campo, usamos los interrogantes ?, y el nombre del campo
		$consultaSQL = "INSERT INTO alumnos (nombre, apellidos, localidad, numeroCalle) VALUES (?,?,?,?)";
		// Creamos un cursor para cuando los reciba la BD los añada
		$stmt = $conection->prepare($consultaSQL);
		// Enlazo los ? con mis datos: String, Int, Float
		// $stmt->bind_param("sssi", "Manuel", "Lopez Perez", "Valencia", 34); // 3 Strings y un Int
		// $stmt->execute();
		// Ahora para el array
		$numeroCambios = 0;
		foreach ($alumnos as $alumno) {
			$stmt->bind_param("sssi", $alumno['nombre'], $alumno['apellidos'], $alumno['localidad'], $alumno['numeroCalle']);
			$stmt->execute();
			$numeroCambios += $conection->affected_rows;
		}
		$stmt->close();
		echo "<p>Numero de cambios: $numeroCambios</p>";
		$conection->close();
	} catch (Exception $e) {
		echo "<p>ERROR: {$e->getMessage()}</p>";
	}
}

echo "<p>---------------TRANSACCIONES---------------</p>";
function transaccion()
{
	try {
		$conection = new mysqli(HOST, "admin", "admin", BD);
		mysqli_autocommit($conection, false);
		mysqli_begin_transaction($conection); // Empieza la transaccion
		$consultaSQL = "DELETE FROM articulos WHERE idArticulo=1";
		$eliminar = $conection->query($consultaSQL);
		$consultaSQL = "INSERT INTO tabla VALUES ('Nelson','Blanco',32);";
		$ingresar = $conection->query($consultaSQL);
		if ($eliminar && $ingresar) {
			mysqli_commit($conection);
		} else {
			mysqli_rollback($conection);
		}
		mysqli_close($conection);
	} catch (Exception $e) {
		// echo $e->getMessage();
		mysqli_rollback($conection);
		mysqli_close($conection);
	}
}


echo "<p>---------------VARIOS---------------</p>";
$varios = "&lt;&lt;DNI&gt;&gt;"; // <<DNI>>





//