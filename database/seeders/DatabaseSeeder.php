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

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456789'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('123456789'),
            'role' => 'user',
        ]);


        $employer = User::create([
            'name' => 'Employer One',
            'email' => 'employer@example.com',
            'password' => bcrypt('123456789'),
            'role' => 'employer',
        ]);

        $employer->company()->create([
            'name' => 'Tech Corp',
            'description' => 'We build awesome stuff.',
        ]);



        Employer::factory(20)->create();
        //  Job::factory(10)->create();
        Tag::factory(20)->create(); // Create 10 tags
        $this->call([
            // EmployerSeeder::class,
            JobSeeder::class,
            ApplicationSeeder::class,
            EmployerDataSeeder::class,
        ]);
    }
}
