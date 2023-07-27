<?php

namespace Database\Factories;

use App\Models\Agronomist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'day' => fake()->dayOfWeek(),
            'start_time' => fake()->time(),
            'end_time' => fake()->time($max = "16:59:59"),
            'agronomist_id' => Agronomist::factory(),
        ];
    }
}
