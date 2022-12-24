<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 Ejercicio 6</title>
</head>

<body>
    <h1>Insertar datos desde un archivo CSV en la carpeta local</h1>
    <!-- Hay que cambiar php.ini y poner mysqli.allow_local_infile = On -->
    <?php
    define("HOST", "localhost");
    define("USER", "admin");
    define("PASS", "admin");
    define("BD", "escuela");
    try {
        $conection = new mysqli(HOST, USER, PASS, BD);
        $consultaSQL = "
            LOAD DATA LOCAL INFILE 'datos.csv'
            INTO TABLE alumnos 
            FIELDS TERMINATED BY ','
            OPTIONALLY ENCLOSED BY '\"'
            LINES TERMINATED BY ';\\n'
            IGNORE 1 LINES
            (nombre,apellidos,numeroCalle,localidad)
        ";
        if ($conection->query($consultaSQL)) {
            echo "<h2>Alumnos agregados: {$conection->affected_rows}</h2>";
        } else {
            echo "<h2>No se han podido agregar los datos.</h2>";
        }
        $conection->close();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    ?>
</body>

</html>