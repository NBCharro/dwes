<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criterio y valor</title>
</head>

<body>
    <?php
    include_once("./formulas.php");
    if (isset($_REQUEST['enviarCampos']) | isset($_SESSION['nombreCampo'])) {
        if (isset($_REQUEST['nombreCampo'])) {
            $nombreCampo = $_REQUEST['nombreCampo'];
            $_SESSION['nombreCampo'] = $nombreCampo;
        } else {
            $nombreCampo = $_SESSION['nombreCampo'];
        }
        $bbdd = $_SESSION['bbdd'];
        $nombreTabla = $_SESSION['nombreTabla'];
    ?>
        <h1>Ejercicio 4</h1>
        <h2>Base de datos: <?php echo $bbdd ?></h2>
        <h2>Tabla: <?php echo $nombreTabla ?></h2>
        <h2>Campo: <?php echo $nombreCampo ?></h2>
        <form action="./pagina4.php" method="post">
            <select name="criterio" id="criterio">
                <option value="empieza">Empieza por</option>
                <option value="igual">Igual a</option>
                <option value="contiene">Contiene</option>
                <option value="termina">Termina con</option>
            </select>
            <input type="text" name="valorCriterio" id="valorCriterio">
            <input type="submit" value="Enviar" name="enviarCriterio">
        </form>
        <h2><a href="./pagina2.php">Volver</a></h2>
    <?php
    } else {
        echo "<h2>ERROR</h2>";
    }
    ?>
</body>

</html>