<?php

namespace Database\Factories;


use App\Enums\ProficiencyEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkillAndInterest>
 */
class SkillAndInterestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'skill_name' => $this->faker->word,
            'proficiency' => $this->faker->randomElement(ProficiencyEnum::class),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
