<?php

namespace Database\Factories;

use App\Enums\MaritalStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalInformation>
 */
class PersonalInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marital_status' => $this->faker->randomElement(MaritalStatusEnum::class),
            'spouse_name' => $this->faker->optional(0.5)->name, // 50% chance of having a spouse name
            'dependents' => $this->faker->numberBetween(0, 5), // Random number of dependents
            'citizenship' => $this->faker->country,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
