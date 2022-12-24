<?php
// a. Un número DNI correcto.
$patronDNI = "#[0-9]{7,8}[A-Z]#";
// b. Un número de teléfono fijo o móvil.
$patron = "#[0-9]{9}#";
// c. Un nombre de un archivo válido con extensión php, css, html, html (MsDOS).
$patron = "#^[[:alnum:]]{1,}\.(php|css|html)$#";
// d. Una fecha (dd/mm/aaaa ó dd-mm-aaaa).
$patron = "#^[0-9]{1,2}(\/|\-)[0-9]{1,2}(\/|\-)[0-9]{4}$#";
// e. Una dirección IPv4.
$patron = "#^((25[0-5]|(2[0-4]|1[0-9]|[1-9]|)[0-9])(\.)?){4}$#";
// f. Una dirección de correo electrónico válida en un dominio .com, .org ó .es
$patron = "#^[[:alnum:]]*@[[:alnum:]]*(\.)(com|org|es)$#";
