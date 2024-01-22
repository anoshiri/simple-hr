<?php

namespace Database\Factories;

use App\Enums\GenderEnum;
use App\Enums\MaritalStatusEnum;
use Illuminate\Support\Str;
use App\Models\EmployeeStatus;
use App\Models\EmploymentStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_code' => $this->faker->ean8,
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement(GenderEnum::class), // Adjust based on your enum values
            'date_of_birth' => $this->faker->date,
            'marital_status' => $this->faker->randomElement(MaritalStatusEnum::class),
            'spouse_name' => $this->faker->optional(0.5)->name, // 50% chance of having a spouse name
            'dependents' => $this->faker->numberBetween(0, 5), // Random number of dependents
            'citizenship' => $this->faker->country,
            'status' => EmployeeStatus::inRandomOrder()->first()->id,

            'employment_status_id' => EmploymentStatus::inRandomOrder()->first()->id,

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
