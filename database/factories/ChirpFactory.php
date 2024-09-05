<?php

namespace Database\Factories;

use App\Models\Chirp;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Chirp>
 */
class ChirpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message' => fake()->text(25),
            'user_id' => User::all()->random()->id,
            'post_id' => Post::all()->random()->id,
        ];
    }
}
