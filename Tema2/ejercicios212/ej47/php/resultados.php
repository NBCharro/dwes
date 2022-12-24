<?php
function minimo($cantidad)
{
	$numeroMinimo = intval($_REQUEST['numero1']);
	for ($i = 2; $i <= $cantidad; $i++) {
		$numeroItera = intval($_REQUEST["numero$i"]);
		if ($numeroItera < $numeroMinimo) {
			$numeroMinimo = $numeroItera;
		}
	}
	return $numeroMinimo;
};
function maximo($cantidad)
{
	$numeroMaximo = intval($_REQUEST['numero1']);
	for ($i = 2; $i <= $cantidad; $i++) {
		$numeroItera = intval($_REQUEST["numero$i"]);
		if ($numeroItera > $numeroMaximo) {
			$numeroMaximo = $numeroItera;
		}
	}
	return $numeroMaximo;
};
function suma($cantidad)
{
	$total = 0;
	for ($i = 1; $i <= $cantidad; $i++) {
		$numeroItera = intval($_REQUEST["numero$i"]);
		$total += $numeroItera;
	}
	return $total;
};
function media($cantidad)
{
	$total = 0;
	for ($i = 1; $i <= $cantidad; $i++) {
		$numeroItera = intval($_REQUEST["numero$i"]);
		$total += $numeroItera;
	}
	return $total / $cantidad;
};
function recorrido($cantidad)
{
	$maximo = maximo($cantidad);
	$minimo = minimo($cantidad);
	return $maximo - $minimo;
};
function moda($cantidad)
{
	$arrayNumeros = array();
	for ($i = 1; $i <= $cantidad; $i++) {
		$arrayNumeros[] = intval($_REQUEST["numero$i"]);
	}
	$moda = array_count_values($arrayNumeros);
	arsort($moda);
	return key($moda);
};
?>
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
		switch ($funcion) {
			case 'Minimo':
				$resultado = minimo($cantidad);
				break;
			case 'Maximo':
				$resultado = maximo($cantidad);
				break;
			case 'Suma':
				$resultado = suma($cantidad);
				break;
			case 'Media':
				$resultado = media($cantidad);
				break;
			case 'Recorrido':
				$resultado = recorrido($cantidad);
				break;
			case 'Moda':
				$resultado = moda($cantidad);
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