<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	if (isset($_REQUEST['enviar'])) {
		$numero = intval($_REQUEST['numero']);
		$funcion = $_REQUEST['funcion'];
		switch ($funcion) {
			case 'Opuesto':
				$resultado = $numero * (-1);
				break;
			case 'Inverso':
				if ($numero == 0) {
					$resultado = "No existe el inverso";
				} else {
					$resultado = (1 / $numero);
				}
				break;
			case 'Cuadrado':
				$resultado = $numero * $numero;
				break;
			case 'Raiz cuadrada':
				if ($numero < 0) {
					$resultado = 'No existe';
				} else {
					$resultado = sqrt($numero);
				}
				break;
			case 'Sumatorio':
				$resultado = 0;
				if ($numero < 0) {
					$numeroPositivo = $numero * (-1);
					for ($i = 1; $i <= $numeroPositivo; $i++) {
						$resultado += $i;
					}
					$resultado *= -1;
				} else {
					for ($i = 1; $i <= $numero; $i++) {
						$resultado += $i;
					}
				}
				break;
			case 'Factorial':
				if ($numero == 0) {
					$resultado = 0;
				} elseif ($numero < 0) {
					$resultado = 1;
					for ($i = -1; $i >= $numero; $i--) {
						$resultado *= $i;
					}
				} else {
					$resultado = 1;
					for ($i = 1; $i <= $numero; $i++) {
						$resultado *= $i;
					}
				}
				break;
			default:
				$resultado = "Error";
				break;
		}

	?>
		<title><?php echo "$funcion" ?></title>
</head>

<body>
	<p>El resultado de la funcion "<?php echo "$funcion" ?>" para el numero <?php echo "$numero" ?> es <?php echo "$resultado" ?></p>
<?php
	} else {
		echo "<h2>Error: </h2>";
	} ?>
<h2><a href="../index.html">Volver</a></h2>
</body>

</html>