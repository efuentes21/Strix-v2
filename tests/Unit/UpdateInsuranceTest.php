<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Insurance;

class InsuranceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test updating an existing insurance.
     */
    public function test_update_insurance(): void
    {
        $insurance = Insurance::where('cif', 'A12334567')->first();

        if ($insurance) {
            $insurance->update([
                'name' => 'updated insurance',
                'address' => 'new address',
                'price' => 45,
                'active' => false
            ]);

            $this->assertDatabaseHas('insurances', [
                'cif' => 'A12334567',
                'name' => 'updated insurance',
                'address' => 'new address',
                'price' => 45,
                'active' => false
            ]);
        } else {
            $this->assertTrue(false, 'Insurance with CIF A12334567 not found.');
        }
    }
}
