<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disco>
 */
class DiscoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->words(5, true),
            'autor' => $this->faker->name(),
            'genero' => $this->faker->randomElement(["Pop", "Rock", "Rap", "Heavy", "Indie", "Otros"]),
            'temporada' => $this->faker->year(),
            'caratula' => $this->faker->imageUrl(100, 100, "music", true),
            'descripcion' => $this->faker->optional->paragraph(3),
            'precio' => $this->faker->randomFloat(2, 0, 99),
        ];
    }
}
