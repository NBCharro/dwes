<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 22</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    if (!isset($_REQUEST['enviar'])) {
    ?>
        <form action="#" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"><br>
            <label for="jugada">Jugada</label>
            <input type="number" name="jugada" min="2" max="12" value="2"><br>
            <input type="submit" value="Enviar" name="enviar">
        </form>
    <?php
    } else {
        $nombre = $_REQUEST['nombre'];
        $jugada = $_REQUEST['jugada'];
        $num1 = rand(1, 6);
        $num2 = rand(1, 6);
        $suma = $num1 + $num2;
    ?>
        <h2>Suerte, <?php echo "$nombre" ?></h2>
        <h2>Jugada: <?php echo "$jugada" ?></h2>
        <img src="./imagenes/dado<?php echo "$num1" ?>.png" alt="Dado numero 1">
        <img src="./imagenes/dado<?php echo "$num2" ?>.png" alt="Dado numero 2">
    <?php
        if ($suma == $jugada) {
            echo "<h2>¡¡¡¡Enhorabuena $nombre, ha ganado!!!!</h2>";
        } else {
            echo "<h2>¡¡¡¡Lo siento $nombre, ha perdido!!!!</h2>";
        }
    }
    ?>
    <h2><a href="index.php">Volver</a></h2>
</body>

</html>