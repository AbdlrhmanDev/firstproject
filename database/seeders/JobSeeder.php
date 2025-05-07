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
        // Get all tags
        $tags = Tag::all();

        // Define job-tag mappings
        $jobTags = [
            // Strategy & Management Jobs
            'Chief Strategy Officer' => ['Strategy', 'Business Strategy', 'Corporate Strategy', 'Leadership', 'Management'],
            'Strategic Planning Director' => ['Strategy', 'Business Strategy', 'Leadership', 'Management', 'Analytics'],
            'Business Strategy Consultant' => ['Strategy', 'Business Strategy', 'Consulting', 'Analytics', 'Problem Solving'],
            'Marketing Strategy Manager' => ['Marketing Strategy', 'Marketing', 'Strategy', 'Digital Marketing', 'Brand Strategy'],
            'Growth Strategy Manager' => ['Strategy', 'Growth Marketing', 'Marketing Strategy', 'Analytics', 'Digital Marketing'],
            'Operations Strategy Manager' => ['Strategy', 'Operations Strategy', 'Management', 'Business Strategy', 'Analytics'],
            'Digital Strategy Director' => ['Strategy', 'Digital Marketing', 'Marketing Strategy', 'Innovation', 'Technology'],
            'Brand Strategist' => ['Brand Strategy', 'Marketing Strategy', 'Marketing', 'Communication', 'Creative'],
            'Management Consultant' => ['Strategy', 'Consulting', 'Business Strategy', 'Analytics', 'Problem Solving'],
            'Innovation Strategy Manager' => ['Strategy', 'Innovation', 'Business Strategy', 'Leadership', 'Change Management'],
            
            // Technology Jobs with Strategy Component
            'API Developer' => ['Technology', 'Programming', 'Development', 'API Development', 'Backend Development'],
            'Senior API Developer' => ['Technology', 'Programming', 'Development', 'API Development', 'Backend Development'],
            'Integration Specialist' => ['Technology', 'API Development', 'Backend Development'],
            'API Architect' => ['Technology', 'API Development', 'Backend Development', 'Cloud Computing', 'Strategy'],
            'Frontend Developer' => ['Technology', 'Web Development', 'Programming', 'Development'],
            'Backend Engineer' => ['Technology', 'Programming', 'Development', 'API Development', 'Backend Development'],
            'Full Stack Developer' => ['Technology', 'Web Development', 'Programming', 'Development', 'API Development'],
            
            // Marketing & Content Jobs
            'Marketing Manager' => ['Marketing', 'Digital Marketing', 'Marketing Strategy', 'Brand Strategy', 'Leadership'],
            'Content Strategy Manager' => ['Content Marketing', 'Marketing Strategy', 'Digital Marketing', 'Communication'],
            'Digital Marketing Director' => ['Digital Marketing', 'Marketing Strategy', 'Marketing', 'Strategy', 'Leadership'],
            'SEO Strategist' => ['SEO', 'Digital Marketing', 'Marketing Strategy', 'Analytics'],
            'Social Media Strategist' => ['Social Media', 'Digital Marketing', 'Marketing Strategy', 'Communication'],
            
            // Business & Product Jobs
            'Product Strategy Manager' => ['Product Management', 'Strategy', 'Business Strategy', 'Innovation'],
            'Business Development Manager' => ['Business', 'Strategy', 'Sales', 'Leadership'],
            'E-commerce Strategy Manager' => ['E-commerce', 'Strategy', 'Digital Marketing', 'Business Strategy'],
            'Change Management Consultant' => ['Change Management', 'Strategy', 'Consulting', 'Leadership'],
            
            // Other Specialized Jobs
            'Data Strategy Manager' => ['Data Analytics', 'Strategy', 'Business Strategy', 'Analytics'],
            'Healthcare Strategy Consultant' => ['Healthcare', 'Strategy', 'Consulting', 'Business Strategy'],
            'Education Program Strategist' => ['Education', 'Strategy', 'Program Management', 'Innovation'],
            'Real Estate Investment Strategist' => ['Real Estate', 'Strategy', 'Finance', 'Analytics']
        ];

        // Create jobs and attach tags
        foreach ($jobTags as $title => $tagNames) {
            $job = Job::create([
                'title' => $title,
                'description' => $this->getJobDescription($title),
                'salary' => $this->getJobSalary($title),
                'company_id' => rand(1, 10),
                'featured' => rand(0, 1),
            ]);

            // Attach relevant tags
            foreach ($tagNames as $tagName) {
                $tag = $tags->firstWhere('name', $tagName);
                if ($tag) {
                    $job->tags()->attach($tag->id);
                }
            }
        }
    }

    private function getJobDescription($title)
    {
        $descriptions = [
            'Chief Strategy Officer' => 'Lead organizational strategy development and execution, driving business growth and innovation.',
            'Strategic Planning Director' => 'Develop and implement strategic initiatives to achieve long-term business objectives.',
            'Business Strategy Consultant' => 'Provide strategic consulting services to optimize business operations and growth.',
            'Marketing Strategy Manager' => 'Develop and execute comprehensive marketing strategies across multiple channels.',
            'Growth Strategy Manager' => 'Lead strategic initiatives to drive business growth and market expansion.',
            'Operations Strategy Manager' => 'Optimize operational processes and implement strategic improvements.',
            'Digital Strategy Director' => 'Lead digital transformation initiatives and develop digital growth strategies.',
            'Brand Strategist' => 'Develop and execute brand strategies to enhance market position and awareness.',
            'Management Consultant' => 'Provide strategic consulting services to improve business performance.',
            'Innovation Strategy Manager' => 'Drive innovation initiatives and develop new business opportunities.',
            'API Developer' => 'Design and develop RESTful APIs using modern frameworks and best practices.',
            'Senior API Developer' => 'Lead API development initiatives and mentor junior developers in API best practices.',
            'Integration Specialist' => 'Create and maintain API integrations with third-party services and internal systems.',
            'API Architect' => 'Design scalable API architectures and establish API development standards.',
            'Content Strategy Manager' => 'Develop and execute content strategies aligned with business objectives.',
            'Digital Marketing Director' => 'Lead digital marketing initiatives and develop comprehensive marketing strategies.',
            'SEO Strategist' => 'Develop and implement SEO strategies to improve online visibility and traffic.',
            'Social Media Strategist' => 'Create and execute social media strategies to enhance brand presence.',
            'Product Strategy Manager' => 'Define and execute product strategy to drive growth and market adoption.',
            'Business Development Manager' => 'Identify and develop new business opportunities and strategic partnerships.',
            'E-commerce Strategy Manager' => 'Develop and implement e-commerce strategies to drive online sales growth.',
            'Change Management Consultant' => 'Guide organizations through transformational change initiatives.',
            'Data Strategy Manager' => 'Develop and implement data-driven strategies to improve business performance.',
            'Healthcare Strategy Consultant' => 'Provide strategic consulting services to healthcare organizations.',
            'Education Program Strategist' => 'Develop educational programs and strategies for learning institutions.',
            'Real Estate Investment Strategist' => 'Develop real estate investment strategies and portfolio management.'
        ];

        return $descriptions[$title] ?? 'Lead strategic initiatives and drive business growth.';
    }

    private function getJobSalary($title)
    {
        $salaries = [
            'Chief Strategy Officer' => 180000,
            'Strategic Planning Director' => 150000,
            'Business Strategy Consultant' => 130000,
            'Marketing Strategy Manager' => 120000,
            'Growth Strategy Manager' => 125000,
            'Operations Strategy Manager' => 130000,
            'Digital Strategy Director' => 140000,
            'Brand Strategist' => 95000,
            'Management Consultant' => 120000,
            'Innovation Strategy Manager' => 135000,
            'API Developer' => 85000,
            'Senior API Developer' => 120000,
            'Integration Specialist' => 95000,
            'API Architect' => 130000,
            'Content Strategy Manager' => 90000,
            'Digital Marketing Director' => 130000,
            'SEO Strategist' => 85000,
            'Social Media Strategist' => 75000,
            'Product Strategy Manager' => 130000,
            'Business Development Manager' => 110000,
            'E-commerce Strategy Manager' => 115000,
            'Change Management Consultant' => 125000,
            'Data Strategy Manager' => 135000,
            'Healthcare Strategy Consultant' => 140000,
            'Education Program Strategist' => 95000,
            'Real Estate Investment Strategist' => 125000
        ];

        return $salaries[$title] ?? 100000;
    }
}
