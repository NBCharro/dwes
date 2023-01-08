<?php
require_once("./funciones.php");
if (!isset($_REQUEST['btnInsertar'])) {
    header("Location: ../bootstrap_16_11_2022.php?mensaje=invalido");
    exit();
}
if (empty($_REQUEST['nombre']) || empty($_REQUEST['categoria']) || empty($_REQUEST['descripcion']) || empty($_REQUEST['precio'])) {
    header("Location: ../bootstrap_16_11_2022.php?mensaje=faltanDatos");
    exit();
}
$articulo = array(
    'nombre' => $_REQUEST['nombre'],
    'categoria' => $_REQUEST['categoria'],
    'descripcion' => $_REQUEST['descripcion'],
    'precio' => $_REQUEST['precio'],
);
if (agregarDatos($articulo)) {
    header("Location: ../bootstrap_16_11_2022.php?mensaje=insertExito");
    exit();
} else {
    header("Location: ../bootstrap_16_11_2022.php?mensaje=insertError");
    exit();
}
