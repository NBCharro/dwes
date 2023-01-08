<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bucle FOR</title>
</head>

<body>
    <ul>
        <?php
        for ($i = 0; $i < 6; $i++) {
            echo "<li>Valor: $i</li>";
        }
        ?>
    </ul>
    <p>
        <?php
        for ($i = 0; $i <= 5; $i++) {
            echo "$i";
        }
        $i = 0;
        while ($i <= 4) {
            echo ";$i - ";
            $i++;
        }
        ?>
    </p>
    <?php
    $a = 0;
    while ($a <= 3) {
        echo "<p>While: $a</p>";
        $a++;
    }
    $b = 0;
    $c = 0;
    while ($b != 10) {
        $b = rand(1, 10);
        $c++;
        echo "<p>Random: $b -- Intento: $c</p>";
    }
    ?>
    <?php
    $d = 0;
    do {
        echo "<p>Random DOWHILE: $b -- Intento: $d</p>";
        $b = rand(1, 10);
        $d++;
    } while ($b != 5);
    ?>
    <?php
    for ($i = 0; $i < 10; $i++) {
        $temp = "nombre$i";
        $$temp = rand(1, 99);
        echo "<p>$temp:" . $$temp . "</p>";
    }
    ?>
    <?php
    // -------------IF----------------
    $nota = 6;
    if ($nota < 0 || $nota > 10) {
        echo "<h2>Error</h2>";
    } elseif ($nota = 5) {
        echo "<h2>Suficiente</h2>";
    } elseif ($nota >= 6) {
        echo "<h2>Aprobado</h2>";
    } else {
        echo "<h2>Suspenso</h2>";
    }
    ?>
    <?php
    $unidades = 6;
    $dni = "11222333A";
    $direccion = "Calle";
    if ($unidades > 5 && $dni != "" && $direccion != "") {
        echo "<h2>Pedido completado</h2>";
    } elseif (($unidades > 5 || $dni != "") && $direccion != "") {
        echo "<h2>Pedido completado</h2>";
    } elseif ($unidades) {/* Si es un 0 es false, si es positivo o negativo es true */
        echo "<h2>Pedido completado</h2>";
    } else {
        echo "<h2>No se puede completar el pedido</h2>";
    }
    ?>
    <?php
    // -------------SWITCH----------------
    switch ($nota) {
        case 0:
        case 1:
        case 2:
        case 3:
        case 4:
            echo "<h2>Suspenso</h2>";
            break;
        case 5:
        case 6:
            echo "<h2>Suficiente</h2>";
            break;
        case 7:
        case 8:
            echo "<h2>Notable</h2>";
            break;
        case 9:
        case 10:
            echo "<h2>Sobresaliente</h2>";
            break;
        default:
            echo "<h2>Error</h2>";
    }
    ?>
</body>

</html>