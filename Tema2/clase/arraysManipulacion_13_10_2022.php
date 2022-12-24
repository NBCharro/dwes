<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 13_10_2022</title>
</head>

<body>
    <?php
    // COMPARAR ARRAYS
    $valores = array("num1" => 1, "num2" => 2, "num3" => 3);
    $valores2 = array("num2" => 2, "num3" => 3, "num1" => 1);
    if ($valores == $valores2) {
        echo "Iguales";
    } else {
        echo "Distintos";
    }
    // OBTENER TAMAÑO DE UN ARRAY: sizeof() y count()
    $valores3 = array(1, 2, 3, 4);
    $cantidad = sizeof($valores3);
    echo "<p>$cantidad</p>";
    $valores3[5] = 5;
    $cantidad = sizeof($valores3);
    echo "<p>$cantidad</p>";
    // COMPROBAR SI UN ELEMENTO ESTA EN EL ARRAY
    $valores4 = array(10, 11, 12, 13, 14);
    if (in_array(2, $valores4)) {
        echo "<p>SI esta en el array</p>";
    } else {
        echo "<p>NO esta en el array</p>";
    }
    ?>
    <!-- ARRAYS MULTIDIMENSIONALES -->
    <?php
    echo "<p>------- ORDENAR ARRAYS MULTIDIMENSIONALES-------</p>";
    $bidimensional = array(
        array("camisa", "L", 29.95),
        array("pantalon", "XL", 79.95),
        array("calcetines", "", 9.95),
        array("calcetines", "S", 5.95),
        array("jersey", "M", 25.95)
    );
    function compara($x, $y)
    {
        // En este caso vamos a ordenar por tipo: camisa, pantalo, etc.
        // Si quisieramos ordenar por precio tendriamos que poner: if ($x[2] == $y[2]) ...
        if ($x[0] == $y[0])
            // Cuando llegamos calcetin es el mismo articulo, asi que tenemos que ordenar con otro criterio
            if ($x[2] == $y[2])
                // Si son calcetines a mismo precio habria que ordenar por [1] con otro IF-ELSEIF
                return 0;
            elseif ($x[2] < $y[2])
                return -1;
            else
                return 1;
        elseif ($x[0] < $y[0])
            return -1;
        else
            return 1;
    };
    usort($bidimensional, 'compara');
    echo "<pre>";
    print_r($bidimensional);
    echo "</pre>";
    // Ordenar arrays asociativos
    $bidimensionalAsociativo = array(
        array("nombre" => "camisa", "talla" => "L", "precio" => 29.95),
        array("nombre" => "pantalon", "talla" => "XL", "precio" => 79.95),
        array("nombre" => "calcetines", "talla" => "", "precio" => 9.95),
        array("nombre" => "calcetines", "talla" => "S", "precio" =>  5.95),
        array("nombre" => "jersey", "talla" => "M", "precio" => 25.95)
    );
    function comparaAsociativo($x, $y)
    {
        if ($x["nombre"] == $y["nombre"])
            if ($x["precio"] == $y["precio"])
                return 0;
            elseif ($x["precio"] < $y["precio"])
                return -1;
            else
                return 1;
        elseif ($x["nombre"] < $y["nombre"])
            return -1;
        else
            return 1;
    };
    usort($bidimensionalAsociativo, 'comparaAsociativo');
    echo "<pre>";
    print_r($bidimensionalAsociativo);
    echo "</pre>";
    ?>
    <!-- DESPLAZAMIENTO EN MATRICES -->
    <?php
    echo "<p>------- DESPLAZAMIENTO EN MATRICES-------</p>";
    $valores = array(2, 5, 4, 6, 7, 8);
    reset($valores);
    $currentValor = current($valores); // Me devuelve 2
    echo "<p>$currentValor</p>";
    next($valores);
    next($valores);
    $currentValor = current($valores); // Me devuelve 4
    echo "<p>$currentValor</p>";
    prev($valores);
    $currentValor = current($valores); // Me devuelve 5
    echo "<p>$currentValor</p>";
    end($valores);
    $currentValor = current($valores); // Me devuelve 8
    echo "<p>$currentValor</p>";
    ?>
    <!-- ARRAY_MULTISORT -->
    <?php
    echo "<p>------- ARRAY_MULTISORT() -------</p>";
    $articulos = array("camisa", "pantalon", "chandal", "falda");
    $marcas = array("blueberry", "levis", "adidas", "mango");
    $precios = array(29.95, 49.95, 72, 36);
    echo "<pre>";
    print_r($articulos);
    print_r($marcas);
    print_r($precios);
    echo "</pre>";
    // Lo movimientos hechos en el array se realizan igual en los siguientes arrays.
    array_multisort($articulos, SORT_ASC, SORT_NATURAL, $marcas, $precios);
    // Primero se ordena el primer array, se transmiten los cambios y despues se hace lo mismo con el siguiente array
    array_multisort($articulos, SORT_ASC, SORT_NATURAL, $marcas, SORT_ASC, SORT_NATURAL, $precios);
    // echo "<pre>";
    // print_r($articulos);
    // print_r($marcas);
    // print_r($precios);
    // echo "</pre>";
    // Ahora vamos a hacerlo en arrays multidimensionales
    $articulos = array("camisa", "pantalon", "chandal", "falda");
    $marcas = array("blueberry", "levis", "adidas", "mango");
    $precios = array(29.95, 49.95, 72, 36);
    $totalArticulos = array();
    for ($i = 0; $i < count($articulos); $i++) {
        $totalArticulos[] = array(
            "nombre" => $articulos[$i],
            "marca" => $marcas[$i],
            "precio" => $precios[$i],
        );
    }
    // Ordenamos el primer array y se arrastra el cambio al array multidimensional
    array_multisort($articulos, SORT_ASC, SORT_NATURAL, $totalArticulos);
    array_multisort($articulos, SORT_DESC, SORT_NATURAL, $marcas, SORT_ASC, $totalArticulos);
    echo "<pre>";
    print_r($totalArticulos);
    echo "</pre>";
    // Si no tengo arrays unidimensionales, solo uno multidimensional
    $totalArticulosUnico = array(
        array(
            "nombre" => "pantalon",
            "marca" => "levis",
            "precio" => 49.95
        ),
        array(
            "nombre" => "falda",
            "marca" => "mango",
            "precio" => 36
        ),
        array(
            "nombre" => "chandal",
            "marca" => "adidas",
            "precio" => 72
        ),
        array(
            "nombre" => "camisa",
            "marca" => "blueberry",
            "precio" => 29.95
        )
    );
    // Extraemos la columna a ordenar
    $money = array_column($totalArticulosUnico, "precio");
    array_multisort($money, SORT_ASC, $totalArticulosUnico);
    echo "<pre>";
    print_r($totalArticulosUnico);
    echo "</pre>";
    ?>
    <!-- ARRAY_WALK -->
    <?php
    echo "<p>------- ARRAY_WALK-------</p>";
    // Permite aplicar la misma funcion sobre todos los elementos de la matriz
    $precio = array(19, 23.8, 69, 54, 635, 34);
    function calculaIVAyGanacias(&$precio)
    {
        $precio = $precio * 1.10 * 1.21;
    }
    function calculaIVAyGanaciasDeMultidimensional(&$articulo)
    {
        $articulo["precio"] = $articulo["precio"] * 1.10 * 1.21;
    }
    echo "<pre>";
    print_r($precio);
    echo "</pre>";
    array_walk($precio, "calculaIVAyGanacias");
    echo "<pre>";
    print_r($precio);
    echo "</pre>";
    ?>
</body>

</html>