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
     * A basic feature test example.
     */
    public function test_create_insurance(): void
    {
        if($this->assertDatabaseMissing('insurances', ['cif' => 'A12334567'])){
            Insurance::factory()->create([
                'cif' => 'A12334567',
                'name' => 'testing insurance',
                'address' => 'la Pineda',
                'price' => 33,
                'active' => true
            ]);
    
            $this->assertDatabaseHas('insurances', [
                'cif' => 'A12334567',
                'name' => 'testing insurance',
                'address' => 'la Pineda',
                'price' => 33,
                'active' => true
            ]);
        }

    }
}
