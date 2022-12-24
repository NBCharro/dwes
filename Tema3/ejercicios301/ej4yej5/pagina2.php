<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre del campo</title>
</head>

<body>
    <?php
    include_once("./formulas.php");
    if (isset($_REQUEST['enviarTablas']) | isset($_SESSION['nombreTabla'])) {
        if (isset($_REQUEST['nombreTabla'])) {
            $nombreTabla = $_REQUEST['nombreTabla'];
            $_SESSION['nombreTabla'] = $nombreTabla;
        } else {
            $nombreTabla = $_SESSION['nombreTabla'];
        }
        $bbdd = $_SESSION['bbdd'];
        $nombreCampos = obtenerCampos($bbdd, $nombreTabla);
        $_SESSION['nombreCampos'] = $nombreCampos;
    ?>
        <h1>Ejercicio 4</h1>
        <h2>Base de datos: <?php echo $bbdd ?></h2>
        <h2>Tabla: <?php echo $nombreTabla ?></h2>
        <form action="./pagina3.php" method="post">
            <select name="nombreCampo" id="nombreCampo">
                <?php
                foreach ($nombreCampos as $value) {
                    echo "<option>$value</option>";
                }
                ?>
            </select>
            <input type="submit" value="Enviar" name="enviarCampos">
        </form>
        <h2><a href="./pagina1.php">Volver</a></h2>
    <?php
    } else {
        echo "<h2>ERROR</h2>";
    }
    ?>
</body>

</html>