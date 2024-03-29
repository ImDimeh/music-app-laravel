<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApiKey>
 */
class ApiKeyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
        'uuid' => Str::uuid(),
            'user_id' => 1,
            'name' => 'Test Key',
            'key' => 'tsr-'. Str::random(40) ,
        


            //
        ];
    }
}
