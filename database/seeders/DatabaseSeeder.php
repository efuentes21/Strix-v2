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

        \App\Models\Competitor::factory(10)->create();

        \App\Models\Competitor::firstOrCreate(
            ['dni' => '27119473N'],
            [
                'email' => 'competitor@gmail.com',
                'password' => bcrypt('competitor'),
                'name' => 'Alex Alcala',
                'address' => 'c/ la Pineda',
                'birthdate' =>  \DateTime::createFromFormat('d/m/Y', '13/12/2004')->format('Y-m-d'),
                'sex' => 0,
                'pro' => 1,
                'federation' => 'Amer',
                'points' => 3333,
                'partner' => 1,
                'active' => 1
            ]
        );
        
        \App\Models\Insurance::factory(10)->create();

        \App\Models\Challenge::factory(10)->create();

        \App\Models\Inscription::factory(10)->create();

        \App\Models\Admin::factory(3)->create();

        \App\Models\Admin::factory()->create([
            'email' => 'admin@gmail.com',
            'signature' => 'signature.png',
            'password' => bcrypt('admin'),
        ]);

        \App\Models\Admin::factory(1)->create();

        \App\Models\Company::factory(1)->create();
    }
}
