<?php

namespace App\CustomClasses;

class Suma
{
    private int $numero1;
    private int $numero2;
    private int $numero3;
    private int $total = 0;

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
        if ($this->numero2 != 0) {
            if ($this->numero1 != 0) {
                $texto .= " +";
            }
            $texto .= " $this->numero2";
        }
        if ($this->numero3 != 0) {
            if (($this->numero2 != 0 || $this->numero1 != 0)) {
                $texto .= " +";
            }
            $texto .= " $this->numero3";
        }

        $texto .= " ";

        return $texto;
    }
}
