<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Challenge>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cif' => 'F19065622',
            'name' => 'Strix Inc.',
            'address' => 'c/ la Pineda',
            'logo' => 'logo',
            'account' => 'account',
            'principal_price' => 100,
            'partner_price' => 50,
        ];
    }
}
