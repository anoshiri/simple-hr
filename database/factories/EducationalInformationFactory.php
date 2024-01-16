<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationalInformation>
 */
class EducationalInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'degree' => $this->faker->word,
            'major' => $this->faker->word,
            'institution' => $this->faker->company,
            'admission_date' => $this->faker->date,
            'graduation_date' => $this->faker->optional(0.2)->date, // 20% chance of having a graduation date
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
