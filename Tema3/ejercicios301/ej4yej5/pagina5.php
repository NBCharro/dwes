<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    include_once("./formulas.php");
    if (isset($_REQUEST['enviarSentenciaSQL'])) {
        $bbdd = $_SESSION['bbdd'];
        $nombreTabla = $_SESSION['nombreTabla'];
        $nombreCampo = $_SESSION['nombreCampo'];
        $criterio = $_SESSION['criterio'];
        $nombreCampo = $_SESSION['nombreCampo'];
        $valorCriterio = $_SESSION['valorCriterio'];
        $sentenciaSQL = $_SESSION['sentenciaSQL'];
        $resultados = obtenerResultados($bbdd, $sentenciaSQL);
        if (is_array($resultados) && count($resultados) > 0) {
    ?>
            <h1>Ejercicio 4</h1>
            <h4>Base de datos: <?php echo $bbdd ?></h4>
            <h4>Tabla: <?php echo $nombreTabla ?></h4>
            <h4>Campo: <?php echo $nombreCampo ?></h4>
            <h4>Criterio: <?php echo $criterio ?></h4>
            <h4>Valor Criterio: <?php echo $valorCriterio ?></h4>
            <h3>SentenciaSQL: <?php echo $sentenciaSQL ?></h3>
            <table>
                <tr>
                    <?php
                    foreach ($resultados[0] as $key => $value) {
                        echo "<th>$key</th>";
                    }
                    ?>
                </tr>
                <?php
                foreach ($resultados as $resultado) {
                    echo "<tr>";
                    foreach ($resultado as $key => $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
        <?php
        } else {
            echo "<h2>No existen datos que coincidan con el criterio.</h2>";
        }
        ?>
        <h2><a href="./index.php">Volver</a></h2>
    <?php
    } else {
        echo "<h2>ERROR</h2>";
    }
    ?>
</body>

</html>