<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Insurance;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insurance>
 */
class InsuranceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cif' => strtoupper(Str::random(9)),
            'name' => fake()->name(),
            'address' => fake()->address(),
            'price' => fake()->numberBetween(25, 75),
            'active' => fake()->numberBetween(0, 1)
        ];
    }
}
