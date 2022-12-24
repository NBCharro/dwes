<?php
define("HOST", "localhost");
define("USER", "nba");
define("PASSWORD", "nba");
define("BD", "nba");
function obtenerTemporadas()
{
	$temporadas = false;
	try {
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaSQL = "SELECT DISTINCT temporada FROM estadisticas;";
		$datosBD = mysqli_query($conection, $consultaSQL);
		mysqli_close($conection);
		if (mysqli_num_rows($datosBD) > 0) {
			$temporadas = array();
			while ($temporada = mysqli_fetch_row($datosBD)) {
				// $temporadas[] = $temporada[0];
				// Como los años estan raros ordenados, asique guardamos la key para la consulta con la BD y generamos un valor a mostrar
				if (str_starts_with($temporada[0], "9")) {
					$tempMostrar = "19" . $temporada[0];
				} else {
					$tempMostrar = "20" . $temporada[0];
				}
				$temporadas[$temporada[0]] = $tempMostrar;
			}
		}
		asort($temporadas);
	} catch (mysqli_sql_exception $e) {
		echo $e->getMessage();
	}
	return $temporadas;
}
function obtenerJugadores($estadistica, $temporada, $numeroJugadores)
{
	$jugadores = false;
	try {
		$estadistica = $estadistica . "_por_partido";
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaSQL = "SELECT jugadores.Nombre, jugadores.Nombre_equipo, estadisticas.$estadistica FROM estadisticas INNER JOIN jugadores ON estadisticas.jugador=jugadores.codigo WHERE temporada='$temporada';";
		$datosBD = mysqli_query($conection, $consultaSQL);
		mysqli_close($conection);
		if (mysqli_num_rows($datosBD) > 0) {
			$cantidadJugadores = array();
			while ($jugador = mysqli_fetch_assoc($datosBD)) {
				$cantidadJugadores[] = $jugador;
			}
		}
		$ordenar = array_column($cantidadJugadores, $estadistica);
		array_multisort($ordenar, SORT_DESC, $cantidadJugadores);
		$totalJugadores = count($cantidadJugadores) > $numeroJugadores ? $numeroJugadores : count($cantidadJugadores); // Si hay menos resultados que los pedidos
		for ($i = 0; $i < $totalJugadores; $i++) {
			$jugadores[] = $cantidadJugadores[$i];
		}
	} catch (mysqli_sql_exception $e) {
		echo $e->getMessage();
	}
	return $jugadores;
}
