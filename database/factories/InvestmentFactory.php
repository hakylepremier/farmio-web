<?php

namespace Database\Factories;

use App\Models\InsuranceCompany;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use FakerRestaurant\Provider\en_US;
use Xvladqt\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Investment>
 */
class InvestmentFactory extends Factory
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

        $insuranceCompanies = [
            "First Anchor Risk Management Limited",
            "Mainstream Reinsurance House",
            "Insurance Consultancies International",
            "Tri-Star Insurance Services Limited",
            "Asterix Insurance Brokers",
            "Edward Mensah, Wood, and Associates",
            "Relius Insurance Broker",
            "Prudential Life Insurance Danquah Branch",
            "RegencyNem Insurance Ghana Limited",
            "M&G Insurance Brokers Co. Limited",
            "Vanguard Insurance Limited",
        ];

        // $investment = $this->faker->randomElement($investments);

        $title = $this->faker->randomElement([$faker->fruitName(), $faker->vegetableName()]);

        // NB: if adding more than 10 it'll be advisable to remove the unique()
        $insurance = InsuranceCompany::firstOrCreate(['name' => $this->faker->unique()->randomElement($insuranceCompanies)]);

        $imageName = $faker->image($dir = storage_path('app\public\investments'), $width = 640, $height = 480, [$title]);

        return [
            //
            'title' => $title . " Investment",
            // 'description' => fake()->realTextBetween($minNbChars = 160, $maxNbChars = 200, $indexSize = 2),
            'image' => 'investments/'. basename($imageName),
            'amount' => fake()->randomFloat(2, 1000, 9900),
            'roi' => fake()->numberBetween(5, 100),
            'investor_number' => fake()->numberBetween(3, 20),
            // 'city' => $faker->date('Y_m_d'),
            'location' => $faker->city(),
            'insurance_company_id' => $insurance['id'],
            'investment_type' => 'Fixed Income',
            'cycle' => fake()->numberBetween(3, 9),
            'maturity_date' => fake()->dateTimeBetween('-3 months', '+1 day'),
            'closing_date' => fake()->dateTimeInInterval('+4 months', '+4 months'),
            'shop_id' => $this->faker->randomElement(Shop::all())['id'],
            'active' => fake()->randomElement([true, false]),
        ];
    }
}
