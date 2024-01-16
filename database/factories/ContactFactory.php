<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address' => $this->faker->streetAddress,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'country' => $this->faker->country,
            'postal_code' => $this->faker->postcode,
            'work_phone' => $this->faker->phoneNumber,
            'mobile_phone' => $this->faker->phoneNumber,
            'work_email' => $this->faker->safeEmail,
            'personal_email' => $this->faker->safeEmail,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
