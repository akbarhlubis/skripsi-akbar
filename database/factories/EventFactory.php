<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence, // Generate name
            'user_id' => 1, // Set user_id to 1
            'is_published' => rand(0,1), // Set is_published to true
            'category_id' => 1, // Set category_id to 1
            'quota' => rand(0,100), // Set quota to random number between 0 and 100
            'description' => fake()->sentence(), // Generate sentence
            'body' => fake()->paragraphs(5,true), // Generate paragraph
            'slug' => fake()->slug(), // Generate slug from name
            'published_at' => now(), // Set published_at to now
            'start_date' => now(), // Set start_date to now
            'end_date' => now()->addDays(7), // Set end_date to 7 days from now
        ];
    }
}
