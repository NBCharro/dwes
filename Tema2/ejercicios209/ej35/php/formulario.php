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
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 60%;
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
        $nombre  = array_column($alumnos, 'nombre');
        $apellidos = array_column($alumnos, 'apellidos');
        $curso = array_column($alumnos, 'curso');
        array_multisort($curso, SORT_ASC, $apellidos, SORT_ASC, $nombre, SORT_ASC, $alumnos);
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
            reset($alumnos);
            for ($i = 0; $i < count($nombre); $i++) {
                echo "<tr>";
                echo "<td>" . current($alumnos)["nombre"] . "</td>";
                echo "<td>" . current($alumnos)['apellidos'] . "</td>";
                echo "<td>" . current($alumnos)['curso'] . "</td>";
                echo "<td>" . current($alumnos)['edad'] . "</td>";
                echo "<td>" . current($alumnos)['localidad'] . "</td>";
                echo "</tr>";
                next($alumnos);
            }
            // Otra forma de hacerlo, mejor que con el FOR porque habria que romper el bucle FOR
            $alumno = reset($alumnos);
            while ($alumno) {
                echo "<tr>";
                echo "<td>" . $alumno["nombre"] . "</td>";
                echo "<td>" . $alumno['apellidos'] . "</td>";
                echo "<td>" . $alumno['curso'] . "</td>";
                echo "<td>" . $alumno['edad'] . "</td>";
                echo "<td>" . $alumno['localidad'] . "</td>";
                echo "</tr>";
                $alumno = next($alumnos);
            }
            ?>
        </table>
        <br>
        <br>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Curso</th>
                <th>Edad</th>
                <th>Localidad</th>
            </tr>
            <?php
            end($alumnos);
            for ($i = 0; $i < count($nombre); $i++) {
                echo "<tr>";
                echo "<td>" . current($alumnos)["nombre"] . "</td>";
                echo "<td>" . current($alumnos)['apellidos'] . "</td>";
                echo "<td>" . current($alumnos)['curso'] . "</td>";
                echo "<td>" . current($alumnos)['edad'] . "</td>";
                echo "<td>" . current($alumnos)['localidad'] . "</td>";
                echo "</tr>";
                prev($alumnos);
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