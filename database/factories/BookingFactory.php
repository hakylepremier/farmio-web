<?php

namespace Database\Factories;

use App\Models\Agronomist;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $agronomist = $this->faker->unique()->randomElement(Agronomist::all());
        $schedule = $this->faker->randomElement($agronomist->schedules);
        
        return [
            'user_id' => 1,
            'agronomist_id' => $agronomist['id'],
            'schedule_id' => $schedule['id'],
            'date'=> fake()->dateTimeInInterval('+1 week', '+3 months'),
            'phone' => fake()->e164PhoneNumber(),
        ];
    }
}
