<?php
// NOMBRE, VALOR, CADUCIDAD(=0 si se mantiene si esta el navegador abierto) hora actual mas segundos activa
// setcookie("usuario", "invitado", time() + 60);
// Acceder a una cookie. No existe la cookie la primera vez
// $user = $_COOKIE['usuario'];
if (!isset($_COOKIE['usuario'])) {
    setcookie("usuario", "invitado", time() + 60); // La creo
    header("Location: mantenerEstado_02_11_2022.php"); // Recargo la pagina
} else {
    $user = $_COOKIE['usuario']; // Recojo el valor cuando esta creaada
}
// Para ELIMINAR la cookie tenemos que restarle tiempo
// setcookie("usuario", "invitado", time() - 1);
?>
<?php 
// SESIONES
// Creamos la sesion
session_start(); // Es lo unico que tiene que estar antes del HTML, lo otro en cualquier parte del codigo
// Creamos las variables
// $_SESSION['usuario']= "Sesion invitado";
if (!isset($_SESSION['usuarioSesion'])) {
    $_SESSION['usuarioSesion']= "Sesion invitado";
}else{
    $usuarioSesion = $_SESSION['usuarioSesion'];
}
// if (!isset($_SESSION['alumnos'])) { Hay que vigilar esto que si no no para de añadir datos
if (isset($_SESSION['alumnos'])) {
    $_SESSION['alumnos']= array();
}
// Para cerrar una sesion
// unset($_SESSION['usuarioSesion']);
// Para cerrar todas las sesiones
// session_destroy(); // Se cierra la sesion pero se mantienen las variables hasta que se cierra el navegador
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
    // Si queremos que no se pierdan los datos entre comunicaciones con el servidor: cookies y sesiones
    // Cookies almacenan la informacion en el cliente, las sesiones lo almacenan en el servidor.
    // Crear cookie: deben ir SIEMPRE antes del HTML
    echo "<h2>COOKIES</h2>";
    // TODAS LAS LLAMADAS A SETCOOKIE TIENEN QUE IR ANTES DEL HTML
    // Una vez creada la cookie podemos usarla en cualquier sitio de nuestra web
    ?>
    <?php echo "<p>Usuario: $user</p>"; ?>
    <h2><a href="./2mantenerEstado_02_11_2022.php">Ir a pagina 2</a></h2>
    <?php 
    echo "<h2>SESIONES</h2>";
    // Igual que cookies pero se almacena en el lado servidor
    // La duracion de las sesiones como maximo es hasta que este abierto el navegador
    // Para crear la sesion. No hace falta recargar la pagina, se suele hacer de forma manual
    // Las sesiones SIEMPRE antes del html
    
    echo "<p>Usuario sesion: $usuarioSesion</p>";
    $alumno1 = array("Jose", "Blanco", 35);
    $alumno2 = array("Emma", "Lopez", 25);
    $_SESSION["alumnos"][] = $alumno1;
    $_SESSION["alumnos"][] = $alumno2;
    echo "<pre>";
    print_r($_SESSION["alumnos"]);
    echo "<pre>";
    ?>
</body>

</html>