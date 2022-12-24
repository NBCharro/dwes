<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sentencia SQL</title>
</head>

<body>
    <?php
    include_once("./formulas.php");
    if (isset($_REQUEST['enviarCriterio']) | (isset($_SESSION['criterio']) && isset($_SESSION['valorCriterio']))) {
        if (isset($_REQUEST['criterio']) && isset($_REQUEST['valorCriterio'])) {
            $criterio = $_REQUEST['criterio'];
            $valorCriterio = $_REQUEST['valorCriterio'];
            $_SESSION['criterio'] = $criterio;
            $_SESSION['valorCriterio'] = $valorCriterio;
        } else {
            $criterio = $_SESSION['criterio'];
            $valorCriterio = $_SESSION['valorCriterio'];
        }
        $bbdd = $_SESSION['bbdd'];
        $nombreTabla = $_SESSION['nombreTabla'];
        $nombreCampo = $_SESSION['nombreCampo'];
        $sentenciaSQL = obtenerSentenciaSQL($bbdd, $nombreTabla, $nombreCampo, $criterio, $valorCriterio);
        $_SESSION['sentenciaSQL'] = $sentenciaSQL;
    ?>
        <h1>Ejercicio 4</h1>
        <h2>Base de datos: <?php echo $bbdd ?></h2>
        <h2>Tabla: <?php echo $nombreTabla ?></h2>
        <h2>Campo: <?php echo $nombreCampo ?></h2>
        <h2>Criterio: <?php echo $criterio ?></h2>
        <h2>Valor Criterio: <?php echo $valorCriterio ?></h2>
        <h2>SentenciaSQL: <?php echo $sentenciaSQL ?></h2>
        <form action="./pagina5.php" method="post">
            <input type="submit" value="Mostrar Resultados" name="enviarSentenciaSQL">
        </form>
        <h2><a href="./pagina3.php">Volver</a></h2>
    <?php
    } else {
        echo "<h2>ERROR</h2>";
    }
    ?>
</body>

</html>