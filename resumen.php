<?php
// PHP permite alterar el CSS
// p {
// 	border-style: <?php echo "$estilo" >;
// border-color: <?php echo "$color" >;
// border-width: <?php echo "$tamaño" >px;
// }

echo "<p>---------------ORDENAR ARRAYS---------------</p>";
$articulos = array("Villabalter" => "0-1", "Azadinos" => "1-0", "Ferral" => "-");
sort($arrayOrdenado); // Ordenar array no asociativo
rsort($arrayOrdenado); // Ordenar array no asociativo en orden inverso
ksort($articulos); // Ordena un array por clave
krsort($articulos); // Ordena un array por clave en orden inverso
asort($articulos); // Ordena un array por valor
arsort($articulos); // Ordena un array por valor en orden inverso

// Ordenar arrays con funcion
$bidimensional = array(
	array("camisa", "L", 29.95),
	array("pantalon", "XL", 79.95),
	array("calcetines", "", 9.95),
	array("calcetines", "S", 5.95),
	array("jersey", "M", 25.95)
);
function compara($x, $y)
{
	if ($x[0] == $y[0])
		if ($x[2] == $y[2])
			return 0;
		elseif ($x[2] < $y[2])
			return -1;
		else
			return 1;
	elseif ($x[0] < $y[0])
		return -1;
	else
		return 1;
};
usort($bidimensional, 'compara');
// Ordenar arrays asociativos con funcion
$bidimensionalAsociativo = array(
	array("nombre" => "camisa", "talla" => "L", "precio" => 29.95),
	array("nombre" => "pantalon", "talla" => "XL", "precio" => 79.95),
	array("nombre" => "calcetines", "talla" => "", "precio" => 9.95),
	array("nombre" => "calcetines", "talla" => "S", "precio" =>  5.95),
	array("nombre" => "jersey", "talla" => "M", "precio" => 25.95)
);
function comparaAsociativo($x, $y)
{
	if ($x["nombre"] == $y["nombre"])
		if ($x["precio"] == $y["precio"])
			return 0;
		elseif ($x["precio"] < $y["precio"])
			return -1;
		else
			return 1;
	elseif ($x["nombre"] < $y["nombre"])
		return -1;
	else
		return 1;
};
usort($bidimensionalAsociativo, 'comparaAsociativo');
echo "<p>---------------ARRAYS MULTISORT---------------</p>";
$money = array_column($totalArticulosUnico, "precio");
$name = array_column($totalArticulosUnico, "nombre");
array_multisort($name, SORT_ASC, SORT_NATURAL, $money, SORT_ASC, SORT_NATURAL, $bidimensionalAsociativo);

echo "<p>---------------ARRAY WALK---------------</p>";
$numeroMitad = array(2, 4, 6, 7, 8);
function mitadConParametros(&$numero, $key, $param)
{
	echo "<script>console.log('$key: $numero  --  $param');</script>";
	$numero = $numero * 2;
}
array_walk($numeroMitad, "mitadConParametros", "PARAMETRO");

echo "<p>---------------DAR FORMATO---------------</p>";
$precioTamano = 8.95;
$precioTamanoFormat = sprintf("%05.2f€", $precioTamano);

echo "<p>---------------USOS CON STRINGS---------------</p>";
$nombre = " Nelson ";
$nombre = trim($nombre); // Elimina espacios en inicio y final
$nombre = trim($nombre, "n"); // Solo elimina los exteriores, no si hay interiores
$precio = 123.786; // Si hacemos round() perdemos la variable, y si solo queremos mostrar formato
printf("Este es el precio: %07.2f y es de %s", $precio, $nombre); // %f float, %s string
printf("Este es el precio: %07.2f - %0-3.1f", $precio, $precio);
// %8f ancho total
// %4.2 4 digitos totales(incluido el punto) y 2 decimales 
// %07.2 rellena con 0 por la izquierda
// %0-7.2 rellena con 0 rellena por la derecha
$nombre = strtoupper($nombre); //La cadena en mayusculas
$nombre = strtolower($nombre); //La cadena en minusculas
$nombre = ucfirst($nombre); //El primer caracter en mayusculas
$nombre = ucwords($nombre); //El primer caracter en mayusculas de cada palabra
$palabras = explode(" ", $textoLargo, 10); // Crea un array donde cada palabra ocupa una posicion del array
// El " " es el separador entre palabras, si ponemos "s" dividiria entre s
$palabras = implode(" ", $palabras); // De un array nos da un string
$subcadena = substr($textoLargo, 5, 10); // Desde posicion 5 con una longitud de 10 caracteres
$subcadena = substr($textoLargo, -5, 10); // Desde posicion 5 contado por detras
$subcadena = substr($textoLargo, 5, -10); // Desde posicion 5 MENOS los 10 ultimos
$longitudCadena = strlen($textoLargo);
// Comparar cadenas
$texto1 = "HoLa";
$texto2 = "hOla";
strcasecmp($texto1, $texto1); // No distingue entre minusculas y mayusculas. => true
// Devuelve 0 si son iguales, 1 si es menor texto1 y 2 si es mayor texto1
strnatcasecmp($texto1, $texto1); // Distingue entre minusculas y mayusculas y compara cadenas naturales. => el 2 es menor que el 12
$buscaString = strstr($textoLargo, "prueba"); // Devuelve lo que queda de la cadena tras esa palabra
$buscaStringAntes = strstr($textoLargo, "prueba", true); // Devuelve lo que queda de la cadena antes de esa palabra
$posicion = strpos($textoLargo, "prueba");
$posicion = strpos($textoLargo, "prueba", 24); // A partir de la posicion 24 busca la palabra.
$cadenaModificada = str_replace("prueba", "PROOF", $textoLargo, $numeroCambios); // Reemplaza todas
$phrase = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy = array("pizza", "beer", "ice cream");
$newphrase = str_replace($healthy, $yummy, $phrase); // Reemplaza una a una en posicion de arrays

echo "<p>---------------EXPRESIONES REGULARES---------------</p>";
$expresion = "#[0-9]{7,8}.[A-Z]#"; // El punto es un caracter cualquiera
$patron = "#[^aeiouX]#"; // NO vocales ni X mayuscula
$patron = "#[0-9]*#"; // Puede haber 0 o mas numeros
$patron = "#[0-9]+#"; // Almenos 1 numero
$patron = "#^[abc]$#"; // Tiene que ser exactamente abc
$patron = "#(com)|(es)|(ecu)#"; // OR
$patron = '#php#i'; // La i indica que no diferencia entre mayusculas y minusculas
$patron = '#php#p'; // La p delimita la palabra: espacio delante y espacio detras
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

echo "<p>---------------MANIPULACION DE ARRAYS---------------</p>";
$valores = array("num1" => 1, "num2" => 2, "num3" => 3);
$valores2 = array("num2" => 2, "num3" => 3, "num1" => 1);
if ($valores == $valores2) {
	echo "Iguales";
}
$cantidad = count($valores2);
if (in_array(2, $valores)) {
	echo "<p>SI esta en el array</p>";
}
$rangeArray = range(1, 100, 5); //Array automatico de 1 a 100 de 5 en 5
shuffle($arrayOrdenado); // Desordenar array

echo "<p>---------------COOKIES---------------</p>";
// NOMBRE, VALOR, CADUCIDAD(=0 si se mantiene si esta el navegador abierto) hora actual mas segundos activa
setcookie("usuario", "invitado", time() + 60);
// Acceder a una cookie. No existe la cookie la primera vez
if (!isset($_COOKIE['usuario'])) {
	setcookie("usuario", "invitado", time() + 60); // La creo
	header("Location: mantenerEstado_02_11_2022.php"); // Recargo la pagina
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
session_destroy(); // Se cierra la sesion pero se mantienen las variables hasta que se cierra el navegador

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
		if ($result) {
			$agregado = true;
		}
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
		// echo $e->getMessage();
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
		// echo $e->getMessage();
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
		// echo $e->getMessage();
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