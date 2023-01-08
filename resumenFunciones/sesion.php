<?php
session_start();
if (!isset($_SESSION['usuarioSesion'])) {
	$_SESSION['usuarioSesion'] = "Sesion invitado";
} else {
	$usuarioSesion = $_SESSION['usuarioSesion'];
}
// Para cerrar una determinada sesion
unset($_SESSION['usuarioSesion']);
// Para cerrar todas las sesiones
session_destroy();
