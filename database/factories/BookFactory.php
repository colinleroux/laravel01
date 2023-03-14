<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(1, true),
            'sub_title' => $this->faker-> words(1, true),
            'series' => $this->faker->boolean(),
            'isbn13' => $this->faker->randomDigit(10),
            'edition' => $this->faker->randomDigit(1),
            'is_fiction' => $this->faker->boolean(),
            'language' => $this->faker->words(1, true),
            'published' =>$this->faker->randomDigit(4),
            'format' => $this->faker->words(1, true),

            'publisher_id' => $this->faker->randomDigit(8, True)
        ];
    }
}
