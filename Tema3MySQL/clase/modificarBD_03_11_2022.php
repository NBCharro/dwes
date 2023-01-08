<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    try {
        define("HOST", "localhost");
        define("USER", "nba");
        define("PASSWORD", "nba");
        define("BD", "nba");
        $equipos = false;
        $conection = new mysqli(HOST, USER, PASSWORD, BD);
        $consultaEquipos = "SELECT * FROM equipos";
        $equiposNBA = mysqli_query($conection, $consultaEquipos);
        mysqli_close($conection);
        if (mysqli_num_rows($equiposNBA) > 0) {
            $equipos = array();
            while ($equipo = mysqli_fetch_assoc($equiposNBA)) {
                $equipos[] = $equipo;
            }
        }
        // INSERTAR DATOS EN LA BASE DE DATOS
        $conection = new mysqli(HOST, USER, PASSWORD, BD);
        $consultaBD = "INSERT INTO equipos VALUES ('Baloncesto Leon', 'Leon', '', 'España');";
        if($conection->query($consultaBD)){
            $cambios = $conection->affected_rows;
        } else{
            echo "<p>El equipo ya existe</p>";
        }
        echo "<p>Equipos insertados: $cambios</p>";
        mysqli_close($conection);
        // ELIMINAR REGISTROS
        $conection = new mysqli(HOST, USER, PASSWORD, BD);
        $consultaBD = "DELETE FROM equipos WHERE division='España'";
        if($conection->query($consultaBD)){
            $eliminados = $conection->affected_rows;
        }
        echo "<p>Equipos eliminados de España: $eliminados</p>";
        $consultaBD = "DELETE FROM equipos WHERE division='Francia'";
        if($conection->query($consultaBD)){
            $eliminados = $conection->affected_rows;
        }
        echo "<p>Equipos eliminados de Francia: $eliminados</p>";
        mysqli_close($conection);
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
    ?>
</body>

</html>