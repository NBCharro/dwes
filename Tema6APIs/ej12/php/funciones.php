<?php
define('HOST', 'localhost');
define('USER', 'inmuebles');
define('PASSWORD', 'inmuebles');
define('BD', 'inmuebles');

// 19, Calle las Campanas, San Andrés del Rabanedo

if (isset($_REQUEST['guardarVivienda'])) {
	$tipo = $_REQUEST['tipo'];
	$tipoDeVia = $_REQUEST['tipoDeVia'];
	$nombreVia = $_REQUEST['nombreVia'];
	$numeroVia = $_REQUEST['numeroVia'];
	$localidad = $_REQUEST['localidad'];
	$vivienda = $_REQUEST['vivienda'];
	$descripcion = $_REQUEST['descripcion'];
	// Obtener latitud y longitud
	$direccionBusquedaAPI = "$numeroVia,$tipoDeVia+$nombreVia,$localidad";
	$direccionBusquedaAPI = str_replace(" ", "+", $direccionBusquedaAPI);
	$url = "https://nominatim.openstreetmap.org/search.php?q={$direccionBusquedaAPI}&format=json&limit=1";
	$opts = array('http' => array('header' => array("Referer: $url\r\n")));
	$context = stream_context_create($opts);
	$file = file_get_contents($url, false, $context);
	$dirArray = json_decode($file, true);
	$latitud = $dirArray[0]['lat'];
	$lontigud = $dirArray[0]['lon'];
	// Guardar datos
	$direccionBD = "$tipoDeVia $nombreVia, $numeroVia";
	$viviendaNueva = [
		'tipo' => $tipo,
		'direccion' => $direccionBD,
		'latitud' => $latitud,
		'longitud' => $lontigud,
		'localidad' => $localidad,
		'descripcion' => $descripcion,
		'vivienda' => $vivienda,
	];
	$agregado = agregarDatos($viviendaNueva);
	if ($agregado) {
		header('Location: ../agregar.php?codigo=exito');
	} else {
		header('Location: ../agregar.php?codigo=error');
	}
}

function agregarDatos($viviendaNueva)
{
	$agregado = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$tipo = $viviendaNueva['tipo'];
		$direccion = $viviendaNueva['direccion'];
		$latitud = $viviendaNueva['latitud'];
		$longitud = $viviendaNueva['longitud'];
		$localidad = $viviendaNueva['localidad'];
		$descripcion = $viviendaNueva['descripcion'];
		$vivienda = $viviendaNueva['vivienda'];
		$consultaSQL = "INSERT INTO `viviendas`(`tipo`, `direccion`, `localidad`, `lat`, `lon`, `descripcion`, `vivienda`)
		VALUES('$tipo','$direccion','$localidad','$latitud','$longitud','$descripcion','$vivienda')";
		$result = $conection->query($consultaSQL);
		echo '<pre>';
		print_r($result);
		echo '</pre>';
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

function obtenerViviendas($tipo, $localidad)
{
	$viviendas = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaViviendas = "SELECT * FROM `viviendas` WHERE 1";
		if ($tipo != "Todas") {
			$consultaViviendas .= " AND `tipo` = '$tipo'";
		}
		if ($localidad != "Todas") {
			$consultaViviendas .= " AND `localidad` = '$localidad'";
		}
		$viviendasDatos = mysqli_query($conection, $consultaViviendas);
		mysqli_close($conection);
		if (mysqli_num_rows($viviendasDatos) > 0) {
			$viviendas = array();
			while ($vivienda = mysqli_fetch_assoc($viviendasDatos)) {
				$viviendas[] = $vivienda;
			}
		}
	} catch (mysqli_sql_exception $e) {
	}
	return $viviendas;
}

function obtenerLocalidades()
{
	$localidades = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaLocalidades = "SELECT DISTINCT `localidad` FROM `viviendas` WHERE 1";
		$localidadesDatos = mysqli_query($conection, $consultaLocalidades);
		mysqli_close($conection);
		if (mysqli_num_rows($localidadesDatos) > 0) {
			$localidades = array();
			while ($vivienda = mysqli_fetch_assoc($localidadesDatos)) {
				$localidades[] = $vivienda['localidad'];
			}
		}
	} catch (mysqli_sql_exception $e) {
	}
	return $localidades;
}

function obtenerLatitudCentroMapa($viviendas)
{
	$latitudMayor = $viviendas[0]['lat'];
	$latitudMenor = $viviendas[0]['lat'];
	foreach ($viviendas as $vivienda) {
		if ($vivienda['lat'] > $latitudMayor) {
			$latitudMayor = $vivienda['lat'];
		}
		if ($vivienda['lat'] < $latitudMenor) {
			$latitudMenor = $vivienda['lat'];
		}
	}
	$mitadLatitud = ($latitudMayor + $latitudMenor) / 2;
	return $mitadLatitud;
}

function obtenerLongitudCentroMapa($viviendas)
{
	$longitudMayor = $viviendas[0]['lon'];
	$longitudMenor = $viviendas[0]['lon'];
	foreach ($viviendas as $vivienda) {
		if ($vivienda['lon'] > $longitudMayor) {
			$longitudMayor = $vivienda['lon'];
		}
		if ($vivienda['lon'] < $longitudMenor) {
			$longitudMenor = $vivienda['lon'];
		}
	}
	$mitadLongitud = ($longitudMayor + $longitudMenor) / 2;
	return $mitadLongitud;
}




// INSERT INTO `viviendas` (`id`, `tipo`, `direccion`, `localidad`,`lat`,`lon`, `vivienda`, `descripcion`) VALUES
// (1, 'venta', 'Calle Leopoldo Panero, 6', 'León','42.59381','-5.5632198', 'piso', 'vivienda libre, de 85 m2 útiles 95 construidos, tres dormitorios el principal con empotrados y baño incorporado, baño salón y cocina amueblada.'),
// (2, 'alquiler', 'Avenida Doctor Fleming, 24', 'León','42.597865049999996','-5.5856809484869965', 'piso', 'Apartamento céntrico. Calefacción gasoil. Gastos de comunidad incluidos. Exterior. Soleado. Terraza. '),
// (3, 'venta', 'Calle González de Lama, 2', 'León', '42.6021761','-5.5647438','piso', 'Oportunidad, Apartamento para reformar integralmente con terraza y vistas panorámicas.'),
// (4, 'alquiler', 'Calle Violeta, 4', 'Trobajo del camino', '42.6006657','-5.6112042','piso', 'Piso exterior, magníficas calidades, luminoso, reformado y amueblado íntegramente, zona San Mamés- La Palomera, próximo a la universidad; distribuido en 3 dormitorios con armarios empotrados, dos baños en Silestone (1 con bañera y 1 con plato de ducha), cocina, salón, dos terrazas (una de ellas con superficie de 26 m2)'),
// (5, 'venta', 'Calle de la Margarita, 35', 'Trobajo del camino', '42.600403','-5.6089684','piso', 'Distribuida en cuatro dormitorios con armarios empotrados (principal con vestidor), salón, cocina americana separada del salón por cristalera y dos baños.'),
// (6, 'alquiler', 'Calle Misericordia, 35', 'Trobajo del camino', '42.5975248','-5.6073688','piso', 'La vivienda está lista para entrar a vivir '),
// (7, 'venta', 'Calle San Juan de la Cruz, 18', 'Trobajo del camino', '42.5976446','-5.612014','chalet', 'Además de la utilización del bajo cubierta diáfana con acceso a una magnifica terraza y una planta sótano con garaje y bodega. Dispone de Planta Baja con salida al jardín de 37m2 y estancia polivalente (despacho profesional).'),
// (8, 'alquiler', 'Calle Cervantes, 27', 'Villabalter', '42.6233098','-5.621031','chalet', 'Se alquila piso todo exterior muy soleado de cuatro habitaciones, dos baños, amplio salón, cocina completamente equipada, garaje y trastero, calefacción central con contador, comunidad incluida. '),
// (9, 'venta', 'Calle Real, 31', 'Villabalter', '42.6226501','-5.6168756','piso', '2 habitaciones dobles y una habitación sencilla, un baño, propiedad para entrar a vivir, cocina equipada, carpintería interior de madera, orientación este, gres y parquet, carpintería exterior de pvc / climalit.'),
// (10, 'alquiler', 'Calle Barcaduro, 21', 'Villabalter','42.6218843','-5.6210995', 'chalet', '3 habitaciones, 1 vestidor, 2 baños, 2 terrazas una de ellas cerrada, cocina equipada con electrodomésticos, amueblado, 4 camas, calefacción y agua caliente individual de gas, parquet en habitaciones, puerta de seguridad, trastero.'),
// (11, 'alquiler', 'Calle el Pozo, 5', 'Villabalter', '42.6208569','-5.6221012','piso', 'Coqueto y cuidado apartamento amueblado ubicado cerca (pegando) al Paseo Salamanca.');