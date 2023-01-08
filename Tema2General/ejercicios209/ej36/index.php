<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 36</title>
</head>

<body>
    <form action="./php/formulario.php" method="post">
        <?php
        for ($i = 0; $i < 5; $i++) {
            $numero = $i + 1;
            echo "<label for='numeros[$i]'>Número $numero:  </label>";
            echo "<input type='number' name='numeros[$i]' min='1' max='100'><br>";
        }
        ?>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>

</html>