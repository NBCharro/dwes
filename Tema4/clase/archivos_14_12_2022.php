<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 14_12_2022</title>
</head>

<body>
    <h1>Abrir un archivo</h1>
    <?php
    $ventas = [
        ["articulo" => "Sudadera roja", "precio" => 15.99, "unidades" => 3],
        ["articulo" => "Pantalon azul", "precio" => 25.95, "unidades" => 5],
        ["articulo" => "Camiseta verde", "precio" => 35.20, "unidades" => 8]
    ];
    // Abrir archivo. Si no existe da un warning, por eso ponemos el arroba
    echo "<p>Abriendo archivo.</p>";
    @$file = fopen("./data/articulos.txt", "r");
    // Si no puede cerrarlo (pe porque no existe) da un error fatal al cerrarlo por eso el control con el IF
    if ($file) {
        // Operaciones con el archivo
        echo "<p>Archivo abierto!</p>";
        // Cerramos el archivo.
        fclose($file);
        echo "<p>Cerrando archivo.</p>";
    }
    ?>
    <h1>Escribimos un archivo</h1>
    <?php
    // El modo W sobreescribe el archivo, BORRA TODO
    // @$file = fopen("./data/articulos.txt", "w");
    // El modo A NO sobreescribe el archivo. Ademas si no existe el archivo lo crea.
    @$file = fopen("./data/articulos.txt", "a");
    // if ($file) {
    //     // Para que escriba en una linea nueva usamos \n suele ponerse al final
    //     $nuevaLinea = "Juan Perro \t ESO1 \t Villabalter\n";
    //     // Para escribir usamos fwrite(fopen(),texto, longitudCadena) o fputs()
    //     fwrite($file, $nuevaLinea);
    //     fputs($file, $nuevaLinea);
    //     fclose($file);
    //     echo "<p>Cerrando archivo.</p>";
    // }
    if ($file) {
        $fecha = date("Y-m-d H:i:s");
        $numeroRegistros = 0;
        foreach ($ventas as $venta) {
            $linea = "$fecha\t{$venta['articulo']}\t{$venta['precio']}\t{$venta['unidades']}\n";
            $linea = "$fecha,{$venta['articulo']},{$venta['precio']},{$venta['unidades']}\n";
            // Podemos darle mejor formato con printf() $linea = printf("$fecha %-30s %3d %5.2f\n", $venta['articulo'], $venta['precio'], $venta['unidades']);
            if (fwrite($file, $linea)) {
                $numeroRegistros++;
            }
        }
        echo "<p>Registros añadidos: $numeroRegistros</p>";
        if (count($ventas) == $numeroRegistros) {
            echo "<p>Se han añadido todos los registros.</p>";
        }
        fclose($file);
    }
    ?>
    <h1>Escribimos un archivo mas facilmente</h1>
    <?php
    // Hay una funcion que hace todo: abrir, escribir, cerrar llamada file_put_contents()
    if ($file) {
        $fecha = date("Y-m-d H:i:s");
        $numeroRegistros = 0;
        foreach ($ventas as $venta) {
            $linea = "$fecha,{$venta['articulo']},{$venta['precio']},{$venta['unidades']}\n";
            // No se le pasa el $file si no el path del archivo y FILE_APPEND para que no borre lo anterior (="a")
            if (file_put_contents("./data/articulos.txt", $linea, FILE_APPEND)) {
                $numeroRegistros++;
            }
        }
        echo "<p>Registros añadidos: $numeroRegistros</p>";
        if (count($ventas) == $numeroRegistros) {
            echo "<p>Se han añadido todos los registros.</p>";
        }
    }
    ?>
    <h1>Leer el archivo</h1>
    <?php
    // Con readfile(). Muestra directamente el archivo por pantalla y guarda el numero de caracteres.
    $numeroCaracteres = readfile("./data/articulos.txt");
    echo "<p>$numeroCaracteres</p>";
    // file_get_contents(). Lee el archivo y lo guarda en un String. NO lo muestra por pantalla.
    $textoFile = file_get_contents("./data/articulos.txt");
    // $textoFile = nl2br(file_get_contents("./data/articulos.txt")); // Asi mantenemos los saltos de linea
    echo "<p>$textoFile</p>";
    echo '<pre>';
    print_r($textoFile);
    echo '</pre>';
    // file(). Podemos leer linea a linea y guardarlo en un array
    $textoArray = file("./data/articulos.txt");
    // Para separar de nuevo cada linea en otro array usamos explode
    $textoArraySeparado = [];
    foreach ($textoArray as $linea) {
        $textoArraySeparado[] = explode(",", $linea);
    }
    echo '<pre>';
    print_r($textoArraySeparado);
    echo '</pre>';
    ?>
    <h1>Para leer linea a linea</h1>
    <?php
    // 
    @$file = fopen("./data/articulos.txt", "r");
    if ($file) {
        $arrayLinea = [];
        // feof es porque al final de los archivos hay una cosa para indicar que es el final del fichero. End Of File.
        while (!feof($file)) {
            $linea = fgets($file, 1024);
            // El feof es una linea vacia asi que no queremos guardarla en el array.
            if ($linea != "") {
                $arrayLinea[] = explode(",", $linea);
            }
        }
        fclose($file);
        echo '<pre>';
        print_r($arrayLinea);
        echo '</pre>';
    }
    ?>
</body>

</html>