<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 39</title>
</head>

<body>
	<?php
	if (!isset($_REQUEST['enviar'])) {
	?>
		<form action="#" method="post">
			<label for="areaTexto">Introduzca el texto para traducir a <strong>pig latin</strong></label><br>
			<textarea name="areaTexto" id="areaTexto" cols="30" rows="10"></textarea><br>
			<input type="submit" value="Traducir" name="enviar">
		</form>
	<?php
	} else {
		$areaTexto = $_REQUEST['areaTexto'];
		$textoArray = explode(" ", $areaTexto);
		function traducir(&$palabra)
		{
			$posiciones = array(
				"a" => strpos($palabra, "a"),
				"e" => strpos($palabra, "e"),
				"i" => strpos($palabra, "i"),
				"o" => strpos($palabra, "o"),
				"u" => strpos($palabra, "u"),
				"A" => strpos($palabra, "A"),
				"E" => strpos($palabra, "E"),
				"I" => strpos($palabra, "I"),
				"O" => strpos($palabra, "O"),
				"U" => strpos($palabra, "U")
			);
			$pos = 100;
			$letra = "";
			foreach ($posiciones as $key => $value) {
				if ($value < $pos && $value != "") {
					$pos = $value;
					$letra = $key;
				}
			}
			if ($pos == 0) {
				$palabra = $palabra . "ay";
			} else {
				$final = strstr($palabra, $letra);
				$principio = strstr($palabra, $letra, true);
				$palabra = $final . $principio . "ay";
			}
		}
		array_walk($textoArray, "traducir");
		$texto = implode(' ', $textoArray);
		echo "<p>$areaTexto</p>";
		echo "<p>$texto</p>";
	}
	?>
</body>

</html>