<?php

namespace Database\Factories;

use App\Models\CrowdFund;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contribution>
 */
class ContributionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $crowdfund = $this->faker->unique()->randomElement(CrowdFund::all());

        $contribution = fake()->randomFloat(2, 10, 80);

        return [
            'user_id' => $this->faker->randomElement(User::all())['id'],
            'crowd_fund_id' => $crowdfund['id'],
            'contribution' => $contribution,
        ];
    }
}
