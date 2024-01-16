<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'training_name' => $this->faker->sentence,
            'admission_date' => $this->faker->date,
            'completion_date' => $this->faker->optional(0.2)->date, // 20% chance of having a completion date
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
