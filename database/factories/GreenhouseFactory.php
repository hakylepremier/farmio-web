<?php

namespace Database\Factories;

use App\Models\Greenhouse;
use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\en_US;
use Xvladqt\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Greenhouse>
 */
class GreenhouseFactory extends Factory
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

        $imageName = $faker->image($dir = storage_path('app\public\greenhouses'), $width = 640, $height = 480, ['greenhouse']);

        return [
            'name' => Greenhouse::all()->count() ? 'Farm ' . Greenhouse::all()->count() + 1 : 'Farm ' . 1,
            'location' => fake()->city(),
            'image' => 'greenhouses/'. basename($imageName),
            'user_id' => 1,
        ];
    }
}
