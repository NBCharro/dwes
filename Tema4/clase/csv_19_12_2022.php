<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 19_12_2022</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        h1 {
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
        }

        form {
            width: 50%;
            margin: 50px auto;
            text-align: center;
        }

        label,
        input:not([type="submit"]),
        select {
            box-sizing: border-box;
            display: inline-block;
            width: 150px;
            text-align: center;
            text-align-last: center;
        }

        input[type="submit"] {
            margin: 10px;
            width: 100px;
        }

        input[type="submit"]:hover {
            cursor: pointer;
        }

        .agregado {
            background-color: greenyellow;
            text-align: center;
            font-size: 1.1rem;
        }

        .error {
            background-color: red;
            text-align: center;
            font-size: 1.1rem;
        }
    </style>
</head>

<body>
    <h1>Manipular archivos CSV: fgetcsv</h1>
    <?php
    // Leer un archivo CSV: delimitador ; y final el ENTER
    // $file = fopen("./data/alumnos.csv", "r");
    // if ($file) {
    //     // Si pongo 0 lee el archivo completo
    //     // $alumnos = fgetcsv($file, 0, ";"); // Devuelve un array de la primera linea
    //     // Para guardar todo en un array
    //     $alumnos = [];
    //     while (!feof($file)) {
    //         $alumno = fgetcsv($file, 0, ";");
    //         if (is_array($alumno) && $alumno != "" && count($alumno) == 4) {
    //             $alumnos[] = $alumno;
    //         }
    //     }
    //     fclose($file);
    //     // echo '<pre>';
    //     // print_r($alumnos);
    //     // echo '</pre>';
    // } else {
    //     echo "<p>No se ha podido abrir el archivo.</p>";
    // }
    ?>
    <h1>Escribir un archivo CSV: fputcsv</h1>
    <?php
    // Puede ser un array asociativo o no
    // $alumno = [
    //     "nombre" => "Benito Perez",
    //     "nacimiento" => "31/12/1995",
    //     "curso" => "DAW2",
    //     "email" => "benitoper@gmail.com"
    // ];
    // $archivo = fopen("./data/alumnos.csv", "a"); // "a" para que no borre lo anterior
    // // Si el archivo no existe deberiamos prescindir del if. Tendriamos que tenerlo en cuenta.
    // if ($archivo) {
    //     $escribir = fputcsv($archivo, $alumno, ";");
    //     // Devuelve el numero de caracteres escritos
    //     if ($escribir) {
    //         echo "<p>El alumno se ha guardado correctamente.</p>";
    //     } else {
    //         echo "<p>No se ha guardado el alumno.</p>";
    //     }
    //     fclose($archivo);
    // } else {
    //     echo "<p>No se ha podido abrir el archivo.</p>";
    // }
    ?>
    <h1>Ejercicio 1 y 2</h1>
    <?php
    $file = fopen("./data/alumnos.csv", "r");
    if ($file) {
        $alumnos = [];
        while (!feof($file)) {
            $alumno = fgetcsv($file, 0, ";");
            if (is_array($alumno) && $alumno != "" && count($alumno) == 4) {
                $alumnos[] = $alumno;
            }
        }
        fclose($file);
    } else {
        echo "<p>No se ha podido abrir el archivo.</p>";
    }
    ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Fecha de nacimiento</th>
            <th>Curso</th>
            <th>Email</th>
        </tr>
        <?php
        foreach ($alumnos as $alumno) {
            echo "<tr>";
            foreach ($alumno as $cadaUno) {
                echo "<td>$cadaUno</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required><br>
        <label for="nacimiento">Fecha de nacimiento</label>
        <input type="date" name="nacimiento" id="nacimiento" required><br>
        <label for="curso">Curso</label>
        <select name="curso" id="curso">
            <option>DAW1</option>
            <option>DAW2</option>
            <option>DAM1</option>
            <option>DAM2</option>
            <option>ASIR1</option>
            <option>ASIR2</option>
        </select><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br>
        <input type="submit" value="Guardar" name="guardar">
    </form>
    <?php
    if (isset($_REQUEST['guardar'])) {
        $alumnoNuevo = [
            "nombre" => $_REQUEST['nombre'],
            "nacimiento" => $_REQUEST['nacimiento'],
            "curso" => $_REQUEST['curso'],
            "email" => $_REQUEST['email']
        ];
        $archivo = fopen("./data/alumnos.csv", "a");
        if ($archivo) {
            $escribir = fputcsv($archivo, $alumnoNuevo, ";");
            if ($escribir) {
                header("Location: ./csv_19_12_2022.php?agregado=1");
            } else {
                header("Location: ./csv_19_12_2022.php?agregado=0");
            }
            fclose($archivo);
        } else {
            echo "<p>No se ha podido abrir el archivo.</p>";
        }
    }
    if (isset($_REQUEST['agregado'])) {
        if ($_REQUEST['agregado'] == 1) {
            echo "<p class='agregado'>El alumno se ha guardado correctamente.</p>";
        }
        if ($_REQUEST['agregado'] == 0) {
            echo "<p class='error'>No se ha guardado el alumno.</p>";
        }
    }
    ?>

</body>

</html>