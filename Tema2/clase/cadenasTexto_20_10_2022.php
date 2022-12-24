<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 20_10_2022</title>
</head>

<body>
    <?php
    if (!isset($_REQUEST['enviar'])) {
    ?>
        <form action="#" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre"><br>
            <input type="submit" value="Enviar" name="enviar">
        </form>
    <?php
    } else {
        $nombre = $_REQUEST['nombre'];
        // $nombre = trim($_REQUEST['nombre']);
        echo "<p>**$nombre**</p>";
        $nombre = trim($nombre);
        echo "<p>**$nombre**</p>";
        $nombre = trim($nombre, "n"); // Solo elimina los exteriores, no si hay interiores
        echo "<p>**$nombre**</p>";
        // Sustituye \n en <br>
        $textoBR = "<p>Una linea\nY otra línea</p>";
        echo nl2br($textoBR);
        // Si en el texto hubiese <strong> y no queremos que HTML lo interprete:
        // htmlentities($_REQUEST['textarea']) De esta forma HTML no aplicaria formato
        // Para dar formato a las variables:
        $precio = 123.786; // Si hacemos round() perdemos la variable, y si solo queremos mostrar formato
        printf("Este es el precio: %07.2f y tiene nombre %s", $precio, $nombre); // %f float, %s string
        printf("Este es el precio: %07.2f - %0-3.1f", $precio, $precio);
        // %8f ancho total
        // %4.2 4 digitos totales(incluido el punto) y 2 decimales 
        // %07.2 rellena con 0 por la izquierda
        // %0-7.2 rellena con 0 rellena por la derecha
        $valor = sprintf("%07.2f", $precio); // En este caso podemos guardarla en otra variable, la anterior la muestra sin guardarla
        echo "<p>Este es el precio: $valor</p>";
        // Cuando trabajamos con BBDD tenemos que cuidar los caracteres especiales
        // Por ello usamos las siguientes funciones para que no las interprete en SQL. Generamos literales.
        $textoBBDD = "11222333'Z'"; // Las comillas simples no queremos que las interprete la BBDD
        $textoBBDD = "SELECT * FROM *"; // Para evitar la inyeccion en la BBDD
        $textoConBBDD = addslashes($textoBBDD); // Añadimos barras que no interpretan el caracter peligroso
        $textoSinBBDD = stripslashes($textoBBDD); // Quitamos barras que interpretan el caracter peligroso
        // Texto en mayusculas y minusculas
        $nombre = strtoupper($nombre); //La cadena en mayusculas
        $nombre = strtolower($nombre); //La cadena en minusculas
        $nombre = ucfirst($nombre); //El primer caracter en mayusculas
        $nombre = ucwords($nombre); //El primer caracter en mayusculas de cada palabra
        // Dividir y combinar cadenas
        $textoLargo = "Esto es una prueba para comprobar el uso de metodos de cadenas de texto";
        $palabras = explode(" ", $textoLargo, 10); // Crea un array donde cada palabra ocupa una posicion del array
        // El " " es el separador entre palabras, si ponemos "s" dividiria entre s
        $palabras = implode(" ", $palabras); // De un array nos da un string
        // Obtener una subcadena
        $subcadena = substr($textoLargo, 5, 10); // Desde posicion 5 con una longitud de 10 caracteres
        $subcadena = substr($textoLargo, -5, 10); // Desde posicion 5 contado por dentras
        $subcadena = substr($textoLargo, 5, -10); // Desde posicion 5 MENOS los 10 ultimos
        // Longitud de cadenas
        $longitudCadena = strlen($textoLargo);
        // Comparar cadenas
        $texto1 = "HoLa";
        $texto2 = "hOla";
        strcasecmp($texto1, $texto1); // No distingue entre minusculas y mayusculas. => true
        // Devuelve 0 si son iguales, 1 si es menor texto1 y 2 si es mayor texto1
        strnatcasecmp($texto1, $texto1); // Distingue entre minusculas y mayusculas y compara cadenas naturales. => el 2 es menor que el 12
        // Buscar y reemplazar. Ambas funcionan igual.
        $buscaString = strstr($textoLargo, "prueba"); // Devuelve lo que queda de la cadena tras esa palabra
        $buscaStringAntes = strstr($textoLargo, "prueba", true); // Devuelve lo que queda de la cadena antes de esa palabra
        $buscaCharacter = strchr($textoLargo, "c"); // Busca un caracter. Devuelve la cadena a partir de ese caracter
        $buscaString = stristr($textoLargo, "Prueba"); // Igual, no distingue entre mayusculas y minusculas
        // Otras: strrchr(), stristr(), strrchr(), strchr (), strrchr (), stristr ()
        // Devuelve la posicion
        $posicion = strpos($textoLargo, "prueba");
        $posicion = strpos($textoLargo, "prueba", 24); // A partir de la posicion 24 busca la palabra. por si antes hubiese ya encontrado la palabra
        // Reemplazar cadena
        $cadenaModificada = str_replace("prueba", "PROOF", $textoLargo); // Reemplaza todas
        $arrayNormal = array(1, 2, 1, 2, 2, 3);
        $numeroCambios = 0;
        $arrayModificado = str_replace(2, 9, $arrayNormal, $numeroCambios);
        echo "<pre>";
        print_r($arrayModificado);
        echo "</pre>";
        echo "<p>$cadenaModificada</p>";
    }
    ?>
</body>

</html>