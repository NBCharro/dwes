<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 22_11_2022</title>
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
    // Conexion con el servidor. Orientada a objetos. Menos usada
    // $conectionOOP = new mysqli('localhost', 'user', 'password123', 'agenda');
    // $conectionOOP->close()
    // Conexion con el servidor. Por Procedimientos.
    // $conection = mysqli_connect(SERVIDOR, USUARIO, PASSWORD, BASEDEDATOS)
    // $conection = mysqli_connect('localhost', 'root', '', 'laescuela');
    // if (!mysqli_connect_error()) {
    //     echo "<p>Conexion establecida</p>";
    //     // Operaciones con la BD
    //     // Cerramos la conexion
    //     mysqli_close($conection);
    // } else {
    //     echo "<p>Error en la conexion</p>";
    // }
    // Ya no se usan IFs, se usa try-catch
    // try {
    //     $con = new mysqli('localhost', 'root', '', 'laescuela');
    //     // Operaciones con la BD
    //     // Cerramos la conexion
    //     mysqli_close($con);
    // } catch (mysqli_sql_exception $e) {
    //     echo "<p>No se puede realizar la operacion. Intentelo de nuevo mas tarde.</p>";
    //     // echo "$e->getMessage()";
    //     // die("Error en la BD: " . $e->getMessage());
    // }
    // Funcion sin parametros que me devuelve equipos
    // Los guardo en un array y luego juego con ellos
    // Funcion que le paso equipo y obtiene jugadores
    // Los guardo en un array y luego juego con ellos
    // Consultas SQL
    try {
        $con = new mysqli('localhost', 'escuela', 'laescuela', 'laescuela');
        $curso = "ESO1";
        $consultaSQL = "SELECT * FROM alumnos WHERE curso='$curso'";
        $resultado = mysqli_query($con, $consultaSQL);  // $conectionOOP->query($consultaSQL);
        if (mysqli_num_rows($resultado) > 0) {
            $numeroRegistros = mysqli_num_rows($resultado);
            $alumno = mysqli_fetch_row($resultado); // Como array
            $alumno2 = mysqli_fetch_row($resultado); // Como array
            $alumnoAsociativo = mysqli_fetch_assoc($resultado); // Como array asociativo
            $alumnoAsociativo2 = mysqli_fetch_assoc($resultado); // Como array asociativo alumno 2, avanza el cursor
            $campos = mysqli_fetch_fields($resultado);
            echo "<table>";
            echo "<tr>";
            foreach ($campos as $campo)
                echo "<th>{$campo->name}</th>";
            echo "</tr>";
            while ($alumnoWhile = mysqli_fetch_row($resultado)) {
                echo "<tr>";
                foreach ($alumnoWhile as $value) {
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        echo "<pre>";
        print_r($resultado); // Objeto: Nos muestra las caracteristicas
        echo "</pre>";
        echo "<p>Alumnos $curso: $numeroRegistros</p>";
        echo "<pre>";
        print_r($alumno);
        echo "</pre>";
        echo "<pre>";
        print_r($alumno2);
        echo "</pre>";
        echo "<pre>";
        print_r($alumnoAsociativo);
        echo "</pre>";
        echo "<pre>";
        print_r($alumnoAsociativo2);
        echo "</pre>";
        // Cerramos la conexion
        mysqli_close($con);
    } catch (mysqli_sql_exception $e) {
        echo "<p>No se puede realizar la operacion. Intentelo de nuevo mas tarde.</p>";
    }
    ?>
</body>

</html>