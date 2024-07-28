<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Task::create([
            'name' => fake()->realText(),
            'date' => fake()->dateTime(),
            'priority' => random_int(1,3),
            'user_id' => 1,
        ]);
    }
}
