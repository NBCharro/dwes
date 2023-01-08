<?php
setcookie("usuario", "invitado", time() + 60);
if (!isset($_COOKIE['usuario'])) {
	setcookie("usuario", "invitado", time() + 60);
} else {
	$user = $_COOKIE['usuario'];
}
// Para ELIMINAR la cookie tenemos que restarle tiempo
setcookie("usuario", "invitado", time() - 1);
