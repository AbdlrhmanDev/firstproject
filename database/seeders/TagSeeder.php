<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            // Technology Tags
            'Technology',
            'Programming',
            'Development',
            'Web Development',
            'Mobile Development',
            'Cloud Computing',
            'Cybersecurity',
            'API Development',
            'Backend Development',
            
            // Data & AI Tags
            'Data Science',
            'Artificial Intelligence',
            'Machine Learning',
            'Data Analytics',
            
            // Design Tags
            'Design',
            'UI/UX',
            'Graphic Design',
            
            // Marketing Tags
            'Marketing',
            'Digital Marketing',
            'Content Marketing',
            'Social Media',
            'SEO',
            'Marketing Strategy',
            'Brand Strategy',
            'Growth Marketing',
            
            // Business Tags
            'Business',
            'Product Management',
            'Startup',
            'Strategy',
            'Business Strategy',
            'Operations Strategy',
            'Corporate Strategy',
            'Management',
            'Leadership',
            'Innovation',
            'Consulting',
            'Project Management',
            'Change Management',
            
            // Industry Specific
            'Finance',
            'Healthcare',
            'E-commerce',
            'Education',
            'Real Estate',
            
            // Skills
            'Analytics',
            'Research',
            'Communication',
            'Problem Solving',
            'Team Management'
        ];

        foreach ($tags as $tag) {
            Tag::firstOrCreate([
                'name' => $tag
            ]);
        }
    }
}
