<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->text(50),
            'descripcion' => $this->faker->paragraph(1),
            'precio' => $this->faker->randomFloat(2, 0.01, 1000),
            'envio' => $this->faker->randomElement(['S', 'N']),
            'stock' => $this->faker->numberBetween(0, 10000),
            'observaciones' => $this->faker->optional->paragraph(3),
            // 'imagen' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
