<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Resultado</title>
	<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
	<?php
	if (isset($_REQUEST['enviar'])) {
		$articulos = array();
		for ($i = 0; $i < 10; $i++) {
			if ($_REQUEST["articulo$i"] == "") {
				continue;
			}
			$articulos[$_REQUEST["articulo$i"]] = round(doubleval($_REQUEST["cantidad$i"]), 2);
		}
		$ordenarPor = $_REQUEST["ordenarPor"];
		$orden = $_REQUEST["orden"];
		switch ($ordenarPor) {
			case 'nombre':
				if ($orden == "descendente") {
					krsort($articulos);
				} else {
					ksort($articulos);
				}
				break;
			case 'precio':
				if ($orden == "descendente") {
					arsort($articulos);
				} else {
					asort($articulos);
				}
				break;
				break;
		}
	?>
		<table>
			<tr>
				<th>Nombre</th>
				<th>Precio</th>
			</tr>
			<?php
			foreach ($articulos as $key => $value) {
				echo "
				<tr>
				<td>$key</td>
				<td>$value €</td>
				</tr>
				";
			}
			?>
		</table>
	<?php
	} else {
		header("Location: ./index.html");
	}
	?>
	<h2><a href="../index.php">Volver</a></h2>
</body>

</html>