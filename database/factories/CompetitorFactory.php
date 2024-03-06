<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competitor>
 */
class CompetitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => strtoupper(Str::random(9)),
            'name' => fake()->name(),
            'address' => fake()->address(),
            'birthdate' => fake()->date(),
            'pro' => fake()->numberBetween(0, 1),
            'insurance' => fake()->numberBetween(0, 50),
            'partner' => fake()->numberBetween(0, 1),
            'active' => fake()->numberBetween(0, 1)
        ];
    }
}
