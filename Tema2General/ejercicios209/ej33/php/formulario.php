<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulario</title>
    <style>
        table,
        td,
        th {
            border: 2px solid black;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_REQUEST['enviar'])) {
        $nombres = $_REQUEST["nombre"];
        $apellidos = $_REQUEST["apellidos"];
        $curso = $_REQUEST["curso"];
        $edad = $_REQUEST["edad"];
        $localidad = $_REQUEST["localidad"];
        $alumnos = array();
        for ($i = 0; $i < count($nombres); $i++) {
            if ($nombres[$i] != "" && $apellidos[$i] != "" && $curso[$i] != "") {
                $alumnos[] = array(
                    "nombre" => $nombres[$i],
                    "apellidos" => $apellidos[$i],
                    "curso" => $curso[$i],
                    "edad" => $edad[$i],
                    "localidad" => $localidad[$i]
                );
            }
        }
        function comparaAsociativo($x, $y)
        {
            if ($x["curso"] == $y["curso"])
                if ($x["apellidos"] == $y["apellidos"])
                    if ($x["nombre"] == $y["nombre"])
                        return 0;
                    elseif ($x["nombre"] < $y["nombre"])
                        return -1;
                    else
                        return 1;
                elseif ($x["apellidos"] < $y["apellidos"])
                    return -1;
                else
                    return 1;
            elseif ($x["curso"] < $y["curso"])
                return -1;
            else
                return 1;
        };
        usort($alumnos, 'comparaAsociativo');
    ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Curso</th>
                <th>Edad</th>
                <th>Localidad</th>
            </tr>
            <?php
            // for ($i = 0; $i < count($alumnos); $i++) {
            //     echo "<tr>";
            //     echo "<td>" . $alumnos[$i]['nombre'] . "</td>";
            //     echo "<td>{$alumnos[$i]['apellidos']}</td>";
            //     echo "<td>{$alumnos[$i]['curso']}</td>";
            //     echo "<td>{$alumnos[$i]['edad']}</td>";
            //     echo "<td>{$alumnos[$i]['localidad']}</td>";
            //     echo "</tr>";
            // }
            foreach ($alumnos as $value) {
                echo "<tr>";
                echo "<td>" . $value['nombre'] . "</td>";
                echo "<td>" . $value['apellidos'] . "</td>";
                echo "<td>" . $value['curso'] . "</td>";
                echo "<td>" . $value['edad'] . "</td>";
                echo "<td>" . $value['localidad'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php
    } else {
        header("Location: ../index.php");
    }

    ?>
</body>

</html>