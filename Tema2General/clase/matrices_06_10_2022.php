<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 06_10_2022</title>
</head>

<body>
    <?php
    $lista = array();/* No es obligatorio pero si es recomendable */
    $lista[0] = 5;
    $lista[4] = 15;
    $lista[2] = 53.2;
    $lista[9] = "Juan";
    $lista[] = 99;
    /* Si no se indica, se introduce en la primera posicion vacia, no la 1 si no la 10 */
    for ($i = 0; $i < count($lista); $i++) {
        /* Da error porque cuenta 5 elementos, no esta definida la posicion 1 ni 3 y no llega a la 9 */
        echo "<p>Valor $i:" . $lista[$i] . "</p>";
    }
    ?>
    <?php
    echo "<p>---------------FOREACH---------------</p>";
    foreach ($lista as $indice => $variableTemporal) {
        /* NO se modifica la lista inicial, se crea una lista temporal */
        echo "<p>Indice $indice con valor $variableTemporal</p>";
    }
    ?>
    <?php
    $listaArray = array();
    $listaArray[] = 1;
    $listaArray[] = 1;
    $listaArray[] = 2;
    $listaArray[] = 3;
    $listaArray[] = 5;
    /* $listaArray=array(2,4,5,6);  En este caso sobreescribe el array*/
    $listaArray[] = array(2, 4, 6, 8); /* En este caso agrega un array dentro del array */
    foreach ($listaArray as $valor) {
        echo "<pre>$valor</pre>"; /* Da error porque no se pueden mostrar los arrays. */
        print_r($valor);/* Muestra el array, solo para comprobar no para mostrar */
    }
    echo "<p>---------------Arrays dentro de arrays---------------</p>";
    /* Para trabajar con arrays dentro de arrays: */
    foreach ($listaArray as $pos => $valor) {
        if (is_array($valor)) {
            foreach ($valor as $key => $value) {
                echo "<p>Valor [$pos, $key]: $value</p>";
            }
        } else {
            echo "<p>Valor [$pos]: $valor</p>";
        }
    }
    ?>
    <?php
    echo "<p>---------------RANGE---------------</p>";
    $rangeArray = range(1, 100, 5);/* Array automatico de 1 a 100 de 5 en 5, en valor no en indice. */
    /* $rangeArray = range("a", "z"); */
    foreach ($rangeArray as $key => $value) {
        echo "<p>Valor [$key]: $value</p>";
    }
    ?>
    <?php
    echo "<p>---------------Array desordenado---------------</p>";
    $arrayOrdenado = range(1, 5);
    shuffle($arrayOrdenado); /* Desordenar */
    foreach ($arrayOrdenado as $key => $value) {
        echo "<p>Valor [$key]: $value</p>";
    }
    sort($arrayOrdenado); /* Ordenar */
    foreach ($arrayOrdenado as $key => $value) {
        echo "<p>Valor [$key]: $value</p>";
    }
    ?>
    <?php
    echo "<p>---------------Formulario y procesado en el mismo archivo---------------</p>";
    if (!isset($_REQUEST['enviar'])) {
        /* Meto el formulario */
        /*<form action="./index.php"></form>
        <form action="#"></form>*/
    } else {
        /* Meto el procesamiento del formulario */
        /* $nombre = $_REQUEST['nombre']*/
    }
    ?>
</body>

</html>