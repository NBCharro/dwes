<?php
require_once '../clases/conexion.php';
$con = new Conexion();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        if (!isset($_GET['nombre']) && !isset($_GET['apellidos']) && !isset($_GET['tutoria']) && count($_GET) > 0) {
            header("HTTP/1.1 404 Bad Request");
            exit;
        }
        $sql = "SELECT * FROM profesores WHERE 1";
        if (isset($_GET['nombre'])) {
            $nombre = $_GET['nombre'];
            $sql .= " AND Nombre='$nombre'";
        }
        if (isset($_GET['apellidos'])) {
            $apellidos = $_GET['apellidos'];
            $sql .= " AND Apellidos='$apellidos'";
        }
        if (isset($_GET['tutoria'])) {
            $tutoria = $_GET['tutoria'];
            $sql .= " AND Tutoria='$tutoria'";
        }
        $result = $con->query($sql);
        $alumnos = $result->fetch_all(MYSQLI_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($alumnos);
    } catch (mysqli_sql_exception $e) {
        header("HTTP/1.1 404 Not Found");
    }
    exit;
}

header("HTTP/1.1 400 Bad Request");
