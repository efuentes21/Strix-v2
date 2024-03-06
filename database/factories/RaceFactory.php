<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Race>
 */
class RaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->sentence(),
            'unevenness' => fake()->numberBetween(0, 100),
            'map' => 'map_route.jpg',
            'max_competitors' => fake()->numberBetween(10, 100),
            'distance' => fake()->numberBetween(1, 25),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'start' => fake()->address(),
            'promotion' => 'promotion.jpg',
            'inscription' => fake()->numberBetween(10, 100),
            'active' => fake()->numberBetween(0, 1)
        ];
    }
}
