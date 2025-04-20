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
            'Technology',
            'Marketing',
            'Business',
            'Design',
            'Development',
            'Programming',
            'Web Development',
            'Mobile Development',
            'Data Science',
            'Artificial Intelligence',
            'Machine Learning',
            'Cloud Computing',
            'Cybersecurity',
            'Digital Marketing',
            'Content Marketing',
            'Social Media',
            'SEO',
            'UI/UX',
            'Product Management',
            'Startup'
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag
            ]);
        }
    }
}
