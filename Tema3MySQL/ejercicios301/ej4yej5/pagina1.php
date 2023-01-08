<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre de la tabla</title>
</head>

<body>
    <?php
    include_once("./formulas.php");
    if (isset($_REQUEST['enviarBBDD']) | isset($_SESSION['bbdd'])) {
        if (isset($_REQUEST['BBDD'])) {
            $bbdd = $_REQUEST['BBDD'];
            $_SESSION['bbdd'] = $bbdd;
        } else {
            $bbdd = $_SESSION['bbdd'];
        }
        $nombreTablas = obtenerBBDD($bbdd);
        $_SESSION['nombreTablas'] = $nombreTablas;
    ?>
        <h1>Ejercicio 4</h1>
        <h2>Base de datos: <?php echo $bbdd ?></h2>
        <form action="./pagina2.php" method="post">
            <select name="nombreTabla" id="nombreTabla">
                <?php
                foreach ($nombreTablas as $value) {
                    echo "<option>$value</option>";
                }
                ?>
            </select>
            <input type="submit" value="Enviar" name="enviarTablas">
        </form>
        <h2><a href="./index.php">Volver</a></h2>
    <?php
    } else {
        echo "<h2>ERROR</h2>";
    }
    ?>
</body>

</html>