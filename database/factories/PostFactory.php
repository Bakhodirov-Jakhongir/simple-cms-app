<?php

namespace Database\Factories;

use App\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    use WithFaker;

    public function __construct()
    {
        $this->setUpFaker();
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */

    public function definition()
    {
        return [
            'user_id' => \App\User::factory(),
            'title' => $this->faker->sentence,
            'post_image' => $this->faker->imageUrl('900','300'),
            'body' => $this->faker->paragraph
        ];
    }
}
