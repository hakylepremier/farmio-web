<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\en_US;
use Xvladqt\Faker;
// use \Xvladqt\

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
        
        // $faker->addProvider(new \FakerResta);
        // $category = $this->faker->randomElement([1,2]);
        $categoryName = $this->faker->randomElement(["Farm Fresh", "Farm Input"]);

        $category = Category::firstOrCreate(['name' => $categoryName]);
        // $category = Category::firstOrCreate(['name' => 'Test Category']);
        
        $name = $category['name'] == "Farm Fresh" ? $this->faker->randomElement([$faker->fruitName(), $faker->vegetableName()]) : $faker->beverageName();

        $imageName = $faker->image($dir = storage_path('app\public'), $width = 640, $height = 480, [$name]);
        return [
            //
            'title' => $name,
            'description' => fake()->realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2),
            'status' => fake()->randomElement([true, false]),
            'price' => fake()->randomFloat(2, 10, 1000),
            'weight' => fake()->numberBetween(10, 200),
            'product_image' => basename($imageName),
            'category_id' => $category['id'],
            'shop_id' => Shop::factory(),
        ];
    }
}
