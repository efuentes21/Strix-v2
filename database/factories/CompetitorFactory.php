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
            'email' => fake()->unique()->email(),
            'password' => bcrypt('admin'),
            'name' => fake()->name(),
            'address' => fake()->address(),
            'birthdate' => fake()->date(),
            'sex' => fake()->numberBetween(0, 1),
            'pro' => fake()->numberBetween(0, 1),
            'points' => fake()->numberBetween(0,5000),
            'partner' => fake()->numberBetween(0, 1),
            'active' => fake()->numberBetween(0, 1)
        ];
    }
}
