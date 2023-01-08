<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario</title>
</head>

<body>
	<?php
	if (isset($_REQUEST['enviar'])) {
		$funcion = $_REQUEST['funcion'];
		$cantidad = intval($_REQUEST['cantidad']);
	?>
		<form action="./resultados.php" method="post">
			<?php
			for ($i = 1; $i <= $cantidad; $i++) {
				echo "
				<label for='numero$i'>Numero $i:</label>
				<input type='number' name='numero$i'><br>
			";
			}
			?>
			<input type="hidden" name="funcion" value="<?php echo "$funcion" ?>">
			<input type="hidden" name="cantidad" value="<?php echo "$cantidad" ?>">
			<input type="submit" value="Enviar" name="enviar">
		</form>
	<?php
	} else {
		header("Location: ../index.html");
	} ?>
	<h2><a href="../index.html">Volver</a></h2>
</body>

</html>