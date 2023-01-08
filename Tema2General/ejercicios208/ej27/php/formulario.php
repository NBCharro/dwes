<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Distancia</title>
</head>

<body>
	<?php
	$Barcelona = array(0, 1188, 621, 1046);
	$Coruña = array(1188, 0, 609, 947);
	$Madrid = array(621, 609, 0, 538);
	$Sevilla = array(1046, 947, 538, 0);
	$ciudades = array($Barcelona, $Coruña, $Madrid, $Sevilla);
	if (isset($_REQUEST['enviar'])) {
		$ciudad1 = $_REQUEST['ciudad1'];
		$ciudad2 = $_REQUEST['ciudad2'];
		switch ($ciudad1) {
			case '0':
				$nombreCiudad1 = "Barcelona";
				break;
			case '1':
				$nombreCiudad1 = "Coruña";
				break;
			case '2':
				$nombreCiudad1 = "Madrid";
				break;
			case '3':
				$nombreCiudad1 = "Sevilla";
				break;
		}
		switch ($ciudad2) {
			case '0':
				$nombreCiudad2 = "Barcelona";
				break;
			case '1':
				$nombreCiudad2 = "Coruña";
				break;
			case '2':
				$nombreCiudad2 = "Madrid";
				break;
			case '3':
				$nombreCiudad2 = "Sevilla";
				break;
		}
		foreach ($ciudades as $key => $value) {
			if ($key == $ciudad1) {
				foreach ($value as $ciudad => $distancia) {
					if ($ciudad == $ciudad2) {
						$resultado = $distancia;
					}
				}
			}
		}
	?>
		<h2>La distancia entre <?php echo "$nombreCiudad1" ?> y <?php echo "$nombreCiudad2" ?> es de <?php echo "$resultado" ?> Km.</h2>
		<h2><a href="../index.html">Volver</a></h2>
	<?php
	} else {
		header("Location: ../index.html");
	}
	?>
</body>

</html>