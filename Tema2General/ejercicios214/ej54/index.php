<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    $usuario = "invitado";
}
if (isset($_REQUEST['login'])) {
    $usuario = $_REQUEST['usuario'];
}
if (isset($_REQUEST['signout'])) {
    unset($_SESSION['usuario']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 54</title>
    <style>
        body {
            display: block;
            margin: auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_REQUEST['signIn']) && !isset($_REQUEST['login'])) {
    ?>
        <h1>Bienvenido, <?php echo "$usuario" ?></h1>
        <form action="" method="post">
            <input type="submit" value="Sign in" name="signIn">
        </form>
    <?php
    } else if (isset($_REQUEST['login'])) {
    ?>
        <h1>Bienvenido, <?php echo "$usuario" ?></h1>
        <form action="" method="post">
            <input type="submit" value="Sign out" name="signout">
        </form>
    <?php
    } else {
    ?>
        <h1>Iniciar Sesion</h1>
        <form action="" method="post">
            <label for="usuario">Usuario </label>
            <input type="text" name="usuario" id="usuario"><br>
            <label for="password">Contraseña: </label>
            <input type="password" name="password" id="password"><br>
            <input type="submit" value="Login" name="login">
        </form>
        <h2><a href="./index.php">Volver a inicio</a></h2>
    <?php
    } ?>
</body>

</html>