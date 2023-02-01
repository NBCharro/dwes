<?php
class Saludo
{
    /**
     * @param string $nombre
     * @return string $saludo
     */
    public function hola($nombre = '')
    {
        if ($nombre == '') {
            $nombre = 'desconocido';
        }
        return "Saludo: Hola, {$nombre}";
    }

    /**
     * @param string $palabra
     * @return string $palabraAlreves
     */
    public function alreves($palabra = '')
    {
        if ($palabra == '') {
            $palabra = 'desconocido';
        }
        return "Alreves ($palabra): " . strrev($palabra);
    }

    /**
     * @param string $numero
     * @return string $factorial
     */
    public function factorial($numero = '')
    {
        if ($numero == '') {
            $numero = 'desconocido';
        }
        $factorial = 1;
        for ($i = $numero; $i > 1; $i--) {
            $factorial *= $i;
        }
        return "Factorial ($numero): $factorial";
    }
}
