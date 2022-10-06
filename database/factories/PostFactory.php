<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author_id'=>fake()->numberBetween($int1=1, $int2=5),
            'category_id'=>fake()->numberBetween($int1=1, $int2=5),
            'slug'=>fake()->unique()->slug(),
            'title'=>fake()->sentence(),
            'excerpt'=>fake()->paragraph(),
            'body'=>'<p>'.implode('</p><p>', fake()->paragraphs(4)).'</p>',
            'thumbnail'=>'default.jpg'
        ];
    }
}
