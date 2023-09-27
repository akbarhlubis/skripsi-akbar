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
            'name' => fake()->name(), // Generate name
            'description' => fake()->sentence(), // Generate sentence
            'body' => fake()->paragraphs(5,true), // Generate paragraph
            'slug' => fake()->slug(), // Generate slug from name
            'published_at' => now()
        ];
    }
}
