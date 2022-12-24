<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resultados</title>
</head>

<body>
	<?php
	if (isset($_REQUEST['enviar'])) {
		$funcion = $_REQUEST['funcion'];
		$cantidad = intval($_REQUEST['cantidad']);
		$numerosIntroducidos = array();
		for ($i = 1; $i <= $cantidad; $i++) {
			$numerosIntroducidos[] = intval($_REQUEST["numero$i"]);
		}
		switch ($funcion) {
			case 'Minimo':
				$numeroMinimo = $numerosIntroducidos[0];
				foreach ($numerosIntroducidos as $valor) {
					if ($valor < $numeroMinimo) {
						$numeroMinimo = $valor;
					}
				}
				$resultado = $numeroMinimo;
				break;
			case 'Maximo':
				$numeroMaximo = $numerosIntroducidos[0];
				foreach ($numerosIntroducidos as $valor) {
					if ($valor > $numeroMaximo) {
						$numeroMaximo = $valor;
					}
				}
				$resultado = $numeroMaximo;
				break;
			case 'Suma':
				$total = 0;
				foreach ($numerosIntroducidos as $valor) {
					$total += $valor;
				}
				$resultado = $total;
				break;
			case 'Media':
				$total = 0;
				foreach ($numerosIntroducidos as $valor) {
					$total += $valor;
				}
				$resultado = $total / $cantidad;
				break;
			default:
				$resultado = "ERROR";
				break;
		}
	?>
		<p>Sobre el conjunto de valores
			[<?php
				for ($i = 1; $i <= $cantidad; $i++) {
					$numeroItera = intval($_REQUEST["numero$i"]);
					echo " $numeroItera ";
				}
				?>]
			la funcion estadistica "<?php echo "$funcion" ?>" da como resultado <?php echo "$resultado" ?></p>
	<?php
	} else {
		echo '<h2>Error</h2>';
	}
	?>
	<h2><a href="./formulario.php">Volver</a></h2>
	<h2><a href="../index.html">Volver al Inicio</a></h2>
</body>

</html>