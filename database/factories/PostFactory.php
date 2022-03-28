<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            //
            'title' => $this->faker->realText($maxNbChars = 10, $indexSize = 2),
            'slug' => Str::slug($this->faker->title()),
            'body' => $this->faker->text(),
            'image' => $this->faker->imageUrl(640, 480)
        ];
    }
}
