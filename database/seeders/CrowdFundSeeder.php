<?php

namespace Database\Seeders;

use App\Models\CrowdFund;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrowdFundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CrowdFund::factory(15)->create();
    }
}
