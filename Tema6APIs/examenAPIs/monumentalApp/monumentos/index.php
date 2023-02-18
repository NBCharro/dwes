<?php
require_once '../conexion/conexion.php';
$con = new Conexion();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sql = "SELECT * FROM monumentos WHERE 1";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql .= " AND id='$id'";
    } elseif (isset($_GET['clasificacion']) || isset($_GET['periodo']) || isset($_GET['provincia'])) {
        if (isset($_GET['clasificacion'])) {
            $clasificacion = $_GET['clasificacion'];
            $sql .= " AND clasificacion='$clasificacion'";
        }
        if (isset($_GET['periodo'])) {
            $periodo = $_GET['periodo'];
            $sql .= " AND periodo='$periodo'";
        }
        if (isset($_GET['provincia'])) {
            $provincia = $_GET['provincia'];
            $sql .= " AND provincia='$provincia'";
        }
    } elseif (isset($_GET['list'])) {
        $list = $_GET['list'];
        if ($list == 'clasificacion') {
            $sql = "SELECT DISTINCT clasificacion FROM monumentos";
        }
        if ($list == 'tipoMonumento') {
            $sql = "SELECT DISTINCT tipoMonumento FROM monumentos";
        }
        if ($list == 'tipoConstruccion') {
            $sql = "SELECT DISTINCT tipoConstruccion FROM monumentos";
        }
        if ($list == 'periodo') {
            $sql = "SELECT DISTINCT periodo FROM monumentos";
        }
        if ($list == 'provincia') {
            $sql = "SELECT DISTINCT provincia FROM monumentos";
        }
    } elseif (count($_GET) > 0) {
        header("HTTP/1.1 404 Bad Request");
        exit;
    }
    try {
        $result = $con->query($sql);
        $monumentos = $result->fetch_all(MYSQLI_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($monumentos);
    } catch (mysqli_sql_exception $e) {
        header("HTTP/1.1 404 Not Found");
    }
    exit;
}
header("HTTP/1.1 400 Bad Request");
