<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 41</title>
</head>

<body>
	<?php
	if (!isset($_REQUEST['enviar'])) {
	?>
		<form action="#" method="post">
			<label for="areaTexto">Introduzca el texto:</label><br>
			<textarea name="areaTexto" id="areaTexto" cols="30" rows="10"></textarea><br>
			<label for="buscar">Buscar: </label>
			<input type="text" name="buscar" id="buscar"><br>
			<label for="reemplazar">Reemplazar: </label>
			<input type="text" name="reemplazar" id="reemplazar"><br>
			<input type="submit" value="Enviar" name="enviar">
		</form>
	<?php
	} else {
		$areaTexto = $_REQUEST['areaTexto'];
		$buscar = $_REQUEST['buscar'];
		$reemplazar = $_REQUEST['reemplazar'];
		if ($buscar == "") {
			$textoFinal = "Debe introducir una palabra para buscar o reemplazar";
		} else if ($reemplazar == "") {
			$areaTexto = str_replace($buscar, "<mark>$buscar</mark>", $areaTexto);
			$textoFinal = $areaTexto;
		} else {
			$areaTexto = str_replace($buscar, $reemplazar, $areaTexto);
			$textoFinal = $areaTexto;
		}
	?>
		<p><?php echo "$textoFinal"; ?></p>
		<h2><a href="">Volver</a></h2>
	<?php
	}
	?>
</body>

</html>