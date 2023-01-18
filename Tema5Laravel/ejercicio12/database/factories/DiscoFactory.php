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
            'titulo' => $this->faker->company(100),
            'autor' => $this->faker->name(50),
            'genero' => $this->faker->text(20),
            'temporada' => $this->faker->year(),
            'caratula' => $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
