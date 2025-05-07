<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $companies = [
            'TechNova',
            'InnovaSoft',
            'CodeCraft',
            'DevDynamics',
            'NextGenTech',
            'CloudCore',
            'DigitalVerse',
            'LogicLayer',
            'ByteBase',
            'NexaSystems',
        ];

        foreach ($companies as $companyName) {
            User::firstOrCreate(
                ['email' => strtolower($companyName) . '@example.com'],
                [
                    'name' => $companyName,
                    'password' => Hash::make('123456789'),
                    'role' => 'employer',
                ]
            );
        }
    }
}
