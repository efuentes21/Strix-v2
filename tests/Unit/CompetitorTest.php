<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Competitor;

class CompetitorTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_create_competitor(): void
    {
        if($this->assertDatabaseMissing('competitors', ['dni' => '12345678L'])){
            Competitor::factory()->create([
                'dni' => '12345678L',
                'email' => 'user@gmail.com',
                'name' => 'testing user',
                'address' => 'his home',
                'birthdate' => '2024-02-12',
                'sex' => false,
                'pro' => false,
                'federation' => false,
                'points' => false,
                'partner' => false,
                'active' => true
            ]);
    
            $this->assertDatabaseHas('competitors', [
                'dni' => '12345678L',
                'email' => 'user@gmail.com',
                'name' => 'testing user',
                'address' => 'his home',
                'birthdate' => '2024-02-12',
                'sex' => false,
                'pro' => false,
                'federation' => false,
                'points' => false,
                'partner' => false,
                'active' => true
            ]);
        }

    }
}
