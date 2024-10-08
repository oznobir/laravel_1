<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(150),
            'description' => fake()->text(4000),
            'preview' => fake()->text(950),
            'thumbnail' => 'posts/'. fake()->image('storage/app/public/posts/', 480, 480, null, false)
        ];
    }

}
