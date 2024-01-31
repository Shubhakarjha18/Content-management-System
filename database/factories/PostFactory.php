<?php
namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;

    public function definition(): array
    {
        return [
            'post_title' => $this->faker->sentence,
            'post_content' => $this->faker->paragraph,
            'user_id' => \App\Models\User::factory(),
            'post_category_id' => \App\Models\Category::factory(),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (\App\Models\Post $post) {
            // Attach images to the post
            $post->images()->saveMany(\App\Models\Image::factory(3)->make());
        });
    }
}
