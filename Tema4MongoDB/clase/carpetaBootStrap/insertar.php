<?php
require_once("./funciones.php");
if (!isset($_REQUEST['btnInsertar'])) {
    header("Location: ./bootstrap_15_12_2022.php?mensaje=invalido");
    exit();
}
if (empty($_REQUEST['nombre']) || empty($_REQUEST['categoria']) || empty($_REQUEST['proveedor']) || empty($_REQUEST['precio']) || empty($_REQUEST['cantidadPorUnidad']) || empty($_REQUEST['unidadesEnStock'])) {
    header("Location: ./bootstrap_15_12_2022.php?mensaje=faltanDatos");
    exit();
}
$articulo = array(
    'nombre' => $_REQUEST['nombre'],
    'categoria' => $_REQUEST['categoria'],
    'proveedor' => $_REQUEST['proveedor'],
    'precio' => $_REQUEST['precio'],
    'cantidadPorUnidad' => $_REQUEST['cantidadPorUnidad'],
    'unidadesEnStock' => $_REQUEST['unidadesEnStock'],
);
if (agregarDatos($articulo)) {
    header("Location: ./bootstrap_15_12_2022.php?mensaje=insertExito");
    exit();
} else {
    header("Location: ./bootstrap_15_12_2022.php?mensaje=insertError");
    exit();
}
