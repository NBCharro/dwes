<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <?php
    if (isset($_REQUEST['enviar'])) {
        $num1 = intval($_REQUEST['num1']);
        $num2 = intval($_REQUEST['num2']);
        $operacion = $_REQUEST['operacion'];
        $resultado = 0;
        switch ($operacion) {
            case 'suma':
                $resultado = $num1 + $num2;
                break;
            case 'resta':
                $resultado = $num1 - $num2;
                break;
            case 'multiplicacion':
                $resultado = $num1 * $num2;
                break;
            case 'division':
                if ($num2 == 0) {
                    $resultado = "No se puede dividir entre 0";
                } else {
                    $resultado = $num1 / $num2;
                };
                break;
            case 'modulo':
                if ($num2 == 0) {
                    $resultado = "No se puede dividir entre 0";
                } else {
                    $resultado = $num1 % $num2;
                };
                break;
        }
        echo "<h2>El resultado de la operación de $operacion entre $num1 y $num2 es:<br> $resultado</h2>";
    } else {
        echo "<h2>Error</h2>";
    }
    ?>
    <h2><a href="../index.html">Volver</a></h2>
</body>

</html>