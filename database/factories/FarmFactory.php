<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farm>
 */
class FarmFactory extends Factory
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

        // $user = User::findOrfail(['email' => "haky@haky.com"]);

        $title = $this->faker->randomElement([$faker->fruitName(), $faker->vegetableName()]);

        $imageName = $faker->image($dir = storage_path('app\public\farms'), $width = 640, $height = 480, [$title]);

        return [ 
            'name' => $title . ' Farm',
            'image' => 'farms/'. basename($imageName),
            'user_id' => 1
        ];
    }
}
