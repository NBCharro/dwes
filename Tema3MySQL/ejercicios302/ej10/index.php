<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 Ejercicio 10</title>
</head>

<body>
    <?php
    define("HOST", "localhost");
    define("BD", "escuela");
    try {
        $conectionComprobar = new mysqli(HOST, "admin", "admin", BD);
        $conectionInsertar = new mysqli(HOST, "transaccion", "transaccion", BD);
        mysqli_autocommit($conectionInsertar, false);
        // Ingreso BD. Transaccion.
        mysqli_begin_transaction($conectionInsertar);
        $consultaSQLInsertar = "INSERT INTO alumnos (`dni`,`nombre`,`apellidos`,`fechaNacimiento`,`tipoVia`,`nombreCalle`,`numeroCalle`,`localidad`,`telefono`) VALUES
    ('11222333X','Pedro', 'Suarez Ramos', '02/16/1985','Calle','Roma',3,'San Andres del Rabanedo', '953066903')";
        $Ingresar = $conectionInsertar->query($consultaSQLInsertar);
        // Consulta BD. Transaccion.
        $consultaSQLIngresar = "SELECT * FROM alumnos;";
        $datosSQLIngresar = mysqli_query($conectionInsertar, $consultaSQLIngresar);
        $datosIngresar = array();
        if (mysqli_num_rows($datosSQLIngresar) > 0) {
            while ($dato = mysqli_fetch_assoc($datosSQLIngresar)) {
                $datosIngresar[] = $dato;
            }
        }
        echo "<h2>Datos transaccion sin confirmar.</h2>";
        echo '<pre>';
        print_r($datosIngresar);
        echo '</pre>';
        // Consulta BD
        $consultaSQLComprobar = "SELECT * FROM alumnos;";
        $datosSQLComprobar = mysqli_query($conectionComprobar, $consultaSQLComprobar);
        $datos = array();
        if (mysqli_num_rows($datosSQLComprobar) > 0) {
            while ($dato = mysqli_fetch_assoc($datosSQLComprobar)) {
                $datos[] = $dato;
            }
        }
        echo "<h2>Datos consulta sin confirmar transaccion.</h2>";
        echo '<pre>';
        print_r($datos);
        echo '</pre>';
        // Confirmamos o no la transaccion y cerramos la conexion.
        if ($Ingresar) {
            mysqli_commit($conectionInsertar);
        } else {
            mysqli_rollback($conectionInsertar);
        }
        mysqli_close($conectionInsertar);
        // Consulta BD
        $consultaSQLComprobar = "SELECT * FROM alumnos;";
        $datosSQLComprobar = mysqli_query($conectionComprobar, $consultaSQLComprobar);
        $datos = array();
        if (mysqli_num_rows($datosSQLComprobar) > 0) {
            while ($dato = mysqli_fetch_assoc($datosSQLComprobar)) {
                $datos[] = $dato;
            }
        }
        echo "<h2>Datos transaccion con la transaccion confirmada.</h2>";
        echo '<pre>';
        print_r($datos);
        echo '</pre>';
        mysqli_close($conectionComprobar);
    } catch (Exception $e) {
        mysqli_rollback($conectionInsertar);
        mysqli_close($conectionInsertar);
        mysqli_close($conectionComprobar);
        echo $e->getMessage();
    }

    ?>
</body>

</html>