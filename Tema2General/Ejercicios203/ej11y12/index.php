<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicios 11 y 12</title>
</head>

<body>
	<?php
	echo "<h1>Ejercicio 11</h1>";
	$num1 = "7";
	$num2 = 5;
	$result = intval($num1) / $num2;
	echo "<p>Numero 1 = Tipo: " . gettype($num1) . "; Valor: $num1</p>";
	echo "<p>Numero 2 = Tipo: " . gettype($num2) . "; Valor: $num2</p>";
	echo "<p>Resultado = Tipo: " . gettype($result) . "; Valor: $result</p>";
	$num3 = "Lote: ";
	$num4 = 724;
	$result2 = $num3 . $num4;
	echo "<p>Numero 1 = Tipo: " . gettype($num3) . "; Valor: $num3</p>";
	echo "<p>Numero 2 = Tipo: " . gettype($num4) . "; Valor: $num4</p>";
	echo "<p>Resultado = Tipo: " . gettype($result2) . "; Valor: $result2</p>";
	echo "<h1>Ejercicio 11</h1>";
	echo "
		<table>
	    <tr>
			<th>Tipo Origen</th>
			<th>Tipo Destino</th>
			<th>¿Posible?</th>
			<th>¿En qué casos?</th>
		</tr>
		<tr>
			<td>Entero</td>
			<td>Real</td>
			<td>Si</td>
			<td>Siempre</td>
		</tr>
		<tr>
			<td>Entero</td>
			<td>Cadena</td>
			<td>Si</td>
			<td>Siempre</td>
		</tr>
		<tr>
			<td>Real</td>
			<td>Entero</td>
			<td>Si</td>
			<td>Siempre pero se pierden los decimales.</td>
		</tr>
		<tr>
			<td>Real</td>
			<td>Cadena</td>
			<td>Si</td>
			<td>Siempre</td>
		</tr>
		<tr>
			<td>Cadena</td>
			<td>Entero</td>
			<td>Si</td>
			<td>Cuando la cadena sean numeros. Convierte hasta que no hay numeros, no cambia el punto.</td>
		</tr>
		<tr>
			<td>Cadena</td>
			<td>Real</td>
			<td>Si</td>
			<td>Cuando la cadena sean numeros, mantiene los decimales.</td>
		</tr>
		</table>
	";
	?>
</body>

</html>