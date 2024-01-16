<?php

namespace Database\Factories;

use App\Enums\EmploymentTypeEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmploymentHistory>
 */
class EmploymentHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_title' => $this->faker->jobTitle,
            'department' => $this->faker->word,
            'employment_status' => $this->faker->randomElement(EmploymentTypeEnum::values()),
            'hire_date' => $this->faker->date,
            'end_date' => $this->faker->optional(0.2, null)->date, // 20% chance of having an end date
            'work_location' => $this->faker->city,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
