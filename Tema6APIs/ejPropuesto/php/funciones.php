<?php
function obtenerDatos($nombreBuscado, $apellidoBuscado, $tituloBuscado, $familiaBuscado)
{
    if ($nombreBuscado == '' && $apellidoBuscado == '' && $tituloBuscado == '' && $familiaBuscado == '') {
        $todosLosPersonajes = obtenerTodosPersonajes();
        return $todosLosPersonajes;
    }
    $datosPersonajeBuscado = false;
    try {
        $uri = "https://thronesapi.com/api/v2/Characters";
        $datosJSON = file_get_contents($uri);
        $datosPersonaje = json_decode($datosJSON);
        $datosPersonajeBuscado = [];
        foreach ($datosPersonaje as $personaje) {
            if (
                (str_contains(strtolower($personaje->firstName), strtolower($nombreBuscado)) && $nombreBuscado != '')
                || ($personaje->lastName == $apellidoBuscado && $apellidoBuscado != '')
                || ($personaje->title == $tituloBuscado && $tituloBuscado != '')
                || ($personaje->family == $familiaBuscado && $familiaBuscado != '')
            ) {
                $datosPersonajeBuscado[] = [
                    "nombre" => $personaje->firstName,
                    "apellido" => $personaje->lastName,
                    "titulo" => $personaje->title,
                    "familia" => $personaje->family,
                    "imagenURL" => $personaje->imageUrl,
                ];
            }
        }
    } catch (\Throwable $e) {
        # code...
    }
    return $datosPersonajeBuscado;
}

function obtenerTodosPersonajes()
{
    $personajes = false;
    try {
        $uri = "https://thronesapi.com/api/v2/Characters";
        $datosJSON = file_get_contents($uri);
        $datosPersonajes = json_decode($datosJSON);
        $personajes = [];
        foreach ($datosPersonajes as $personaje) {
            $personajes[] = [
                "nombre" => $personaje->firstName,
                "apellido" => $personaje->lastName,
                "titulo" => $personaje->title,
                "familia" => $personaje->family,
                "imagenURL" => $personaje->imageUrl,
            ];
        }
    } catch (\Throwable $e) {
        # code...
    }
    return $personajes;
}

function obtenerFamilias()
{
    $familias = false;
    try {
        $uri = "https://thronesapi.com/api/v2/Characters";
        $datosJSON = file_get_contents($uri);
        $datosPersonajes = json_decode($datosJSON);
        $familias = [];
        foreach ($datosPersonajes as $familia) {
            if (!in_array($familia->family, $familias) && $familia->family != "") {
                $familias[] = $familia->family;
            }
        }
        sort($familias);
    } catch (\Throwable $e) {
        # code...
    }
    return $familias;
}
