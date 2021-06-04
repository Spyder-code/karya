<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'user_id' => 1,
            'author' => $this->faker->firstName(),
            'content' => $this->faker->text(),
            'title' => $this->faker->sentence(),
            'type' => 2,
            'category' => $this->faker->numberBetween(1,3),
            'post_excerpt' => $this->faker->text(),
            'schedule' => $this->faker->dateTime(),
            'status' => 1,
        ];
    }
}
