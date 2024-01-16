<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PerformanceRecord>
 */
class PerformanceRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'appraisal_date' => $this->faker->date,
            'reviewer' => $this->faker->name,
            'performance_metrics' => $this->faker->sentence,
            'performance_score' => $this->faker->randomFloat(2, 1, 5), // Generates a random decimal between 1 and 5
            'feedback' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
