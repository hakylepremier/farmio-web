<?php

namespace Database\Seeders;

use App\Models\Agronomist;
use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgronomistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Greenhouse::factory()->count(5)->hasCrops(4)->create();
        Agronomist::factory()
        ->count(5)
        ->hasSchedules(4)
        ->hasReviews(3)
        ->create();

        Agronomist::factory()
        ->count(3)
        ->hasSchedules(3)
        ->hasReviews(5)
        ->create();

        Agronomist::factory()
        ->count(2)
        ->hasSchedules(2)
        ->hasReviews(7)
        ->create();

    }
}
