<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 10_10_2022</title>
</head>

<body>
    <?php
    /* ARRAY ASOCIATIVO */
    $arrayAsociativo = array(
        "alumno1" => array(
            "nombre" => "Jose", "apellidos" => "Lopez", "curso" => "primero", "año" => 2020
        ), array(
            "nombre" => "Pepe", "apellidos" => "Benito", "curso" => "Segundo", "año" => 2023
        )
    );
    ?>
    <!-- Podemos usarlo para los formularios -->
    <?php
    /* foreach ($_REQUEST as $campo => $valor)
        echo "$campo: $valor <br/>"; */
    ?>
    <!-- Array bidimensional asociativo -->
    <?php
    $ferral = array("Villabalter" => "0-1", "Azadinos" => "1-0", "Ferral" => "-");
    $resultados = array(
        "Villabalter" => array("Villabalter" => "-", "Azadinos" => "2-0", "Ferral" => "2-1"),
        "Azadinos" => array("Villabalter" => "0-3", "Azadinos" => "-", "Ferral" => "2-2"),
        "Ferral" => $ferral
    );
    echo "<pre>";
    print_r($resultados);
    echo "</pre>";
    $res = $resultados['Villabalter']['Ferral'];
    echo "<h3>Villabalter $res Ferral</h3>";
    $res = $resultados['Ferral']['Azadinos'];
    echo "<h3>Ferral $res Azadinos</h3>";
    ?>

</body>

</html>