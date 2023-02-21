<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $authors = Author::all();
        return [
        'career' => $this->faker->word(),
        'biography' => $this->faker->text(150),
        'website' => $this->faker->domainName(),
        'email' => $this->faker->email(),
        'author_id' => $this->faker->unique()->numberBetween(1, $authors->count())
        ];
    }
}
