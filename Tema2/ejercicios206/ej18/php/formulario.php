<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            height: 15px;
            text-align: center;
        }
    </style>
</head>

<body>
    <table>
        <?php
        if (isset($_REQUEST['enviar'])) {
            $columnas = intval($_REQUEST['columnas']);
            $filas = intval($_REQUEST['filas']);
            for ($i = 0; $i < $filas; $i++) {
                echo "<tr>";
                for ($j = 1; $j <= $columnas; $j++) {
                    $pos = ($i * $columnas) + $j;
                    echo "<td>$pos</td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<h2>No hay valores</h2>";
        }
        ?>
    </table>
    <h2><a href="../index.html">Volver</a></h2>
</body>

</html>