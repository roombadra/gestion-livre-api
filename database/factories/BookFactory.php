<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Library;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->text,
            'disponible' => rand(0, 1),
            'author_id' => Author::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'library_id' => Library::all()->random()->id,
        ];
    }
}
