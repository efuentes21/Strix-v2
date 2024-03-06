<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

use App\Models\Sponsor;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sponsor>
 */
class SponsorFactory extends Factory
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
            'logo' => 'logo.png',
            'address' => fake()->address(),
            'principal' => fake()->numberBetween(0, 1),
            'active' => fake()->numberBetween(0, 1)
        ];
    }
}
