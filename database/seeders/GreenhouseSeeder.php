<?php

namespace Database\Seeders;

use App\Models\Greenhouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GreenhouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Greenhouse::factory()->count(5)->hasCrops(4)->create();
        Greenhouse::factory()->count(3)->hasCrops(3)->create();
        Greenhouse::factory()->count(2)->hasCrops(2)->create();
    }
}
