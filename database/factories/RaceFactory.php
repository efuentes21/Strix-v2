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
            'name' => fake()->name(),
            'description' => fake()->sentence(),
            'unevenness' => fake()->numberBetween(0, 100),
            'map' => 'map_route.jpg',
            'max_competitors' => fake()->numberBetween(10, 100),
            'distance' => fake()->numberBetween(1, 25),
            'date' => fake()->dateTimeBetween('2024-01-01', '2030-12-31')->format('Y-m-d'),
            'time' => fake()->time(),
            'start' => fake()->address(),
            'promotion' => 'promotion.jpg',
            'inscription' => fake()->numberBetween(10, 100),
            'active' => fake()->numberBetween(0, 1)
        ];
    }
}
