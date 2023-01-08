<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 40</title>
</head>

<body>
	<?php
	if (!isset($_REQUEST['enviar'])) {
	?>
		<form action="#" method="post">
			<label for="areaTexto">Introduzca el texto para comprimirlo:</label><br>
			<textarea name="areaTexto" id="areaTexto" cols="30" rows="10"></textarea><br>
			<input type="submit" value="Traducir" name="enviar">
		</form>
	<?php
	} else {
		$areaTexto = $_REQUEST['areaTexto'];
		$textoArray = explode(" ", $areaTexto);
		$arrayCompresion = array(
			"adios" => "a2",
			"besos" => "bs",
			"donde" => "dnd",
			"instituto" => "ies",
			"mensaje" => "msj",
			"porque" => "pq",
			"que" => "q",
			"tambien" => "tb",
			"por" => "x",
			"para" => "xa"
		);
		$palabra = reset($textoArray);
		for ($i = 0; $i < count($textoArray); $i++) {
			if (array_key_exists($palabra, $arrayCompresion)) {
				$textoArray[$i] = $arrayCompresion[$palabra];
			}
			$palabra = next($textoArray);
		}
		$textoComprimido = implode(" ", $textoArray);
		$textoComprimido = str_replace("fin de semana", "finde", $textoComprimido);
		$textoComprimido = str_replace("x favor", "pls", $textoComprimido);

	?>
		<p><?php echo "$textoComprimido"; ?></p>
		<h2><a href="">Volver</a></h2>
	<?php
	}
	?>
</body>

</html>