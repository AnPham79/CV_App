<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'short_description' => fake()->sentence(20),
            'description' => fake()->paragraph(5),
            'salary' => fake()->numberBetween(5_000, 150_000),
            'location' => fake()->city,
            'languages' => fake()->randomElement(Job::$languages),
            'experience' => fake()->randomElement(Job::$experience),
            'employer_id' => Employer::factory()
        ];
    }
}
