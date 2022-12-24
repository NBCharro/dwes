<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            text-align: center;
            margin: auto;
            width: 30%;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_REQUEST['enviar'])) {
        $numeros = $_REQUEST['numeros'];
        $numeroMitad = $numeros;
        // Version simple
        function mitad(&$numero)
        {
            $numero = $numero / 2;
        }
        array_walk($numeroMitad, "mitad");
        // Version con index y parametros
        function mitadConParametros($numero, $key, $param)
        {
            echo "<script>console.log('$key: $numero  --  $param');</script>";
            $numero = $numero * 2;
        }
        array_walk($numeroMitad, "mitadConParametros", "PARAMETRO");
        // Version con la funcion dentro del array_walk
        array_walk(
            $numeroMitad,
            function ($value, $key) {
                echo ("<script>console.log('$key: $value');</script>");
                $value = $value / 2;
            }
        );
    ?>
        <table>
            <tr>
                <th>Número antes</th>
                <th>Número después</th>
            </tr>
            <?php
            for ($i = 0; $i < count($numeros); $i++) {
                echo "<tr>";
                echo "<td>$numeros[$i]</td>";
                echo "<td>$numeroMitad[$i]</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <h2><a href="../index.php">Volver</a></h2>
    <?php
    } else {
        header("Location: ../index.php");
    }
    ?>
</body>

</html>