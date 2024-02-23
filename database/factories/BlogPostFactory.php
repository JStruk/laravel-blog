<?php

namespace Database\Factories;

use App\Models\BlogPostCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'title: ' . $this->faker->sentence(8),
            'subtitle' => $this->faker->sentence(5),
            'author' => $this->faker->name,
            'contents' => function () {
                return collect($this->faker->paragraphs(3))->map(function ($paragraph) {
                    return "<p>{$paragraph}</p><br>";
                })->implode('');
            },
            'blog_post_category_id' => BlogPostCategory::factory(),
        ];
    }
}
