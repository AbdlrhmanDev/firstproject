<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Job;

use App\Models\Tag;

use App\Models\Employer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'salary' => $this->faker->randomFloat(2, 30000, 150000),
            'company_id' => Employer::inRandomOrder()->first()->id ?? Employer::factory()->create()->id,
            'featured' => true,
            'logo' => 'logos/' . $this->faker->slug() . '.png',
            'tags' => Tag::inRandomOrder()->take(3)->pluck('id')->toArray
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Job $job) {
            // Attach 1-3 random tags to each job
            $tags = Tag::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $job->tags()->attach($tags);
        });
    }
}
