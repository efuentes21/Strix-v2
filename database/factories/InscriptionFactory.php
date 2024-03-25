<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inscription>
 */
class InscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'race' => fake()->numberBetween(1, 10),
            'competitor' => fake()->numberBetween(1, 10),
            'number' => fake()->numberBetween(0, 20),
            'insurance' => fake()->numberBetween(1, 10)
        ];
    }
}
