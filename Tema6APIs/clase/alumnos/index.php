<?php
require_once '../clases/conexion.php';
$con = new Conexion();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    try {
        $sql = "SELECT * FROM alumnos WHERE 1";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql .= " AND id_alumno='$id'";
        } elseif (isset($_GET['curso'])) {
            $curso = $_GET['curso'];
            $sql .= " AND curso='$curso'";
        }
        // Cuando ya no tengo mas parametros a los que responder hago lo siguiente
        // Si me pasan parametros pero no los reconozco (id, curso) entonces que devuelva error
        // Porque si no seguiria la ejecucion
        elseif (count($_GET) > 0) {
            header("HTTP/1.1 404 Bad Request");
            exit;
        }
        $result = $con->query($sql);
        $alumnos = $result->fetch_all(MYSQLI_ASSOC);
        header("HTTP/1.1 200 OK");
        echo json_encode($alumnos);
    } catch (mysqli_sql_exception $e) {
        header("HTTP/1.1 404 Not Found");
    }
    // Si todo ha ido bien, no ejecuto nada mas:
    exit;
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     Guardo alumno
// }

// Si no me llega GET ni POST mando mensaje de error:
header("HTTP/1.1 400 Bad Request");
