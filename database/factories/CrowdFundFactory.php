<?php

namespace Database\Factories;

use App\Models\CrowdCategory;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Xvladqt\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CrowdFund>
 */
class CrowdFundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        $crowdFunds = [
            [ "title" => "Drones for my farm", "category" => "Technology", "tag" => "drone"],
            [ "title" => "Internet of things connection", "category" => "Technology", "tag" => "iot"],
            [ "title" => "Tractors", "category" => "Technology", "tag" => "tractors"],
            [ "title" => "Combines", "category" => "Technology", "tag" => "combines"],
            [ "title" => "Sprayers", "category" => "Technology", "tag" => "sprayer"],
            [ "title" => "Nitrogen Fertilizers", "category" => "Agriculture", "tag" => "nitrogen"],
            [ "title" => "Phosphate Fertilizers", "category" => "Agriculture", "tag" => "phosphate"],
            [ "title" => "Potash Fertilizers", "category" => "Agriculture", "tag" => "potash"],
        ];

        $crowdfund = $this->faker->randomElement($crowdFunds);

        $category = CrowdCategory::firstOrCreate(['name' => $crowdfund['category']]);

        $imageName = $faker->image($dir = storage_path('app\public'), $width = 640, $height = 480, [$crowdfund['tag']]);

        return [
            //
            'title' => $crowdfund['title'],
            'description' => fake()->realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2),
            'image' => basename($imageName),
            'amount' => fake()->randomFloat(2, 10, 1000),
            'period' => $faker->date('Y_m_d'),
            'location' => $faker->city(),
            'crowd_category_id' => $category['id'],
            'shop_id' => $this->faker->randomElement(Shop::all())['id'],
            'active' => fake()->randomElement([true, false]),
        ];
    }
}
