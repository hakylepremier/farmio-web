<?php

namespace Database\Factories;

use App\Models\Frequency;
use App\Models\TaskCategory;
use App\Models\TaskPriority;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $frequencies = [
            'Daily',
            'Weekly',
            'Monthly',
        ];

        $categories = [
            'Fertilizer',
            'Harvest',
            'Weedicide',
            'Irrigation',
        ];

        $priorities = [
            'High',
            'Meidum',
            'Low'
        ];

        $priority = TaskPriority::firstOrCreate([ "name" => $this->faker->randomElement($priorities) ]);

        $category = TaskCategory::firstOrCreate([ "name" => $this->faker->randomElement($categories) ]);

        $frequency = Frequency::firstOrCreate([ "title" => $this->faker->randomElement($frequencies) ]);

        return [
            //
            'title' => fake()->realTextBetween($minNbChars = 20, $maxNbChars = 25, $indexSize = 2),
            'date'=> fake()->dateTimeInInterval('+1 week', '+3 months'),
            'start_time' => fake()->time(),
            'end_time' => fake()->time($max = "23:59:59"),
            'frequency_id' => $frequency['id'],
            'task_category_id' => $category['id'],
            'task_priority_id' => $priority['id'],
            'user_id' => 1,
            'status' => fake()->randomElement([true, false]),
        ];
    }
}
