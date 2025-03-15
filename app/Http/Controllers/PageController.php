<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function jobs()
    {
        $jobs = [
            (object) ['title' => 'Software Engineer', 'type' => 'Full Time', 'salary' => '$100,000'],
            (object) ['title' => 'Data Analyst', 'type' => 'Full Time', 'salary' => '$80,000'],
            (object) ['title' => 'Product Manager', 'type' => 'Full Time', 'salary' => '$120,000'],
        ];

        return view('pages/jobs', compact('jobs'));
    }

    public function career()
    {
        $careerTips = [
            (object) ['title' => 'How to Write a Resume', 'description' => 'Tips on writing a winning resume.'],
            (object) ['title' => 'Interview Preparation', 'description' => 'What to expect and how to prepare.'],
        ];

        return view('pages/career', compact('careerTips'));
    }

    public function salaries()
    {
        $salaries = [
            (object) ['role' => 'Software Engineer', 'amount' => '$100,000'],
            (object) ['role' => 'Marketing Manager', 'amount' => '$90,000'],
            (object) ['role' => 'Data Scientist', 'amount' => '$110,000'],
            (object) ['role' => 'Product Manager', 'amount' => '$120,000'],
            (object) ['role' => 'UI/UX Designer', 'amount' => '$85,000'],
            (object) ['role' => 'HR Manager', 'amount' => '$75,000'],
            (object) ['role' => 'Cybersecurity Analyst', 'amount' => '$105,000'],
            (object) ['role' => 'Business Analyst', 'amount' => '$95,000'],
            (object) ['role' => 'DevOps Engineer', 'amount' => '$115,000'],
            (object) ['role' => 'Frontend Developer', 'amount' => '$90,000'],
            (object) ['role' => 'Backend Developer', 'amount' => '$105,000'],
            (object) ['role' => 'Cloud Engineer', 'amount' => '$110,000'],
            (object) ['role' => 'Sales Manager', 'amount' => '$80,000'],
            (object) ['role' => 'AI/ML Engineer', 'amount' => '$130,000'],
            (object) ['role' => 'Software Architect', 'amount' => '$140,000'],
        ];

        return view('pages/salaries', compact('salaries'));
    }

    public function companies()
    {
        $companies = [
            (object) ['name' => 'Google', 'industry' => 'Tech'],
            (object) ['name' => 'Amazon', 'industry' => 'E-commerce'],
            (object) ['name' => 'Tesla', 'industry' => 'Automobile'],
            (object) ['name' => 'Microsoft', 'industry' => 'Software'],
            (object) ['name' => 'Apple', 'industry' => 'Technology'],
            (object) ['name' => 'Facebook', 'industry' => 'Social Media'],
            (object) ['name' => 'Netflix', 'industry' => 'Entertainment'],
            (object) ['name' => 'IBM', 'industry' => 'IT Services'],
            (object) ['name' => 'Intel', 'industry' => 'Semiconductors'],
            (object) ['name' => 'Adobe', 'industry' => 'Software'],
            (object) ['name' => 'Uber', 'industry' => 'Transportation'],
            (object) ['name' => 'Airbnb', 'industry' => 'Hospitality'],
            (object) ['name' => 'Spotify', 'industry' => 'Music Streaming'],
            (object) ['name' => 'Samsung', 'industry' => 'Electronics'],
            (object) ['name' => 'SpaceX', 'industry' => 'Aerospace'],
        ];

        return view('pages/companies', compact('companies'));
    }
}
