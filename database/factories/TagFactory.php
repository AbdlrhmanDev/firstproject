<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Employer;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class TagFactory extends Factory
{
    protected $model = Tag::class;

    public function definition()
    {
        $techTags = [
            'Web Development', 'Mobile Development', 'Cloud Computing', 'DevOps',
            'Data Science', 'Machine Learning', 'Artificial Intelligence', 'Cybersecurity',
            'Blockchain', 'IoT', 'UI/UX', 'Frontend', 'Backend', 'Full Stack',
            'Database', 'API Development', 'Software Architecture', 'QA Testing'
        ];

        $marketingTags = [
            'Digital Marketing', 'Content Marketing', 'Social Media', 'SEO',
            'SEM', 'Email Marketing', 'Inbound Marketing', 'Growth Hacking',
            'Branding', 'Market Research', 'Analytics', 'PPC', 'Copywriting',
            'Video Marketing', 'Influencer Marketing', 'Marketing Strategy'
        ];

        $businessTags = [
            'Startup', 'Entrepreneurship', 'Product Management', 'Project Management',
            'Business Development', 'Sales', 'Customer Success', 'HR',
            'Finance', 'Operations', 'Strategy', 'Leadership', 'Remote Work'
        ];

        $allTags = array_merge($techTags, $marketingTags, $businessTags);
        
        return [
            'name' => $this->faker->unique()->randomElement($allTags),
        ];
    }
}