<?php

namespace Database\Factories;

use App\Enums\DayEnum;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkShift>
 */
class WorkShiftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $days  = [DayEnum::MON, DayEnum::TUE, DayEnum::WED, DayEnum::THU, DayEnum::FRI];

        return [
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
            'days' => $days
        ];
    }
}
