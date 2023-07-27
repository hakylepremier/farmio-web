<?php

namespace Database\Factories;

use App\Models\Expertise;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\en_US;
use Xvladqt\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agronomist>
 */
class AgronomistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        $expertises = [
            'Livestock Agronomist',
            'Crop Agronomist',
            'Farm Hand',
            'Agregator',
        ];

        $expertise = Expertise::firstOrCreate(['name' => $this->faker->randomElement($expertises)]);

        $imageName = $faker->image($dir = storage_path('app\public\agronomists'), $width = 640, $height = 480, ['portrait']);

        return [
            'user_id' => $this->faker->unique()->randomElement(User::all())['id'],
            'expertise_id' => $expertise['id'],
            'experience_start_date' => fake()->dateTimeInInterval('-9 years', '+6 years'),
            'description' => fake()->realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2),
            'phone' => fake()->e164PhoneNumber(),
            'image' => 'agronomists/'. basename($imageName),
        ];
    }
}
