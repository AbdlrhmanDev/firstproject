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
        return [
            'name' => $this->faker->unique()->word, // Generate random tag names
        ];
    }
}