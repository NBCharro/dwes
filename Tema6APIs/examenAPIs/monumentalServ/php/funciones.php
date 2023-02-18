<?php
function obtenerTodosDatos()
{
    $datos = false;
    try {
        $uridatos = "http://localhost/BlancoCharroNelson_2023_02_16/monumentalApp/monumentos";
        $datosJSON = file_get_contents($uridatos);
        $datosDB = json_decode($datosJSON);
        if (count($datosDB) > 0) {
            $datos = [];
            foreach ($datosDB as $clase) {
                $datos[] = [
                    "id" => $clase->id,
                    "nombre" => $clase->nombre,
                    "clase" => $clase->clasificacion,
                    "tipoMonumento" => $clase->tipoMonumento,
                    "tipoConstruccion" => $clase->tipoConstruccion,
                    "periodo" => $clase->periodo,
                    "localidad" => $clase->localidad,
                    "provincia" => $clase->provincia,
                ];
            }
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    return $datos;
}

function obtenerClases()
{
    $clases = false;
    try {
        $uriClases = "http://localhost/BlancoCharroNelson_2023_02_16/monumentalApp/monumentos/?list=clasificacion";
        $clasesJSON = file_get_contents($uriClases);
        $clasesDB = json_decode($clasesJSON);
        if (count($clasesDB) > 0) {
            $clases = [];
            foreach ($clasesDB as $clase) {
                $clases[] = $clase->clasificacion;
            }
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    return $clases;
}

function obtenerPeriodos()
{
    $periodo = false;
    try {
        $uriperiodo = "http://localhost/BlancoCharroNelson_2023_02_16/monumentalApp/monumentos/?list=periodo";
        $periodoJSON = file_get_contents($uriperiodo);
        $periodoDB = json_decode($periodoJSON);
        if (count($periodoDB) > 0) {
            $periodo = [];
            foreach ($periodoDB as $clase) {
                $periodo[] = $clase->periodo;
            }
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    return $periodo;
}

function obtenerProvincias()
{
    $periodo = false;
    try {
        $uriperiodo = "http://localhost/BlancoCharroNelson_2023_02_16/monumentalApp/monumentos/?list=provincia";
        $periodoJSON = file_get_contents($uriperiodo);
        $periodoDB = json_decode($periodoJSON);
        if (count($periodoDB) > 0) {
            $periodo = [];
            foreach ($periodoDB as $clase) {
                $periodo[] = $clase->provincia;
            }
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    return $periodo;
}

function obtenerDatosFiltrados($claseFormulario, $periodoFormulario, $provinciaFormulario)
{
    $datos = false;
    try {
        $filtros = "/?";
        if ($claseFormulario != "Todos") {
            $claseFormulario = str_replace(" ", "%20", $claseFormulario);
            $filtros .= "clasificacion=$claseFormulario";
        }
        if ($periodoFormulario != "Todos") {
            if ($claseFormulario != "Todos") {
                $filtros .= "&";
            }
            $periodoFormulario = str_replace(" ", "%20", $periodoFormulario);
            $filtros .= "periodo=$periodoFormulario";
        }
        if ($provinciaFormulario != "Todos") {
            if ($claseFormulario != "Todos" || $periodoFormulario != "Todos") {
                $filtros .= "&";
            }
            $provinciaFormulario = str_replace(" ", "%20", $provinciaFormulario);
            $filtros .= "provincia=$provinciaFormulario";
        }
        $uridatos = "http://localhost/BlancoCharroNelson_2023_02_16/monumentalApp/monumentos$filtros";
        $datosJSON = file_get_contents($uridatos);
        $datosDB = json_decode($datosJSON);
        if (count($datosDB) > 0) {
            $datos = [];
            foreach ($datosDB as $clase) {
                $datos[] = [
                    "id" => $clase->id,
                    "nombre" => $clase->nombre,
                    "clase" => $clase->clasificacion,
                    "tipoMonumento" => $clase->tipoMonumento,
                    "tipoConstruccion" => $clase->tipoConstruccion,
                    "periodo" => $clase->periodo,
                    "localidad" => $clase->localidad,
                    "provincia" => $clase->provincia,
                ];
            }
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
    return $datos;
}
