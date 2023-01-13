<?php

namespace App\Http\Controllers;

class Suma
{
    protected int $numero1;
    protected int $numero2;
    protected int $numero3;
    protected int $total = 0;

    function __construct($num1 = 0, $num2 = 0, $num3 = 0)
    {
        $this->numero1 = $num1;
        $this->numero2 = $num2;
        $this->numero3 = $num3;
        $this->total += $num1 + $num2 + $num3;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function textoSuma()
    {
        $texto = "";
        if ($this->numero1 != 0) {
            $texto .= " $this->numero1";
        }
        if ($this->numero1 != 0 && $this->numero2 != 0) {
            $texto .= " + ";
        }
        if ($this->numero2 != 0) {
            $texto .= " $this->numero2";
        }
        if (($this->numero2 != 0 || $this->numero1 != 0) && $this->numero3 != 0) {
            $texto .= " + ";
        }
        if ($this->numero3 != 0) {
            $texto .= " $this->numero3";
        }
        $texto .= " ";

        return $texto;
    }
}
