<?php
require_once("./funciones.php");
if (eliminarDatos($_REQUEST['id'])) {
    header("Location: ../bootstrap_16_11_2022.php?mensaje=deleteExito");
    exit();
} else {
    header("Location: ../bootstrap_16_11_2022.php?mensaje=deleteError");
    exit();
}
