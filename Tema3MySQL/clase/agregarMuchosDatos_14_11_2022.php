<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dia 14_11_2022</title>
</head>

<body>
	<?php
	// Insertar muchos registros en BD
	$alumnos = array(
		array(
			"nombre" => "Juan",
			"apellidos" => "Lopez Perez",
			"numeroCalle" => 3,
			"localidad" => "Leon"
		),
		array(
			"nombre" => "Emma",
			"apellidos" => "Santiago Josecho",
			"numeroCalle" => 6,
			"localidad" => "San Andres"
		),
		array(
			"nombre" => "Cristina",
			"apellidos" => "Llamazares Andorra",
			"numeroCalle" => 12,
			"localidad" => "Villabalter"
		)
	);
	// Constantes
	define("HOST", "localhost");
	define("USER", "admin");
	define("PASS", "admin");
	define("BD", "escuela");
	// Consulta
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
	?>
	<?php
	// Añadir datos mediante archivo CSV.
	// Hay que poner el archivo en: C:\xampp\mysql\data\escuela\datos.csv
	try {
		$conection = new mysqli(HOST, "root", "", BD); // El usuario necesita acceso a la carpeta
		// $consultaSQL = "LOAD DATA INFILE 'datos.csv' INTO TABLE alumnos"; // Metodo corto
		$consultaSQL = "
            LOAD DATA INFILE 'datos.csv'
            INTO TABLE alumnos 
            FIELDS TERMINATED BY ','
            OPTIONALLY ENCLOSED BY '\"'
            LINES TERMINATED BY '\\n'
            IGNORE 1 LINES
            (nombre,apellidos,numeroCalle,localidad)
        ";
		if ($conection->query($consultaSQL)) {
			echo "<h2>Alumnos agregados: {$conection->affected_rows}</h2>";
		} else {
			echo "<h2>No se han podido agregar los datos.</h2>";
		}
		$conection->close();
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	?>
</body>

</html>