<?php
define("HOST", "localhost");
define("USER", "admin");
define("PASSWORD", "admin");

// Array asociativo que pasandole los parametros autoiserta los datos.
// Es necesario que las keys coincidan con los nombres de las columnas de la BBDD.
function agregarAlumno($baseDatos, $nombreTabla, $arrayDatos)
{
    $agregado = false;
    try {
        $conection = new mysqli(HOST, USER, PASSWORD, $baseDatos);
        $consultaSQL = "INSERT INTO $baseDatos.$nombreTabla (";
        $nombreTablas = "";
        $valorTablas = "";
        foreach ($arrayDatos as $key => $value) {
            $nombreTablas = $nombreTablas . "$key, ";
            if (is_int($value) | is_float($value)) {
                $valorTablas = $valorTablas . "$value, ";
            } else {
                $valorTablas = $valorTablas . "'$value', ";
            }
        }
        $nombreTablas = trim($nombreTablas, ', ');
        $valorTablas = trim($valorTablas, ', ');
        $consultaSQL = $consultaSQL . $nombreTablas . ") VALUES (" . $valorTablas . ")";
        $result = $conection->query($consultaSQL);
        if ($result) {
            $agregado = true;
        }
        mysqli_close($conection);
    } catch (mysqli_sql_exception $e) {
        // echo $e->getMessage();
        $agregado = "No se han podido agregar los datos. Error: " . $e->getMessage();
    }
    return $agregado;
}
