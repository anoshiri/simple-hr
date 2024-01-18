<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\ProficiencyEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LanguageSpoken>
 */
class LanguageSpokenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'language_name' => $this->faker->languageCode,
            'proficiency_level' => $this->faker->randomElement(ProficiencyEnum::class),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
