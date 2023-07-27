<?php

namespace Database\Factories;

use App\Models\Expertise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expertise>
 */
class ExpertiseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $expertises = [
            'Livestock Agronomist',
            'Crop Agronomist',
            'Farm Hand',
            'Agregator',
        ];

        $expertise = $this->faker->unique()->randomElement($expertises);
        
        return [
            'name' => $expertise,
        ];
    }
}
