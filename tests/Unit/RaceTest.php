<?php

namespace Tests\Feature;

use App\Http\Controllers\RaceController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Race;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class RaceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_create_race(): void
    {
        Race::factory()->create([
            'name' => 'Test Race',
            'description' => 'This is a test race',
            'unevenness' => 10,
            'map' => 'test_map.jpg',
            'max_competitors' => 100,
            'distance' => 10.5,
            'date' => '2024-04-07',
            'time' => '09:00:00',
            'start' => 'City Center',
            'promotion' => 'promotion.png',
            'inscription' => 25.00,
            'active' => true,
        ]);

        $this->assertDatabaseHas('races', [
            'name' => 'Test Race',
            'description' => 'This is a test race',
            'unevenness' => 10,
            'map' => 'test_map.jpg',
            'max_competitors' => 100,
            'distance' => 10.5,
            'date' => '2024-04-07',
            'time' => '09:00:00',
            'start' => 'City Center',
            'promotion' => 'promotion.png',
            'inscription' => 25.00,
            'active' => true,
        ]);
    }

    /*
    public function test_create_race2(): void
    {
        $raceController = new RaceController();
        $request = new Request([
            'name' => 'Test Race',
            'description' => 'This is a test race',
            'unevenness' => 10,
            'map' => UploadedFile::fake()->image('race_map.jpg'),
            'max_competitors' => 100,
            'distance' => 10.5,
            'date' => '2024-04-07',
            'time' => date('H:i', strtotime('2024-04-07 09:00:00')),
            'start' => 'City Center',
            'promotion' => UploadedFile::fake()->image('race_map.jpg'),
            'inscription' => 25.00,
            'active' => true,
        ]);

        $raceController->store($request);

        $this->assertDatabaseHas('races', [
            'name' => 'Test Race',
            'description' => 'This is a test race',
            'unevenness' => 10,
            'max_competitors' => 100,
            'distance' => 10.5,
            'date' => '2024-04-07',
            'time' => '09:00:00',
            'start' => 'City Center',
            'inscription' => 25.00,
            'active' => true,
        ]);
    }
    */
}
