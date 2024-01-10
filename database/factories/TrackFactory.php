<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

              'uuid' =>'trk-' . Str::uuid(),
        'title' =>$this->faker->sentence(4),
        'artist' => $this->faker->name(),
        'image' => 'tracks/images/trk-067355e3-2bcb-4688-8f95-ffb97700bcf4.jpg',
        'music' =>'tracks/musics/trk-067355e3-2bcb-4688-8f95-ffb97700bcf4.mp3',
        'display' => true,
        'play_Count'=> 0,
            //
        ];
    }
}
