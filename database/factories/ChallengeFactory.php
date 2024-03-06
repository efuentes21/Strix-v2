<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Challenge;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Challenge>
 */
class ChallengeFactory extends Factory
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
            'active' => fake()->numberBetween(0, 1)
        ];
    }
}
