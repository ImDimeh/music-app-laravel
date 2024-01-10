<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Track;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'admin'=> true,
        ]);

        Track::factory(40)->create([
            'music'=> 'tracks/musics/trk-067355e3-2bcb-4688-8f95-ffb97700bcf4.mp3'
        ]);
    }
}
