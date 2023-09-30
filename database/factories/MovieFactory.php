<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'synopsis' => fake()->sentences(asText: true),
            'release_year' => fake()->year(),
            'duration' => fake()->numberBetween(60 * 30, 60 * 60 * 3), // between 30 minutes and 3 hours
        ];
    }
}
