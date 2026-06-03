<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends Factory<Blog>
 */
class BlogFactory extends Factory
{
    /**
      * Define the model's default state.
      *
      * @return array<string, mixed>
      */
    public function definition(): array
    {
        $title = $this->faker->sentence(6);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'short_description' => $this->faker->paragraph(2),
            'content' => implode("\n\n", $this->faker->paragraphs(6)),
            'image_path' => null,
            'category' => $this->faker->randomElement(['Admit Card', 'Result', 'Syllabus', 'Job Alerts', 'News']),
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => function (array $attributes) {
                return $attributes['created_at'];
            }
        ];
    }
}
