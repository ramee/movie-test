<?php

namespace Database\Factories;

use App\Enum\MovieDataProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class MoviesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->word,
            'director' => $this->faker->name,
            'description' => $this->faker->text,
            'photo_url' => $this->faker->imageUrl,
            'year' => (int) $this->faker->year,
            'provider' => MovieDataProvider::TMDB,
            'providerId' => $this->faker->randomDigit(),
        ];
    }
}
