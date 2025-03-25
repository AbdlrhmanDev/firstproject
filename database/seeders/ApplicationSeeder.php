<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Database\Seeder;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'user')->pluck('id')->toArray();

        // اختار وظائف فقط تتبع لشركة واحدة (مثلاً ID=1)
        $jobs = Job::where('company_id', 1)->pluck('id')->toArray();

        if (empty($users) || empty($jobs)) {
            $this->command->warn('No users or jobs found to seed applications.');
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            Application::create([
                'user_id' => fake()->randomElement($users),
                'job_id' => fake()->randomElement($jobs),
                'resume_id' => null,
                'message' => fake()->sentence(),
                'status' => fake()->randomElement(['Pending', 'Accepted', 'Rejected']),
            ]);
        }
    }
}
