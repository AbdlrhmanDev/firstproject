<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use App\Models\Tag;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory(4)->create();
       Employer::factory(20)->create();
        //  Job::factory(10)->create();
        Tag::factory(20)->create(); // Create 10 tags
        $this->call([
            EmployerSeeder::class,
             JobSeeder::class,
        ]);

    }
}
