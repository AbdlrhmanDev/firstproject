<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */




    public function run(): void
    {
        // Job::factory(10)->create();
        //  Tag::factory(3)->create();
        // $this->call([
        //     EmployerSeeder::class,
        //     // JobSeeder::class,
        // ]);


        Job::create([
            'title' => 'Frontend Developer',
            'description' => 'Develop user interfaces using React and Tailwind CSS.',
            'salary' => 75000,
            'company_id' => 3,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Backend Engineer',
            'description' => 'Build and maintain server-side applications with Laravel.',
            'salary' => 80000,
            'company_id' => 1,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Graphic Designer',
            'description' => 'Create visual content for marketing campaigns.',
            'salary' => 45000,
            'company_id' => 5,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Marketing Manager',
            'description' => 'Lead digital marketing strategies and campaigns.',
            'salary' => 65000,
            'company_id' => 2,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'DevOps Engineer',
            'description' => 'Manage CI/CD pipelines and cloud infrastructure.',
            'salary' => 90000,
            'company_id' => 4,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Content Writer',
            'description' => 'Write engaging blog posts and website copy.',
            'salary' => 40000,
            'company_id' => 6,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Product Manager',
            'description' => 'Oversee product development and launch.',
            'salary' => 85000,
            'company_id' => 7,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'UI/UX Designer',
            'description' => 'Design intuitive user experiences for mobile apps.',
            'salary' => 60000,
            'company_id' => 8,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Database Administrator',
            'description' => 'Optimize and manage MySQL databases.',
            'salary' => 70000,
            'company_id' => 9,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Sales Representative',
            'description' => 'Drive sales through client outreach and meetings.',
            'salary' => 55000,
            'company_id' => 10,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Full Stack Developer',
            'description' => 'Work on both frontend and backend technologies.',
            'salary' => 82000,
            'company_id' => 1,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'HR Specialist',
            'description' => 'Manage recruitment and employee relations.',
            'salary' => 50000,
            'company_id' => 3,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Cybersecurity Analyst',
            'description' => 'Protect company systems from security threats.',
            'salary' => 95000,
            'company_id' => 2,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Social Media Manager',
            'description' => 'Manage social media accounts and campaigns.',
            'salary' => 48000,
            'company_id' => 5,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Mobile App Developer',
            'description' => 'Build iOS and Android applications using Flutter.',
            'salary' => 78000,
            'company_id' => 4,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Accountant',
            'description' => 'Handle financial records and tax filings.',
            'salary' => 60000,
            'company_id' => 6,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Project Manager',
            'description' => 'Coordinate teams to deliver projects on time.',
            'salary' => 70000,
            'company_id' => 7,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Customer Support Specialist',
            'description' => 'Assist customers with product inquiries.',
            'salary' => 42000,
            'company_id' => 8,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Machine Learning Engineer',
            'description' => 'Develop AI models for predictive analytics.',
            'salary' => 100000,
            'company_id' => 9,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'SEO Specialist',
            'description' => 'Optimize websites for search engine rankings.',
            'salary' => 52000,
            'company_id' => 10,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Business Analyst',
            'description' => 'Analyze business processes and recommend improvements.',
            'salary' => 68000,
            'company_id' => 1,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Web Developer',
            'description' => 'Create responsive websites using HTML, CSS, and JavaScript.',
            'salary' => 65000,
            'company_id' => 3,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Network Engineer',
            'description' => 'Maintain and troubleshoot network infrastructure.',
            'salary' => 72000,
            'company_id' => 2,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Copywriter',
            'description' => 'Write compelling ad copy for marketing materials.',
            'salary' => 45000,
            'company_id' => 5,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Quality Assurance Tester',
            'description' => 'Test software applications for bugs and issues.',
            'salary' => 55000,
            'company_id' => 4,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Operations Manager',
            'description' => 'Oversee daily business operations and logistics.',
            'salary' => 80000,
            'company_id' => 6,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Data Scientist',
            'description' => 'Analyze large datasets to uncover insights.',
            'salary' => 95000,
            'company_id' => 7,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Administrative Assistant',
            'description' => 'Support office tasks and scheduling.',
            'salary' => 38000,
            'company_id' => 8,
            'featured' => false,
        ]);

        Job::create([
            'title' => 'Cloud Architect',
            'description' => 'Design scalable cloud solutions on AWS.',
            'salary' => 110000,
            'company_id' => 9,
            'featured' => true,
        ]);

        Job::create([
            'title' => 'Event Coordinator',
            'description' => 'Plan and execute corporate events.',
            'salary' => 48000,
            'company_id' => 10,
            'featured' => false,
        ]);

    }
}
