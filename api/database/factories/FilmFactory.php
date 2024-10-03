<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    private array $ageClass = [
        "G", //General Audiences - All ages admitted
        "PG", //Parental Guidance Suggested - Some material may not be suitable for children
        "PG-13", //Parents Strongly Cautioned - Some material may be inappropriate for children under 13
        "R", //Restricted - Under 17 requires accompanying parent or adult guardian
        "NC-17", //Adults Only - No one 17 and under admitted
    ];

    private array $popularLanguages = [
        "English", //81.4% of movies
        "French", //12% of movies
        "Spanish", //8.6% of movies
        "German", //5.2% of movies
        "Hindi", //4.9% of movies
        "Mandarin", //increasingly popular
        "Korean", //increasingly popular
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realTextBetween(3, 50),
            'age_classification' => fake()->randomElement($this->ageClass),
            'language' => fake()->randomElement($this->popularLanguages),
            'cover_image' => fake()->image(),
        ];
    }
}
