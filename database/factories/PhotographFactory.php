<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photograph>
 */
class PhotographFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'path' => $this->faker->image(storage_path('app/'.config('main.paths.photographs')), 400, 300, null, false), // Generates a random image and stores it in the specified directory
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
