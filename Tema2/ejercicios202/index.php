<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ejercicios 201</title>
</head>
<body>
    <?php
        echo "<h1>Ejercicio 6</h1>";
        define ("PI",3.1416);
        echo "<p>".PI."</p>";
        $radio = 5;
        $longitud = 2*PI*$radio;
        $area=PI*$radio*$radio;
        echo "<p>Area: $area</p>";
        echo "<p>Longitud: $longitud</p>";
        echo "<h1>Ejercicio 7</h1>";
        $valor1 = 8;
        $valor2 = 3;
        $suma = $valor1 + $valor2;
        echo "<p>".$valor1+$valor2."</p>";
        echo "<p>$suma</p>";
        $resto = $valor1 % $valor2;
        echo "<p>$resto</p>";
        echo "<p>".++$valor1."</p>";
        echo "<h1>Ejercicio 8</h1>";
        $num1 = 7;
        $num2 = 5;
        $result = &$num1;
        $result += ++$num1;
        echo "<p>$num1</p>";
        echo "<p>$num2</p>";
        echo "<p>$result</p>";
        echo "<h1>Ejercicio 9</h1>";
        $num3 = 0;
        $num4 = 0.0;
        echo var_dump ($num3==$num4);
        echo "<h1>Ejercicio 10</h1>";
        $num1 = 5.5;
        $num2 = &$num1;
        echo "<br>num1: $num1 - num2: $num2";
        echo "<br>Existe la variable num1: ";
        var_dump(isset($num1));
        echo "<br>Esta vacía la variable num1: ";
        var_dump(empty($num1));
        echo "<br>Es de tipo entero la variable num1: ";
        var_dump(is_int($num1));
        echo "<br>Es de tipo real la variable num1: ";
        var_dump(is_float($num1));
        unset ($num1);
        echo "<br>Existe la variable num1: ";
        var_dump(isset($num1));
        echo "<br>Existe la variable num2: ";
        var_dump(isset($num2));
        echo "<br>num1: ".@$num1." - num2: $num2";
    ?>
</body>
</html>