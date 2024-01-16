<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
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
            'note' => $this->faker->paragraph,
            'department_id' => $this->faker->optional(0.2)->passthrough(Department::inRandomOrder()->first()?->id), // This field is nullable
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
