<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PositionHeld>
 */
class PositionHeldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'department_id' => Department::inRandomOrder()->first()->id,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
        ];
    }
}
