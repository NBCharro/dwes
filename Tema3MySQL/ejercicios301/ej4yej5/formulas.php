<?php
define("HOST", "localhost");
function obtenerBBDD($bd)
{
    $nombreTablas = false;
    try {
        $conection = new mysqli(HOST, $bd, $bd, $bd);
        $consultaSQL = "SHOW TABLES FROM $bd;";
        $tablas = mysqli_query($conection, $consultaSQL);
        mysqli_close($conection);
        if (mysqli_num_rows($tablas) > 0) {
            $nombreTablas = array();
            while ($tabla = mysqli_fetch_row($tablas)) {
                $nombreTablas[] = $tabla[0];
            }
        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
    return $nombreTablas;
}

function obtenerCampos($bd, $nombreTabla)
{
    $nombreCampos = false;
    try {
        $conection = new mysqli(HOST, $bd, $bd, $bd);
        $consultaSQL = "SHOW COLUMNS FROM $bd.$nombreTabla;";
        $tablas = mysqli_query($conection, $consultaSQL);
        mysqli_close($conection);
        if (mysqli_num_rows($tablas) > 0) {
            $nombreCampos = array();
            while ($tabla = mysqli_fetch_row($tablas)) {
                $nombreCampos[] = $tabla[0];
            }
        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
    return $nombreCampos;
}

function obtenerSentenciaSQL($bd, $nombreTabla, $nombreCampo, $criterio, $valorCriterio){
    $resultados = false;
    try {
        switch ($criterio) {
            case 'igual':
                $resultados = "SELECT * FROM $bd.$nombreTabla WHERE $nombreCampo=$valorCriterio;";
                break;
            case 'contiene':
                $resultados = "SELECT * FROM $bd.$nombreTabla WHERE $nombreCampo LIKE '%" . strtolower($valorCriterio) . "%' or $nombreCampo LIKE '%" . strtoupper($valorCriterio) . "%' ;";
                break;
            case 'empieza':
                $valorCriterio = strtoupper($valorCriterio);
                $resultados = "SELECT * FROM $bd.$nombreTabla WHERE $nombreCampo LIKE '" . strtolower($valorCriterio) . "%' or $nombreCampo LIKE '" . strtoupper($valorCriterio) . "%';";
                break;
            case 'termina':
                $valorCriterio = strtoupper($valorCriterio);
                $resultados = "SELECT * FROM $bd.$nombreTabla WHERE $nombreCampo LIKE '%" . strtolower($valorCriterio) . "' or $nombreCampo LIKE '%" . strtoupper($valorCriterio) . "';";
                break;
        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
    return $resultados;
}

function obtenerResultados($bd, $sentencia)
{
    $resultados = false;
    try {
        $conection = new mysqli(HOST, $bd, $bd, $bd);
        $datosBD = mysqli_query($conection, $sentencia);
        mysqli_close($conection);
        if (mysqli_num_rows($datosBD) > 0) {
            $resultados = array();
            while ($resultado = mysqli_fetch_assoc($datosBD)) {
                $resultados[] = $resultado;
            }
        }
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
    return $resultados;
}