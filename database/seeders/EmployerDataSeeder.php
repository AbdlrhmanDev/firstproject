<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            User::create([
                'name' => $companyName,
                'email' => strtolower($companyName) . '@example.com',
                'password' => Hash::make('123456789'),
                'role' => 'employer',
            ]);
        }
    
    }
}
