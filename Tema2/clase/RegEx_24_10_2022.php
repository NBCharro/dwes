<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 24_10_2022</title>
</head>

<body>
    <!-- Expresiones regulares -->
    <h1>Expresiones regulares</h1>
    <?php
    $patron = "#....#"; // 5 Caracteres cualquiera
    $patron = "#[aeiou]#"; // caracteres validos, 1 solo de ellos
    $patron = "#[a-zA-Z]#"; // Entre la A a la Z en mayusculas y minusculas SIN acentos. 1 Solo caracter
    $patron = "#[a-zA-Z0-9]#"; // Todas las letras y numeros SIN acentos.
    $patron = "#[^aeiouX]#"; // NO vocales ni X mayuscula
    // CLASES PREDEFINIDAS
    $patron = "#[[:alnum:]]#"; //  Caracteres alfanuméricos.
    $patron = "#[[:alpha:]]#"; //  Caracteres alfabéticos.
    $patron = "#[[:lower:]]#"; //  Letras minúsculas.
    $patron = "#[[:upper:]]#"; //  Letras mayúsculas.
    $patron = "#[[:digit:]]#"; //  Dígitos decimales.
    $patron = "#[[:xdigit:]]#"; //  Dígitos hexadecimales.
    $patron = "#[[:punct:]]#"; //  Puntuación.
    $patron = "#[[:blank:]]#"; //  Tabuladores y espacios.
    $patron = "#[[:space:]]#"; //  Espacios en blanco.
    $patron = "#[[:cntrl:]]#"; //  Caracteres de control.
    $patron = "#[[:print:]]#"; //  Caracteres imprimibles.
    $patron = "#[[:graph:]]#"; //  Caracteres imprimibles excepto espacio
    // REPETICION
    $patron = "#[0-9]*#"; // Puede haber 0 o mas numeros
    $patron = "#[0-9]+#"; // Almenos 1 numero
    $patron = "#[a-z]{2}#"; // Exactamente 2 letras minusculas
    $patron = "#[a-z]{2,4}#"; // Entre 2 y 4 letras minusculas
    $patron = "#[a-z]{2,}#"; // Minimo 2 letras minusculas
    // SUBEXPRESIONES
    $patron = "#ab+#"; // Una A y una o mas B
    $patron = "#(ab)+#"; // Una o mas AB
    // ANCLAJES
    $patron = "#^[abc]#"; // Tiene que empezar por abc
    $patron = "#[xyv]$#"; // Tiene que acabar por xyz
    $patron = "#^A[0-9](XY)$#"; // Tiene que empezar por A, luego un numero y luego acabar en XY
    // OPCION
    $patron = "#A|B#"; // O la A o la B que es igual que [AB]
    $patron = "#(com)|(es)|(ecu)#"; // Para estos casos es mejor con la |
    // CARACTERES ESPECIALES
    $patron = "#\\\.#"; // La barra izquierda toma como literal, es decir, busca el . y como PHP es un caracter especial pues hay que poner 2 \
    $patron = "#[\\\\]#"; // Para poner 1 \
    $patron = "#[\\\$]#"; // Para poner 1 $
    // MODIFICADORES
    $patron = '#php#i'; // La i indica que no diferencia entre mayusculas y minusculas
    $patron = '#php#p'; // La p delimita la palabra: espacio delante y espacio detras
    $patron = '#php#b'; // La b delimita a una unica palabra: entre espacios en blanco
    // FUNCIONES
    // Comprobar si existe el patron
    $patron = "#A.B#"; // 
    $texto = "AgBsasfABAHBsasfAAgBAgBAgB";
    if (preg_match($patron, $texto, $coincidencias, PREG_OFFSET_CAPTURE, 10)) { // Devuelve 1 si existe el patron y 0 si no existe
        // PREG_OFFSET_CAPTURE guarda la posicion de la coincidencia
        // 10 posicion a partir de la que guarda
        echo "Patron encontrado con " . count($coincidencias) . " coincidencias";
    } else {
        echo "Patron NO encontrado";
    }
    echo "<pre>";
    print_r($coincidencias);
    echo "</pre>";
    // Sustituir patrones
    $patron = "#[0-9]{7,8}[A-Z]#";
    $censura = "xxxxxxxxxX";
    $texto = "Hola, mi DNI es 11222333Z y otro DNI es 9888777B";
    $textoCensurado = preg_replace($patron, $censura, $texto);
    // Si patron y censura son arrays, cambia cada elemento del primero por su misma posicion del segundo
    // patron = array("#[0-9]{7,8}[A-Z]#", "#[A-Z]#") 
    // censura = array("xxX", "LETRAUNICA") 
    // $textoCensurado = "Hola, mi DNI es xxX LETRAUNICA otro DNI es xxX";
    echo "<p>$texto</p>";
    echo "<p>$textoCensurado</p>";
    $textoCensurado = preg_replace($patron, $censura, $texto, 5, $cantidadSustituciones); // Hasta 5 cambios y almacena la cantidad de sustituciones
    // Dividir cadenas mediante patron
    $patron = "#[0-9]{7,8}[A-Z]#";
    $texto = "Hola, mi DNI es 11222333Z y otro DNI es 9888777B";
    $division = preg_split($patron, $texto);
    echo "<pre>";
    print_r($division);
    echo "</pre>";
    $division = preg_split($patron, $texto, 5, $cantidadSustituciones); // Hasta 5 cambios y se guarda la cantidad de sustituciones




    // Codigo para funciones_27_10_2022
    function multiplicar($a, $b)
    {
        return $a * $b;
    };
    ?>
</body>

</html>