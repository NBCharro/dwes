<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 Ejercicio6</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }

        form {
            text-align: center;
        }
    </style>
</head>

<body>
    <form action="#" method="post">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" required><br>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" required><br>
        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" id="apellidos" required><br>
        <label for="fechaNacimiento">Fecha de nacimiento: </label>
        <input type="date" name="fechaNacimiento" id="fechaNacimiento"><br>
        <label for="tipoVia">Tipo de via: </label>
        <select name="tipoVia" id="tipoVia">
            <option hidden></option>
            <option>Avenida</option>
            <option>Calle</option>
            <option>Callejón</option>
            <option>Camino</option>
            <option>Pasaje</option>
            <option>Plaza</option>
            <option>Travesía</option>
        </select><br>
        <label for="nombreCalle">Nombre de la calle: </label>
        <input type="text" name="nombreCalle" id="nombreCalle"><br>
        <label for="numeroCalle">Numero de la calle: </label>
        <input type="number" name="numeroCalle" id="numeroCalle" min="0"><br>
        <label for="localidad">Localidad: </label>
        <input type="text" name="localidad" id="localidad"><br>
        <label for="telefono">Teléfono: </label>
        <input type="tel" name="telefono" id="telefono"><br>
        <input type="submit" value="Agregar alumno" name="agregarAlumno">
    </form>
    <?php
    if (isset($_REQUEST['agregarAlumno'])) {
        $dni = $_REQUEST['dni'];
        $nombre = $_REQUEST['nombre'];
        $apellidos = $_REQUEST['apellidos'];
        $fechaNacimiento = $_REQUEST['fechaNacimiento'];
        $tipoVia = $_REQUEST['tipoVia'];
        $nombreCalle = $_REQUEST['nombreCalle'];
        $numeroCalle = $_REQUEST['numeroCalle'];
        $localidad = $_REQUEST['localidad'];
        $telefono = $_REQUEST['telefono'];
        $datosAlumno = array(
            "dni" => $dni,
            "nombre" => $nombre,
            "apellidos" => $apellidos,
            "fechaNacimiento" => $fechaNacimiento,
            "tipoVia" => $tipoVia,
            "nombreCalle" => $nombreCalle,
            "numeroCalle" => $numeroCalle,
            "localidad" => $localidad,
            "telefono" => $telefono,
        );
        include_once("./formulas.php");
        $alumnoAgregado = agregarAlumno("escuela", "alumnos", $datosAlumno);
        if ($alumnoAgregado) {
            echo "<h2>El alumno se ha agregado a la base de datos.</h2>";
    ?>
            <table>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Fecha de nacimiento</th>
                    <th>Tipo de via</th>
                    <th>Nombre de la calle</th>
                    <th>Número de la calle</th>
                    <th>Localidad</th>
                    <th>Telefono</th>
                </tr>
                <tr>
                    <?php
                    foreach ($datosAlumno as $value) {
                        echo "<td>$value</td>";
                    }
                    ?>
                </tr>
            </table>
    <?php
        } else {
            echo "<h2>No se ha podido agregar al alumno a la base de datos.</h2>";
        }
    }
    ?>
</body>

</html>