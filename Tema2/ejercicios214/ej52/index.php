<?php
$tiempo = time() + 3600;
if (!isset($_COOKIE['numeroVisitas'])) {
    setcookie("numeroVisitas", 1, $tiempo);
    header("Location: mantenerEstado_02_11_2022.php");
} else {
    $numeroVisitas = $_COOKIE['numeroVisitas'];
    setcookie("numeroVisitas", $numeroVisitas + 1, $tiempo);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 52</title>
    <style>
        img {
            width: 150px;
        }
    </style>
</head>

<body>
    <h1>Número de visitas</h1>
    <?php echo "<p>$numeroVisitas</p>"; ?>
    <?php
    if ($numeroVisitas % 2 == 0) {
        $imagen = "numeroPar.jpg";
    } else {
        $imagen = "numeroImpar.png";
    }
    ?>
    <img src="./imagenes/<?php echo "$imagen"; ?>" alt="Imagen del numero">
</body>

</html>