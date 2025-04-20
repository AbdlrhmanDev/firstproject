<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * PageController handles the front-end page views for career-related content
 * including career tips, salary information, and company listings.
 */
class PageController extends Controller
{
    // public function jobs()
    // {
    //     $jobs = [
    //         (object) ['title' => 'Software Engineer', 'type' => 'Full Time', 'salary' => '$100,000'],
    //         (object) ['title' => 'Data Analyst', 'type' => 'Full Time', 'salary' => '$80,000'],
    //         (object) ['title' => 'Product Manager', 'type' => 'Full Time', 'salary' => '$120,000'],
    //     ];

    //     return view('pages/jobs', compact('jobs'));
    // }

    /**
     * Display the career tips page
     * 
     * @return \Illuminate\View\View
     */
    public function career()
    {
        $careerTips = [
            (object) ['title' => 'How to Write a Resume', 'description' => 'Tips on writing a winning resume.'],
            (object) ['title' => 'Interview Preparation', 'description' => 'What to expect and how to prepare.'],
            (object) ['title' => 'Building a LinkedIn Profile', 'description' => 'Optimize your profile to attract tech recruiters.'],
            (object) ['title' => 'Mastering Technical Interviews', 'description' => 'Ace coding interviews and whiteboard sessions.'],
            (object) ['title' => 'Remote Work Best Practices', 'description' => 'Tools and tips to succeed in a remote tech role.'],
            (object) ['title' => 'Continuous Learning in Tech', 'description' => 'Stay updated with trends and new technologies.'],
            (object) ['title' => 'Personal Branding for Developers', 'description' => 'Build your online presence to stand out.'],
            (object) ['title' => 'Portfolio Website Essentials', 'description' => 'What to include to showcase your work effectively.'],
            (object) ['title' => 'Networking in the Tech Industry', 'description' => 'How to build meaningful professional relationships.'],
            (object) ['title' => 'Certifications That Matter', 'description' => 'Which tech certifications can boost your career.'],
            (object) ['title' => 'GitHub as a Resume', 'description' => 'Use GitHub to demonstrate your coding skills.'],
            (object) ['title' => 'Choosing Your Tech Stack', 'description' => 'How to pick technologies that fit your goals.'],
            (object) ['title' => 'Navigating Your First Tech Job', 'description' => 'What to expect and how to grow quickly.'],
            (object) ['title' => 'Soft Skills in Tech Careers', 'description' => 'Why communication, teamwork, and empathy matter.'],
            (object) ['title' => 'Freelancing in Tech', 'description' => 'Tips for starting and succeeding as a freelancer.'],
        ];

        return view('pages/career', compact('careerTips'));
    }

    /**
     * Display the salary information page
     * 
     * @return \Illuminate\View\View
     */
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

    /**
     * Display the companies listing page
     * 
     * @return \Illuminate\View\View
     */
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
