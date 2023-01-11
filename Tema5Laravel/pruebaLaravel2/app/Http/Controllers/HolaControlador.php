<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolaControlador extends Controller
{
    public function raiz()
    {
        return view('mensaje', ['texto' => 'Página Principal']);
    }

    public function saludo($nombre = "", $apellido = "")
    {
        dump(request());
        if ($nombre == "") {
            $nombre = request()->nombre;
        }
        if ($apellido == "") {
            $apellido = request()->apellido;
        }

        if ($nombre != "" || $apellido != "") {
            $texto = "Hola $nombre $apellido";
        } else {
            $texto = "Hola Laravel";
        }

        return view('mensaje')->with(['texto' => $texto]);
    }

    public function suma($numero1 = "", $numero2 = "", $numero3 = "")
    {
        $texto = "Suma (";
        $total = 0;
        if ($numero1 == "") {
            $numero1 = request()->numero1;
        }
        if ($numero2 == "") {
            $numero2 = request()->numero2;
        }
        if ($numero3 == "") {
            $numero3 = request()->numero3;
        }

        $texto .= " $numero1";
        $total += $numero1;
        if ($numero1 != "" && $numero2 != "") {
            $texto .= " + ";
        }
        $texto .= " $numero2";
        $total += $numero2;
        if (($numero2 != "" || $numero1 != "") && $numero3 != "") {
            $texto .= " + ";
        }
        $texto .= " $numero3";
        $total += $numero3;
        $texto .= " ) = $total";
        // $total = sumarNumeros($numero1, $numero2, $numero3);
        // $texto = textoSuma($numero1, $numero2, $numero3, $total);
        return view('suma', ['texto' => $texto]);
    }

    private function sumarNumeros($numero1 = "", $numero2 = "", $numero3 = "")
    {
        $total = 0;
        $total += $numero1;
        $total += $numero2;
        $total += $numero3;
        return $total;
    }

    private function textoSuma($numero1 = "", $numero2 = "", $numero3 = "", $total)
    {
        $texto = "Suma (";
        $texto .= " $numero1";
        if ($numero1 != "" && $numero2 != "") {
            $texto .= " + ";
        }
        $texto .= " $numero2";
        if (($numero2 != "" || $numero1 != "") && $numero3 != "") {
            $texto .= " + ";
        }
        $texto .= " $numero3";
        $texto .= " ) = $total";
        return $texto;
    }
}
