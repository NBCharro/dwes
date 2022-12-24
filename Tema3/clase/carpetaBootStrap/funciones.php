<?php
define("HOST", "localhost");
define("USER", "admin");
define("PASSWORD", "admin");
define("BD", "vendemio");
function obtenerArticulos()
{
    $datos = false;
    try {
        $conection = new mysqli(HOST, USER, PASSWORD, BD);
        $consultaSQL = "SELECT * FROM articulos;";
        $datosSQL = mysqli_query($conection, $consultaSQL);
        mysqli_close($conection);
        $datos = array();
        if (mysqli_num_rows($datosSQL) > 0) {
            while ($dato = mysqli_fetch_assoc($datosSQL)) {
                $datos[] = $dato;
            }
        }
        return $datos;
    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
    return $datos;
}

function obtenerCategorias()
{
    $categorias = false;
    try {
        $conection = new mysqli(HOST, USER, PASSWORD, BD);
        $consultaSQL = "SELECT DISTINCT categoria FROM articulos;";
        $datosDB = mysqli_query($conection, $consultaSQL);
        mysqli_close($conection);
        if (mysqli_num_rows($datosDB) > 0) {
            $categorias = array();
            while ($categoria = mysqli_fetch_row($datosDB)) {
                // while ($categoria = mysqli_fetch_assoc($datosDB)) {
                //     $categorias[] = $categoria['categoria'];
                $categorias[] = $categoria[0];
            }
        }
    } catch (mysqli_sql_exception $e) {
    }
    return $categorias;
}

// Array asociativo que pasandole los parametros autoinserta los datos.
// Es necesario que las keys coincidan con los nombres de las columnas de la BBDD.
function agregarDatos($arrayDatos)
{
    $agregado = false;
    try {
        $conection = new mysqli(HOST, USER, PASSWORD, BD);
        $nombreCampos = "";
        $valorCampos = "";
        foreach ($arrayDatos as $key => $value) {
            $nombreCampos = $nombreCampos . "$key, ";
            if (is_int($value) | is_float($value)) {
                $valorCampos = $valorCampos . "$value, ";
            } else {
                $valorCampos = $valorCampos . "'$value', ";
            }
        }
        $nombreCampos = trim($nombreCampos, ', ');
        $valorCampos = trim($valorCampos, ', ');
        $consultaSQL = "INSERT INTO articulos ($nombreCampos) VALUES ($valorCampos)";
        $result = $conection->query($consultaSQL);
        if ($result) {
            $agregado = true;
        }
        mysqli_close($conection);
    } catch (mysqli_sql_exception $e) {
        // echo $e->getMessage();
        // El mensaje de error se almacenaria en un archivo log
    }
    return $agregado;
}

function eliminarDatos($idArticulo)
{
    $eliminado = false;
    try {
        $conection = new mysqli(HOST, USER, PASSWORD, BD);
        $consultaSQL = "DELETE FROM articulos WHERE idArticulo=$idArticulo";
        $result = $conection->query($consultaSQL);
        if ($result) {
            $eliminado = true;
        }
        mysqli_close($conection);
    } catch (mysqli_sql_exception $e) {
    }
    return $eliminado;
}
