<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BankingInformation>
 */
class BankingInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_name' => $this->faker->name,
            'bank_name' => $this->faker->company,
            'routing_number' => $this->faker->bankRoutingNumber,
            'account_number' => $this->faker->bankAccountNumber,
            'account_type' => $this->faker->randomElement(['Savings', 'Checking']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
