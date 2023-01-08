<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 4 Ejercicio 4</title>
</head>

<body>
    <h1>Ejercicio 4</h1>
    <form action="./pagina1.php" method="post">
        <select name="BBDD" id="BBDD">
            <option>decine</option>
            <option>jardineria</option>
            <option>nba</option>
            <option>world</option>
        </select>
        <input type="submit" value="Enviar" name="enviarBBDD">
    </form>
</body>

</html>