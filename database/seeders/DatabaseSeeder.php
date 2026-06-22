<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed services first
        $this->call(ServiceSeeder::class);

        // Seed users (admin, lawyers, customers)
        $this->call(UserSeeder::class);

        // Seed lawyer profiles
        $this->call(LawyerSeeder::class);

        // Seed schedules
        $this->call(ScheduleSeeder::class);
    }
}
