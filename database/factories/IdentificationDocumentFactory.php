<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IdentificationDocument>
 */
class IdentificationDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document_type' => $this->faker->word,
            'document_number' => $this->faker->unique()->randomNumber(8),
            'document_path' => $this->faker->file(storage_path("app/public/docs"), storage_path("app/".config('main.paths.identification_documents')), false),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
