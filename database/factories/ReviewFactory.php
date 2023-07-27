<?php

namespace Database\Factories;

use App\Models\Agronomist;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->realTextBetween($minNbChars = 160, $maxNbChars = 240, $indexSize = 2),
            'rating' => fake()->randomFloat(2, 3, 5),
            'user_id' => $this->faker->randomElement(User::all())['id'],
            // 'agronomist_id' => $this->faker->unique()->randomElement(Agronomist::all())['id'],
            'agronomist_id' => Agronomist::factory(),
        ];
    }
}
