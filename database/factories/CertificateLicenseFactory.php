<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CertificateLicenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'certification_name' => $this->faker->word,
            'issuing_organisation_name' => $this->faker->company,
            'issuance_date' => $this->faker->date,
            'expiry_date' => $this->faker->optional(0.2)->date, // 20% chance of having an expiry date
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
