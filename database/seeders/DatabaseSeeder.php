<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('123456789'),
                'role' => 'admin',
            ]
        );

        // Create Regular User
        User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'user',
                'password' => bcrypt('123456789'),
                'role' => 'user',
            ]
        );

        // Create Example Employer
        $employer = User::firstOrCreate(
            ['email' => 'employer@example.com'],
            [
                'name' => 'Employer One',
                'password' => bcrypt('123456789'),
                'role' => 'employer',
            ]
        );

        // Only create company if not exists (optional check)
        if (!$employer->company) {
            $employer->company()->create([
                'name' => 'Tech Corp',
                'description' => 'We build awesome stuff.',
            ]);
        }

        // Create employers using factory
        Employer::factory(20)->create();

        // Seed in correct order
        $this->call([
            EmployerDataSeeder::class,
            TagSeeder::class,
            JobSeeder::class,
            ApplicationSeeder::class,
        ]);
    }
}
