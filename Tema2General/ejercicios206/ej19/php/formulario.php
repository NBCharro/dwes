<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario</title>
	<link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
	<?php
	if (isset($_REQUEST['enviar'])) {
		$cantidad = $_REQUEST['cantidad'];
	?>
		<form action="./tabla.php" method="post">
			<table>
				<tr>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Telefono</th>
					<th>Direccion</th>
					<th>Poblacion</th>
					<th>Provincia</th>
					<th>Fecha de nacimiento</th>
					<th>Estudios</th>
				</tr>
				<?php
				for ($i = 0; $i < $cantidad; $i++) {
					$nombre = "nombre$i";
					$apellidos = "apellidos$i";
					$telefono = "telefono$i";
					$direccion = "direccion$i";
					$poblacion = "poblacion$i";
					$provincia = "provincia$i";
					$nacimiento = "nacimiento$i";
					$estudios = "estudios$i";
					echo "
                    <tr>
                    <td><input type='text' name='" . $nombre . "'></td>
                    <td><input type='text' name='" . $apellidos . "'> </td>
                    <td><input type='tel' name='" . $telefono . "'> </td>
                    <td><input type='text' name='" . $direccion . "'> </td>
                    <td><input type='text' name='" . $poblacion . "'> </td>
                    <td><input type='text' name='" . $provincia . "'> </td>
                    <td><input type='date' name='" . $nacimiento . "'> </td>
                    <td><select name='" . $estudios . "'>
                        <option value='ESO' name='" . $estudios . "'>ESO</option>
                        <option value='Bachillerato' name='" . $estudios . "'>Bachillerato</option>
                        <option value='Ciclo Formativo' name='" . $estudios . "'>Ciclo Formativo</option>
                    </select></td>
                    </tr>
            		";
				}
				?>
			</table>
			<input type="hidden" name="cantidad" value="<?php echo "$cantidad" ?>">
			<input type="submit" value="Enviar" name="enviar">
		</form>
	<?php
	} else {
		echo "<P>NO HAY DATOS</P>";
	} ?>
	<h2><a href="../index.html">Volver</a></h2>
</body>

</html>