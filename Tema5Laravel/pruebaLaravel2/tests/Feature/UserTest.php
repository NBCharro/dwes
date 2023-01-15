<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\CustomClasses\Suma;

// Comando crear test: php artisan make:test nombreTest

// Comando consola: php artisan test

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_conexion()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    public function test_Total_Suma()
    {
        $claseSumaTest = new Suma(1, 2, 3);
        $totalTest = $claseSumaTest->getTotal();
        $esperado = 6;
        $this->assertEquals($esperado, $totalTest);
    }

    public function test_Texto_Suma()
    {
        $claseSumaTest = new Suma(1, 2, 3);
        $textoSumaTest = $claseSumaTest->textoSuma();
        $esperado = " 1 + 2 + 3 ";
        $this->assertEquals($esperado, $textoSumaTest);
    }
}
