<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Race::factory(10)->create();

        \App\Models\Sponsor::factory(10)->create();

        \App\Models\Insurance::factory(10)->create();

        \App\Models\Competitor::factory(10)->create();

        \App\Models\Challenge::factory(10)->create();

        \App\Models\Admin::factory(3)->create();
    }
}
