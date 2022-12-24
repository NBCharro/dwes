<?php
if (isset($_COOKIE['usuario'])) {
    $user = $_COOKIE['usuario']; // Recojo el valor creada anteriormente
    setcookie("usuario", "", time() - 3600);
}else{
    $user = "No existe";
}
?>
<?php 
// SESIONES
session_start(); // Es lo unico que tiene que estar antes del HTML, lo otro en cualquier parte del codigo
if (isset($_SESSION['usuarioSesion'])) {
    $usuarioSesion = $_SESSION['usuarioSesion'];
}else{
    $usuarioSesion = "No existe";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dia 02_11_2022</title>
</head>

<body>
    <?php
    echo "<h2>PAGINA 2</h2>";
    ?>
    <?php echo "<p>Usuario: $user</p>"; ?>
    <?php echo "<p>Usuario: $usuarioSesion</p>"; ?>
    <?php 
    $_SESSION["usuarioSesion"] = "Pepe";
    echo "<p>Usuario: $usuarioSesion</p>"; 
    $alumno3 = array("Benito", "Gengibre", 55);
    $_SESSION["alumnos"][] = $alumno3;
    ?>
    <h2><a href="./mantenerEstado_02_11_2022.php">Volver</a></h2>
    <?php 
    echo "<pre>";
    print_r($_SESSION["alumnos"]);
    echo "<pre>";
    ?>
</body>

</html>