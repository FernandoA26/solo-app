<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;
use App\Models\Publisher;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'subtitle' => $this->faker->text(75),
            'language' => $this->faker->randomElement(['Español', 'Ingles']),
            'page' => $this->faker->numberBetween(50, 1000),
            'published' => $this->faker->date(),
            'description' => $this->faker->text(1000),
            'genre_id' => Genre::all()->random()->id,
            'publisher_id' => Publisher::all()->random()->id,
        ];
    }
}
