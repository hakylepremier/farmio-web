<?php

namespace Database\Seeders;

use App\Models\Farm;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::factory(5)->has(Farm::factory()->count(3))->create();
        Task::factory(3)->has(Farm::factory()->count(3))->create();
        Task::factory(2)->has(Farm::factory()->count(3))->create();
    }
}
