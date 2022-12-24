<?php
define("HOST", "localhost");
define("USER", "nba");
define("PASSWORD", "nba");
define("BD", "nba");
function obtenerEquipos()
{
	try {
		$equipos = false;
		$conection = new mysqli(HOST, USER, PASSWORD, BD);
		$consultaEquipos = "SELECT Nombre FROM equipos";
		$equiposNBA = mysqli_query($conection, $consultaEquipos);
		mysqli_close($conection);
		if (mysqli_num_rows($equiposNBA) > 0) {
			$equipos = array();
			while ($equipo = mysqli_fetch_assoc($equiposNBA)) {
				$equipos[] = $equipo[0];
			}
		}
		return $equipos;
	} catch (mysqli_sql_exception $e) {
		// echo $e->getMessage();
	}
}
