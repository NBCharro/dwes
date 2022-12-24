<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 27_10_2022</title>
</head>

<body>
    <h2>FUNCIONES...</h2>
    <?php
    // FUNCIONES
    function name($param)
    {
        // CODE...
    }
    function sumar($a, $b)
    {
        return $a + $b;
    }
    $resultado = sumar(2, 3);
    $resultado = sumar(2, 3);
    // Los parametros se pasan siempre por valor
    $a = 5;
    function duplicar($a)
    {
        $a = $a * 2;
        return $a;
    };
    duplicar($a);
    echo "$a"; // Vale 5, porque pasa por valor
    // Para pasar por referencia:
    function duplicarReferencia(&$a)
    {
        $a = $a * 2;
        return $a;
    };
    duplicarReferencia($a);
    echo "$a"; // Vale 10, porque pasa por valor
    // Podemos darle un valor por defecto a los parametros
    function sumar2($a, $b = 1)
    {
        return $a + $b;
    }
    // Como es tipado debil es mejor usar IS_INT, IS_STRING, etc...
    function tipadoDebil($a, $b)
    {
        if (is_int($a) && is_int($b)) {
            return $a + $b;
        } else {
            throw new Exception('No es integer');
            // return -1;
        }
    }
    // Para llamar funciones de otro archivo usamos REQUIRE e INCLUDE
    // Ambos funcionan igual pero ante un error include salta un aviso y require salta un error fatal
    include("./RegEx_24_10_2022.php");
    // require("./RegEx_24_10_2022.php");
    // De este modo tenemos todo el codigo disponible del otro archivo, TODO, se muestran tambien las cosas sin invocarlas aqui
    echo "<h2>...LLAMADAS DE FUNCIONES</h2>";
    $multiplicacion = multiplicar(5, 20);
    echo "<p>FUNCION: $multiplicacion</p>";
    // Existen las funciones para llamarlas UNA unica vez. SIEMPRE usaremos esta
    // require_once("RegEx_24_10_2022.php");
    // include_once("RegEx_24_10_2022.php");

    ?>
</body>

</html>