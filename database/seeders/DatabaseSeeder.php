<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {// Create 10 random users
    \App\Models\User::factory(10)->create();

    // Create 20 random posts associated with random users
    \App\Models\Post::factory(20)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
    public function configure()
    {
        return $this->afterCreating(function (\App\Models\Post $post) {
            // Attach images to the post
            $post->images()->saveMany(\App\Models\Image::factory(3)->make());
        });
    }
}
