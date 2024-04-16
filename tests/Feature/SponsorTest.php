<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Sponsor;

class SponsorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_create_sponsor(): void
    {
        if($this->assertDatabaseMissing('sponsors', ['cif' => 'A98765433'])){
            Sponsor::factory()->create([
                'cif' => 'A98765433',
                'name' => 'testing sponsor',
                'logo' => 'logoTest.png',
                'address' => 'la Pineda',
                'principal' => true,
                'active' => true
            ]);
    
            $this->assertDatabaseHas('sponsors', [
                'cif' => 'A98765433',
                'name' => 'testing sponsor',
                'logo' => 'logoTest.png',
                'address' => 'la Pineda',
                'principal' => true,
                'active' => true
            ]);
        }

    }
}