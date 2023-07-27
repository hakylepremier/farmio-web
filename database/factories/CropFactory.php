<?php

namespace Database\Factories;

use App\Models\Greenhouse;
use App\Models\Stage;
use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\en_US;
use Xvladqt\Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Crop>
 */
class CropFactory extends Factory
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

        $stages = [
            'Seedling',
            'Production',
            'Harvest',
            'Sorting',
        ];

        $stage = Stage::firstOrCreate(['name' => $this->faker->randomElement($stages)]);
        
        $name = $this->faker->randomElement([$faker->fruitName(), $faker->vegetableName()]);

        $imageName = $faker->image($dir = storage_path('app\public\crops'), $width = 640, $height = 480, [$name]);

        return [
            'name' => $name,
            'description' => fake()->realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2),
            'image' => 'crops/'. basename($imageName),
            'plant_number' => fake()->numberBetween(10000, 20000),
            'variety' => fake()->word(),
            'greenhouse_id' => Greenhouse::factory(),
            'stage_id' => $stage['id'],
        ];
    }
}
